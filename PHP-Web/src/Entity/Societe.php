<?php

namespace Openska\Entity;

class Societe
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $nom;

    /** @var string */
    protected $ville;

    /** @var Contact[]  */
    protected $contacts = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Societe
    {
        $this->id = $id;
        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): Societe
    {
        $this->nom = $nom;
        return $this;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function setVille(string $ville): Societe
    {
        $this->ville = $ville;
        return $this;
    }

    public function getContacts(): array
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): Societe
    {
        $this->contacts[] = $contact;
        return $this;
    }
}