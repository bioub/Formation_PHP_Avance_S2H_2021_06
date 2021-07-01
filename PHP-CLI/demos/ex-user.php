<?php

require_once __DIR__ . '/../autoload.php';

$contact = new \Openska\Entity\Contact();
$contact->setId(1)
    ->setPrenom('Steve')
    ->setNom('Jobs');

$user = new \Openska\Entity\User();
$user->setId(1)
    ->setUsername('sjobs')
    ->setPassword('123456');

// Association
$user->setContact($contact);

// Page User afficher les infos du User et de son Contact associé
echo "Username : " . $user->getUsername() . "\n";
echo "Prénom : " . $user->getContact()->getPrenom() . "\n";

// Créer une classe User avec les propriétés
// - id (int)
// - username (string)
// - password (string)

// Générer les getters/setters
// Coté User associer à un Contact (relation 1-1, OneToOne unidirectionnel (que coté User))