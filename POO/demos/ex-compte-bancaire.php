<?php

use Openska\Bank\{CompteBancaire,Contact};

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $compteCourant = new CompteBancaire();
    $contact = new Contact();
    $compteCourant->setProprietaire('Jean');
    $compteCourant->setType(\Openska\Bank\CompteBancaireType::COMPTE_COURANT);

    $compteCourant->crediter(3000);
    // $compteCourant->crediter(-3000); // redirige dans le catch
    $compteCourant->debiter(1200);

    echo $compteCourant->getSolde() . "\n"; // doit afficher 1800
}
catch (Exception $exception) {
    // gestionnaire d'erreur, ex :
    // logguer l'erreur
    // demander une autre saisie
    echo "Erreur " . $exception->getMessage();
}
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