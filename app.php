<?php
include_once 'autoload.php';

use MayBeTall\Alexa\Endpoint\Alexa;
use MayBeTall\Alexa\Endpoint\User;

Alexa::init();


$mysql = new PDO("mysql:host=localhost;dbname=db", "user", "password");


Alexa::enters(function() {
    Alexa::ask('Hi, would you like to add odometer reading or a defect?');
});

User::triggered('OdometerIntent', function() {
    error_log("Is it in miles or kilometers");
    Alexa::ask('Is it in miles or kilometers');
});

User::triggered('OdometerUnitIntent', function() {
    $units = User::stated('odometerUnits');

    error_log('You choose ' . $units);
    Alexa::say('You choose ' . $units);
});

User::triggered('DefectIntent', function() {

    error_log('what\'s wrong with the car?');
    Alexa::ask('What is there to fix?');
});

User::triggered('DefectAddIntent', function () use ($mysql) {
    $defect = User::stated('Defect');
    error_log("added: " . $defect);

    $stmt = $mysql->prepare('INSERT INTO defect (name) VALUES (:defect_name)');
    $stmt->bindParam("defect_name", $defect);
    $stmt->execute();
    Alexa::ask('added: ' . $defect . '. What else is there to fix?');
});

Alexa::exits(function() {
    error_log("exit");
});

