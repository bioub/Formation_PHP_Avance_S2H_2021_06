<?php

//$fic = fopen(__DIR__ . '/../app.log', 'a');
//
//fwrite($fic, "Ligne 1\n");
//
//fclose($fic);


require_once __DIR__ . '/../vendor/autoload.php';

$writer = new \Openska\Writer\FileWriter(__DIR__ . '/../app.log');
$writer->writeLine('Line');