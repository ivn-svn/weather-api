<?php

$latitude = 52.52;
$longitude = 13.41;

$url = "https://api.open-meteo.com/v1/forecast?latitude={$latitude}&longitude={$longitude}&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m";

$response = file_get_contents($url);
$data = json_decode($response, true);

// Extract current weather data
$currentWeather = $data['current_weather'];
$currentTemperature = $currentWeather['temperature'];
$currentWeatherCode = $currentWeather['weathercode'];
$currentWindSpeed = $currentWeather['windspeed'];
$currentWindDirection = $currentWeather['winddirection'];

// Extract hourly weather data
$hourlyData = $data['hourly'];
$hourlyTime = $hourlyData['time'];
$hourlyWindSpeed = $hourlyData['windspeed_10m'];
$hourlyTemperature = $hourlyData['temperature_2m'];
$hourlyRelativeHumidity = $hourlyData['relativehumidity_2m'];

// Print the extracted data
echo "Current Weather:\n";
echo "Time: {$currentWeather['time']}\n";
echo "Temperature: {$currentTemperature}\n";
echo "Weather Code: {$currentWeatherCode}\n";
echo "Wind Speed: {$currentWindSpeed}\n";
echo "Wind Direction: {$currentWindDirection}\n";

echo "\nHourly Weather:\n";
for ($i = 0; $i < count($hourlyTime); $i++) {
    echo "Time: {$hourlyTime[$i]}\n";
    echo "Wind Speed: {$hourlyWindSpeed[$i]}\n";
    echo "Temperature: {$hourlyTemperature[$i]}\n";
    echo "Relative Humidity: {$hourlyRelativeHumidity[$i]}\n\n";
}

?>
