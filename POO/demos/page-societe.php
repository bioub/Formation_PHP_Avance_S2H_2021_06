<?php

require_once __DIR__ . '/../autoload.php';

$contact1 = new \Openska\Entity\Contact();
$contact1->setId(1)
    ->setPrenom('Steve')
    ->setNom('Jobs');

$contact2 = new \Openska\Entity\Contact();
$contact2->setId(1)
    ->setPrenom('Tim')
    ->setNom('Cook');


$societe = new \Openska\Entity\Societe();
$societe->setId(43)
    ->setNom('Apple')
    ->setVille('Cupertino');

// Association entre $contact et $societe coté $societe
$societe->addContact($contact1);
$societe->addContact($contact2);

// HTML Généré à partir de $societe
echo "Société : " . $societe->getNom() . "\n";
echo "Contacts : \n";

foreach ($societe->getContacts() as $c) {
    echo "- " .  $c->getPrenom() . ' ' . $c->getNom() . "\n";
}