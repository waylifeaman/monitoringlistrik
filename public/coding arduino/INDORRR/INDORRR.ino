#include <ESP8266WiFi.h>
#include <Wire.h>
#include <DHT.h>
#include <ESP8266HTTPClient.h>

const char *ssid = "****";
const char *password = "****";
const char* URL = "http://location/fileinput.php";

#define DHTPIN D2      // Pin where the DHT sensor is connected
#define DHTTYPE DHT22  // DHT 22 (AM2302) type sensor
DHT dht(DHTPIN, DHTTYPE);

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
  if(WiFi.status() == WL_CONNECTED) {
    WiFiClientSecure *client = new WiFiClientSecure;
    client->setInsecure(); // menonaktifkan sertivikasi ssl
    HTTPClient https;

    https.begin(*client, URL);
    https.addHeader("Content-Type", "application/x-www-form-urlencoded");  
    float temperature = dht.readTemperature();
    float humidity = dht.readHumidity();

    String postData =  "suhu=" + String(temperature) + "&kelembaban=" + String(humidity) + "";
    
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