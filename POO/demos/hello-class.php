<?php

// attention les includes/requires dépendent du CWD
// (où vous êtes dans le Terminal)

// 2 approches :
// créer des chemins absolus avec __DIR__
use Openska\Entity\Contact;
use Openska\Bank\Contact as ContactBank;

require_once __DIR__ . '/../autoload.php';

// déplacer le CWD à la racine du projet
// chdir(dirname(__DIR__));
// require_once 'lib/Contact.php';

$contact = new Contact();
echo $contact->hello() . "\n";

$contactBank = new ContactBank();
