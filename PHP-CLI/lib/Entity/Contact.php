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

    /** @var Societe */
    protected $societe;

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
    public function setId(int $id): self
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
    public function setPrenom(string $prenom): self
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

    /**
     * @return Societe
     */
    public function getSociete(): Societe
    {
        return $this->societe;
    }

    /**
     * @param Societe $societe
     * @return Contact
     */
    public function setSociete(Societe $societe): Contact
    {
        $this->societe = $societe;
        return $this;
    }



    // "fonction de l'objet : méthode (method)
    public function hello()
    {
        return 'Hello my name is ' . $this->prenom;
    }
}