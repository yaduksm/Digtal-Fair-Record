<?php

require_once 'Reports.php';

$config = [
    'apiUrl' => 'https://plagiarismsearch.com/api/v3',
    'apiUser' => 'binukrishna0961@gmail.com',
    'apiKey' => '5cmy1z8335vv31cbku9u2g-172517483',
];

$api = new Reports($config);

header("Content-type: application/json; charset=UTF-8");
