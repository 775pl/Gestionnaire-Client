<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    public function getDateEcheance(): \DateTime
    {
        return $this->dateEcheance;
    }

    public function setDateEcheance(\DateTime $dateEcheance): void
    {
        $this->dateEcheance = $dateEcheance;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function getFactures(): Facture
    {
        return $this->factures;
    }

    public function setFactures(Facture $factures): void
    {
        $this->factures = $factures;
    }

    #[ORM\Column(type: 'string', length: 255)]
    private string $nom;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'string', length: 50)]
    private string $statut;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $dateEcheance;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'projets')]
    #[ORM\JoinColumn(nullable: false)]
    private Client $client;

    #[ORM\OneToMany(targetEntity: Facture::class, mappedBy: 'projet', cascade: ['remove'], orphanRemoval: true)]
    private Facture $factures;

}
