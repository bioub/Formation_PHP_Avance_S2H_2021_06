<?php

namespace Openska\Bank;

use Exception;

class CompteBancaire
{
    /** @var string */
    protected $proprietaire;

    /** @var float */
    protected $solde = 0;

    /** @var string */
    protected $type;

    public function getProprietaire(): string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): self
    {
        $this->proprietaire = $proprietaire;
        return $this;
    }

    public function getSolde(): float
    {
        return $this->solde;
    }

    public function crediter(float $montant): self
    {
        if ($montant < 0) {
            throw new Exception("Le montant $montant doit être positif");
        }

        $this->solde += $montant;
        return $this;
    }

    public function debiter(float $montant): self
    {
        if ($montant < 0) {
            throw new Exception("Le montant $montant doit être positif");
        }

        $this->solde -= $montant;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        if (!in_array($type, [Types\CompteBancaireType::COMPTE_COURANT, Types\CompteBancaireType::LIVRET])) {
            throw new Exception("Le type $type n'est un type autorisé");
        }

        $this->type = $type;
        return $this;
    }


}