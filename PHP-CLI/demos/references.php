<?php

// Types Scalaires (non-objets) :
// string, array, boolean, int, float

$s1 = 'Jean';
$s2 = $s1; // passage par valeur/copie
// $s2 = &$s1; // passage par référence
$s2 = 'Eric';
var_dump($s1); // Jean

$o1 = new stdClass();
$o1->s = 'Jean';
$o2 = $o1; // passage par référence
// $o2 = clone $o1; // passage par valeur/copie
$o2->s = 'Eric';
var_dump($o1->s); // Eric



// ici passage par valeur (la copie du tableau)
// function addToArray($array, $value) {
// ici passage par référence
function addToArray(&$array, $value) {
    $array[] = $value;
}

$nbs = [1, 2, 3];
addToArray($nbs, 4);

var_dump($nbs);

// passage par référence
function addToObject($obj, $prop, $value) {
    $obj->$prop = $value;
}

$contact = new stdClass();
addToObject($contact, 'prenom', 'Romain');

var_dump($contact);
