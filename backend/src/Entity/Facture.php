<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private float $total;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    public function getDateCreation(): \DateTime
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTime $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }

    public function getProjet(): Projet
    {
        return $this->projet;
    }

    public function setProjet(Projet $projet): void
    {
        $this->projet = $projet;
    }

    #[ORM\Column(type: 'string', length: 50)]
    private string $statut;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $dateCreation;

    #[ORM\ManyToOne(targetEntity: Projet::class, inversedBy: 'factures')]
    #[ORM\JoinColumn(nullable: false)]
    private Projet $projet;

}