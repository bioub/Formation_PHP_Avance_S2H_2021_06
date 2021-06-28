<?php

// attention les includes/requires dépendent du CWD
// (où vous êtes dans le Terminal)

// 2 approches :
// créer des chemins absolus avec __DIR__
require_once __DIR__ . '/../lib/Contact.php';

// déplacer le CWD à la racine du projet
// chdir(dirname(__DIR__));
// require_once 'lib/Contact.php';

$contact = new Contact();
$contact->prenom = 'Romain';
$contact->nom = 'Bohdanowicz';
echo $contact->hello() . "\n";
