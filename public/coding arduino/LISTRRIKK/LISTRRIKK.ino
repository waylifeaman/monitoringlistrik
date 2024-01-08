#include <PZEM004Tv30.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <Wire.h>

const char *ssid = "****";
const char *password = "****";
const char* URL = "http://location/fileinput.php";

PZEM004Tv30 pzem1(D1, D2); // RX, TX for sensor 1
PZEM004Tv30 pzem2(D3, D4); // RX, TX for sensor 2
PZEM004Tv30 pzem3(D5, D6); // RX, TX for sensor 3

WiFiClient client;

void setup() {
  Serial.begin(115200);
  delay(10);
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
  // Cek status koneksi WiFi utama
   if(WiFi.status() == WL_CONNECTED) {
    WiFiClientSecure *client = new WiFiClientSecure;
    client->setInsecure(); // membuka sertivikasi ssl
    HTTPClient https;

    https.begin(*client, URL);
    https.addHeader("Content-Type", "application/x-www-form-urlencoded");

    // Baca nilai tegangan, arus, dan daya dari sensor 1
    float voltage1, current1, power1;
    readValues(pzem1, voltage1, current1, power1);
    printValues("Sensor 1", voltage1, current1, power1);

    // Baca nilai tegangan, arus, dan daya dari sensor 2
    float voltage2, current2, power2;
    readValues(pzem2, voltage2, current2, power2);
    printValues("Sensor 2", voltage2, current2, power2);

    // Baca nilai tegangan, arus, dan daya dari sensor 3
    float voltage3, current3, power3;
    readValues(pzem3, voltage3, current3, power3);
    printValues("Sensor 3", voltage3, current3, power3);

    // Hitung daya total
    float totalPower = power1 + power2 + power3;

    // Hitung sisa daya
    float remainingPower = 16500 - totalPower;

    // Kirim data ke server
    String postData = "tegangan1=" + String(voltage1) + "&arus1=" + String(current1) + "&daya1=" + String(power1) +
                    "&tegangan2=" + String(voltage2) + "&arus2=" + String(current2) + "&daya2=" + String(power2) +
                    "&tegangan3=" + String(voltage3) + "&arus3=" + String(current3) + "&daya3=" + String(power3) +
                    "&dayaTotal=" + String(totalPower) + "&sisaDaya=" + String(remainingPower);
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

    // TODO: Tambahkan logika atau tindakan lain yang perlu dilakukan dalam loop utama

    // Pengecekan setiap 60 detik
    https.end();
    delete client;
  } else {
    Serial.println("WiFi Disconnected");
  }
  delay(59000);
}

void readValues(PZEM004Tv30 &pzem, float &voltage, float &current, float &power) {
  voltage = pzem.voltage();
  if (isnan(voltage)) {
    voltage = 0;
  }

  current = pzem.current();
  if (isnan(current)) {
    current = 0;
  }

  power = voltage * current;
  if (isnan(power)) {
    power = 0;
  }
}

void printValues(const char *sensorName, float voltage, float current, float power) {
  Serial.print(sensorName);
  Serial.print(" - Tegangan: ");
  Serial.print(voltage);
  Serial.println("V");

  Serial.print(sensorName);
  Serial.print(" - Arus: ");
  Serial.print(current);
  Serial.println("A");

  Serial.print(sensorName);
  Serial.print(" - Daya: ");
  Serial.print(power);
  Serial.println("W");
}