<?php

namespace Openska\Entity;

class Contact
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $prenom;

    /** @var string */
    protected $nom;

    /** @var Societe */
    protected $societe;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): Contact
    {
        $this->nom = $nom;
        return $this;
    }

    public function getSociete(): Societe
    {
        return $this->societe;
    }

    public function setSociete(Societe $societe): Contact
    {
        $this->societe = $societe;
        return $this;
    }
}