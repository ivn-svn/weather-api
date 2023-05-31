<?php

function get_weather_data($city_name, $api_key) {
    $url = "http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city_name) . "&appid=" . $api_key;
    $response = file_get_contents($url);
    
    if ($response !== false) {
        $data = json_decode($response, true);
        return $data;
    } else {
        echo "Error: Failed to fetch weather data.";
        return null;
    }
}

function get_temperature($city_data) {
    if ($city_data) {
        $main_info = $city_data['main'];
        if ($main_info) {
            $min_temp = $main_info['temp_min'];
            $max_temp = $main_info['temp_max'];
            return array($min_temp, $max_temp);
        } else {
            echo "Temperature data not available.";
        }
    } else {
        echo "City data not available.";
    }
}

// Set your OpenWeatherMap API key here
$api_key = 'your-api-key';

// Set the city name for which you want to get the temperature data
$city_name = 'London';

// Get weather data
$city_data = get_weather_data($city_name, $api_key);

// Get the temperature
list($min_temperature, $max_temperature) = get_temperature($city_data);

if ($min_temperature && $max_temperature) {
    echo "Minimum temperature in $city_name: $min_temperature°C<br>";
    echo "Maximum temperature in $city_name: $max_temperature°C<br>";
}

?>
