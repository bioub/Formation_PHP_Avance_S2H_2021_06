<?php
/*
$fic = fopen(__DIR__ . '/../composer.json', 'r');

$lineNumber = 1;

while($lineContent = fgets($fic)) {
    echo $lineNumber++ . ' ' . $lineContent;
}

fclose($fic);
*/

require_once __DIR__ . '/../vendor/autoload.php';

$reader = new \Openska\Reader\FileReader(__DIR__ . '/../composer.json');

foreach ($reader->readLines() as $line) {
    echo $line;
}


// echo $reader[10];