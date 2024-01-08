
#include <DHT.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <Wire.h>

const char *ssid = "****";
const char *password = "****";
const char* URL = "http://location/fileinput.php";

#define DHTPIN D2
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);

const int digitalSensorPin = D0;  // Pin digital untuk sensor hujan
const int lightSensorPin1 = A0;   // Pin analog untuk sensor intensitas cahaya
const int lightSensorPin2 = D1;   // Pin digital untuk sensor cahaya
const int thresholdRain = 200;    // Threshold untuk sensor hujan
const int thresholdLight = 500;   // Threshold untuk sensor intensitas cahaya

WiFiClient client;
void setup() {
  Serial.begin(9600);
  dht.begin();
  WiFi.begin(ssid, password);

  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
    // float temperature = 934;
    // float humidity = 56;
    // int digitalSensorValue = 0;
    // int lightSensorValue1 = 345;
    // int lightSensorValue2 = 1;

  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();
  int digitalSensorValue = digitalRead(digitalSensorPin);
  int lightSensorValue1 = analogRead(lightSensorPin1);
  int lightSensorValue2 = digitalRead(lightSensorPin2);

  if(WiFi.status() == WL_CONNECTED) {
    WiFiClientSecure *client = new WiFiClientSecure;
    client->setInsecure(); // membuka sertivikasi ssl
    HTTPClient https;

    https.begin(*client, URL);
    https.addHeader("Content-Type", "application/x-www-form-urlencoded");

    if (!isnan(temperature)) {
      Serial.print("Temperature: ");
      Serial.print(temperature);
      Serial.println(" °C");
    } else {
      Serial.println("Failed to read temperature");
    }

    if (!isnan(humidity)) {
      Serial.print("Humidity: ");
      Serial.print(humidity);
      Serial.println(" %");
    } else {
      Serial.println("Failed to read humidity");
    }

    Serial.print("Rain Sensor : ");
    Serial.println(digitalSensorValue);
    if (digitalSensorValue == HIGH) {
      Serial.println("Not Rain");
    } else {
      Serial.println("Rain");
      
    }

    Serial.print("Light Itensitas cahaya: ");
    Serial.println(lightSensorValue1);
    Serial.print("Light Sensor Value: ");
    Serial.println(lightSensorValue2);

    if (lightSensorValue2 == HIGH) {
      Serial.println("Dark");
      Serial.print("..................");
    } else {
      Serial.println("Bright");
      Serial.print("..................");
    }

    String postData = "&suhu=" + String(temperature) + "&kelembaban=" + String(humidity) +
                      "&hujan=" + String(digitalSensorValue) + "&intensitas=" + String(lightSensorValue1) + "&kondisiCahaya=" + String(lightSensorValue2);
  
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
  } else {
    Serial.println("WiFi Disconnected");
  }
  delay(59000);
}
