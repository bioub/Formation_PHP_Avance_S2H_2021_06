<?php

require_once __DIR__ . '/../autoload.php';

$contact = new \Openska\Entity\Contact();
$contact->setId(1)
        ->setPrenom('Steve')
        ->setNom('Jobs');

$societe = new \Openska\Entity\Societe();
$societe->setId(43)
    ->setNom('Apple')
    ->setVille('Cupertino');

// Association entre $contact et $societe coté $contact
$contact->setSociete($societe);

// HTML Généré à partir de $contact
echo "Prénom : " . $contact->getPrenom() . "\n";
echo "Nom : " . $contact->getNom() . "\n";
echo "Société : " . $contact->getSociete()->getNom() . "\n";