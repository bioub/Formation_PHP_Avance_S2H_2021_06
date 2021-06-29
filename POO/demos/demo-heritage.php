<?php
require_once __DIR__ . '/../vendor/autoload.php';

$writer = new \Openska\Writer\CsvFileWriter(__DIR__ . '/../app.csv');

$writer->writeArrayLine(['a', 'b', 'c']);

$writer->writeLine('abc');