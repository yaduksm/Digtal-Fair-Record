<?php

/* @var $api Reports */
require_once 'init-api.php';

$id = 7107667;
$data = [];


echo "Hi";
$response=$api->statusAction($id, $data);
$data = json_decode($response, true);

// Extract the "plagiat" value
$plagiat = $data['data']['plagiat'];

// Print the value of "plagiat"
echo $plagiat;