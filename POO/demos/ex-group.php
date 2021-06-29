<?php

$contact1 = new \Openska\Entity\Contact();
$contact1->setId(1)
    ->setPrenom('Toto')
    ->setNom('Dupont');

$contact2 = new \Openska\Entity\Contact();
$contact2->setId(2)
    ->setPrenom('Titi')
    ->setNom('Dupont');

$groupe = new \Openska\Entity\Groupe();
$groupe->setNom('Amis');

// Créer une classe Groupe avec en propriétés :
// - id (int)
// - nom (string)

// Créer une association avec Contact (n-m, ManyToMany unidirectionnelle (que coté Groupe)
// Remplir l'objet $groupe avec les $contact1 et $contact2 et les affichers
// sur le même modèle que page-societe.php
