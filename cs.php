<?php

/* @var $api Reports */
require_once 'init-api.php';
session_start();
$pgm=$_SESSION["pgm"];
$data = [
    'text' =>$pgm
];

$response = $api->createAction($data);
$data = json_decode($response);

// Extract the "id" value
$id = $data->data->id;

// Print the value of "id"
$data = [];
sleep(10);

$response = $api->statusAction($id, $data);
$data = json_decode($response, true);

// Extract the "plagiat" value
$plagiat = $data['data']['plagiat'];

// Print the value of "plagiat"
echo $plagiat;
// PHP code
session_start();
$_SESSION["per"] =$plagiat;
header("Location:create.php");
exit;
?>
