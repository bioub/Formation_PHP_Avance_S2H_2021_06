<?php

// Openska -> lib
// Openska\Entity\Contact -> lib/Entity/Contact.php

namespace Openska\Entity;

class Contact
{
    // "variable de l'objet" :
    // - propriété (property)
    // - attribut (attribute)
    // - champ (field)

    /** @var int */
    protected $id;

    /** @var string */
    protected $prenom;

    /** @var string */
    protected $nom;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Contact
     */
    public function setId(int $id): Contact
    {
        $this->id = $id;
        return $this;
    }

    // accesseurs (getters/setters)
    // méthodes qui donnent accès à la propriété encapsulée
    // commencent en lecture par get ou is
    // commencent en écriture par set


    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom(string $prenom): Contact
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Contact
     */
    public function setNom(string $nom): Contact
    {
        $this->nom = $nom;
        return $this;
    }

    // "fonction de l'objet : méthode (method)
    public function hello()
    {
        return 'Hello';
    }
}