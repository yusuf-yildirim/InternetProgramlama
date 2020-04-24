<?php
// show error reporting
error_reporting(E_ALL);

// set your default time-zone
date_default_timezone_set('Europe/Istanbul');

// variables used for jwt
$key = "example_key";
$iss = "http://localhost:8081/InternetProgramlama/";
$aud = "http://localhost:8081/InternetProgramlama/";
$iat = 1356999524;
$nbf = 1357000000;
