<?php

class Contact
{
    // "variable de l'objet" :
    // - propriété (property)
    // - attribut (attribute)
    // - champ (field)
    protected $prenom = 'Romain';
    protected $nom = 'Bohdanowicz';

    // accesseurs (getters/setters)
    // méthodes qui donnent accès à la propriété encapsulée
    // commencent en lecture par get ou is
    // commencent en écriture par set

    public function getPrenom()
    {
        return $this->prenom;
    }

    // "fonction de l'objet : méthode (method)
    public function hello()
    {
        return 'Hello';
    }
}