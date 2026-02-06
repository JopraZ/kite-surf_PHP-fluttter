<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande
{
    // ================== PROPRIÉTÉS ==================

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $mail = null;

    #[ORM\Column(length: 150)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(inversedBy: 'demandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Centre $centre = null;

    // ================== GETTERS ==================

    #[Groups(['demande:list'])]
    public function getId(): ?int
    {
        return $this->id;
    }

    #[Groups(['demande:list'])]
    public function getMail(): ?string
    {
        return $this->mail;
    }

    #[Groups(['demande:list'])]
    public function getNom(): ?string
    {
        return $this->nom;
    }

    #[Groups(['demande:list'])]
    public function getMessage(): ?string
    {
        return $this->message;
    }

    #[Groups(['demande:list'])]
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    #[Groups(['demande:list'])]
    public function getCentre(): ?Centre
    {
        return $this->centre;
    }

    // ================== SETTERS ==================

    public function setCentre(Centre $centre): static
    {
        $this->centre = $centre;

        return $this;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }
    
    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }
}
