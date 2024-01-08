#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char *ssid = "****";
const char *password = "****";
const char* URL = "http://location/fileinput.php";

// WiFiClient client;

// anemometer parameters
volatile byte rpmcount; // count signals
volatile unsigned long last_micros;
unsigned long timeold;
unsigned long timemeasure = 60; // 1 minute
int timetoSleep = 1;            // minutes
unsigned long sleepTime = 15;   // minutes
unsigned long timeNow;
int countThing = 0;
int GPIO_pulse = 2; // Arduino = D2
float rpm, rps;     // frequencies
float velocity_kmh; // km/h
float velocity_ms;  // m/s
float calibration_value = 5.0; // This value is obtained from comparing with the manufacturer's anemometer sensor
volatile boolean flag = false;
bool isConnected = false;

void ICACHE_RAM_ATTR rpm_anemometer()
{
  flag = true;
}

void setup()
{
  Serial.begin(9600);
  delay(1000);

  // Connect to WiFi
  WiFi.begin(ssid, password);

  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());

  pinMode(GPIO_pulse, INPUT_PULLUP);
  digitalWrite(GPIO_pulse, LOW);

  detachInterrupt(digitalPinToInterrupt(GPIO_pulse));                         // force to initiate Interrupt on zero
  attachInterrupt(digitalPinToInterrupt(GPIO_pulse), rpm_anemometer, RISING); // Initialize the interrupt pin
  rpmcount = 0;
  rpm = 0;
  timeold = millis();
  timeNow = millis();
}

void loop()
{
 if(WiFi.status() == WL_CONNECTED) {

    if (flag == true)
    {
      if (long(micros() - last_micros) >= 5000)
      {
        rpmcount++;
        last_micros = micros();
      }
      flag = false;
    }

    if ((millis() - timeNow) >= timemeasure * 1000)
    {
      // Measure RPM
      countThing++;
      detachInterrupt(digitalPinToInterrupt(GPIO_pulse)); // Disable interrupt when calculating
      rps = float(rpmcount) / float(timemeasure);         // rotations per second
      // velocity_ms = rps * calibration_value; // m/s
      velocity_ms = rps; // m/s
      velocity_kmh = velocity_ms * 3.6; // km/h
      Serial.print("rps=");
      Serial.print(rps);
      Serial.print("   velocity_ms=");
      Serial.print(velocity_ms);
      Serial.print("   velocity_kmh=");
      Serial.print(velocity_kmh);
      Serial.println("   ");
      timeNow = millis(); // Update the time when data was last sent

      // Upload data to server
      if (countThing == 1) // Send data per 1 minute
      {
        Serial.println("Send data to server");
        sendToServer(velocity_kmh);
        countThing = 0;
        delay(3000); // Delay 5 seconds after sending data
      }

      rpmcount = 0;
      attachInterrupt(digitalPinToInterrupt(GPIO_pulse), rpm_anemometer, RISING); // enable interrupt
    }
  } else {
    Serial.println("WiFi Disconnected");
  }
}

void sendToServer(float velocity_kmh)
{
    WiFiClientSecure *client = new WiFiClientSecure;
    client->setInsecure(); // membuka sertivikasi ssl
    HTTPClient https;

    https.begin(*client, URL);
    https.addHeader("Content-Type", "application/x-www-form-urlencoded");

  String postData = "angin=" + String(velocity_kmh);
  
  Serial.print("postData: ");
  Serial.println(postData);

    int httpResponseCode = https.POST(postData);
    // String payload = https.getString();

    if (httpResponseCode > 0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
      // Serial.print("Payload: ");
      // Serial.println(payload);
    } else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
      // Serial.print("Payload: ");
      // Serial.println(payload);
    }
  https.end();
  delete client;
}