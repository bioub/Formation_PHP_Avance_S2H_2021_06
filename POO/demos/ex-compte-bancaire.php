<?php

require_once __DIR__ . '/../lib/CompteBancaire.php';

$compteCourant = new CompteBancaire();
$compteCourant->setProprietaire('Jean');
$compteCourant->setType('Compte Courant');

$compteCourant->crediter(3000);
$compteCourant->debiter(1200);

echo $compteCourant->getSolde() . "\n"; // doit afficher 1800

// Créer la classe CompteBancaire qui correspond à ce fichier
// de démo

// 3 propriétés :
// - proprietaire (string)
// - solde (double initialisé à 0)
// - type (string)

// générer les getters/setters (sauf setSolde)

// ajouter les méthodes crediter et debiter qui mette à jour
// le solde du montant passé en paramètre

// limiter les type de compte à Compte Courant et Livret

// empecher d'appeler crediter et debiter avec des montants négatif