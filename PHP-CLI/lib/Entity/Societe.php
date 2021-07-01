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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Societe
     */
    public function setId(int $id): Societe
    {
        $this->id = $id;
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
     * @return Societe
     */
    public function setNom(string $nom): Societe
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     * @return Societe
     */
    public function setVille(string $ville): Societe
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return Contact[]
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param Contact $contact
     * @return Societe
     */
    public function addContact(Contact $contact): Societe
    {
        $this->contacts[] = $contact;
        return $this;
    }



}