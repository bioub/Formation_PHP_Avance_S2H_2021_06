<?php

$doc = new DOMDocument();
$doc->load(__DIR__ . '/../checkcredit.xml');

// balise racine
echo $doc->documentElement->nodeName;

// le parcours peut se faire avec des propriétés
// comme : firstChild, lastChild, nextSibling
// previousSibling, childNodes

// Attention le premier enfant est de type text si le document est indenté
var_dump($doc->documentElement->firstChild->textContent);
// var_dump($doc->documentElement->firstChild->nextSibling->textContent);

// Depuis PHP 8 : Pour parcourir le DOM avec les noeud Element uniquement (balises)
// On utilise : firstElementChild, lastElementChild, nextElementSibling
// previousElementSibling, children
// var_dump($doc->documentElement->firstElementChild->textContent);

// Pour parcourir le document plus simplement on
// peut utiliser XPath
// XPath est un langage de description d'un chemin au sein d'un
// fichier XML
// Inspiré des chemins sur un filesystem
// /Users/romain/test.txt
// #qqchose p a

// Ex XPATH avec contacts.xml
// /contacts/contact[1]/prenom
// Ex Selecteur CSS
// contacts > contact:first-of-type > prenom

$xpath = new DOMXpath($doc);
$xpath->registerNamespace('ns1', 'http://atradius.com/organisation/_2007_08/type/');

echo $xpath->evaluate('//ns1:Identifier[1]/ns1:id')[0]->textContent;
// Avec // la recherche se fait sur chaque noeud de l'arbre (récursif)
echo $xpath->evaluate('//ns1:Identifier[1]/ns1:id')[0]->textContent;

var_dump($xpath->evaluate('//CoverDecision[@CoverId=110764961]/Buyer/ns1:Identifier[1]/ns1:id'));