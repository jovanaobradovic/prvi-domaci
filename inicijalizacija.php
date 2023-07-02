<?php

error_reporting(E_ALL);
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");

require 'domen/Dan.php';
require 'domen/Trening.php';
require 'domen/Termin.php';
require 'domen/Raspored.php';


require 'Broker.php';

$broker = new Broker();

return $broker;