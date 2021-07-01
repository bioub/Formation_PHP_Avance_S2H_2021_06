<?php
require_once __DIR__ . '/../vendor/autoload.php';

// $writer = new \Openska\Writer\FileWriter(__DIR__ . '/../app.log');
$writer = new \Openska\Writer\DevNullWriter();
$logger = new \Openska\Logger\Logger($writer);
$logger->log("warning", "Une erreur s'est produit");
$logger->log("debug", "Une méthode a été appelée");