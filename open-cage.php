<?php
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);
ini_set('xdebug.var_display_max_depth', -1);
$latitude = "52.51627";
$longitude = "13.37769";
$APIKEY = "yourapikeyhere";

$url = "https://api.opencagedata.com/geocode/v1/json?q=$latitude+$longitude&key=$APIKEY";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

$data = json_decode($result, true);
xdebug_var_dump($data);
?>
