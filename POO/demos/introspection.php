<?php

require_once __DIR__ . '/../vendor/autoload.php';


$reflection = new ReflectionClass(\Openska\Entity\Societe::class);

echo $reflection->getMethod('addContact')->getDocComment();