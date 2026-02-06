<?php

namespace App\Entity;

use App\Repository\CentreRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CentreRepository::class)]
class Centre
{
    // ================== PROPRIÉTÉS ==================

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?float $note = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne]
    private ?Region $region = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $site_web = null;

    #[ORM\OneToMany(mappedBy: 'centre', targetEntity: Demande::class)]
    private Collection $demandes;

    // ================== CONSTRUCTEUR ==================

    public function __construct()
    {
        $this->demandes = new ArrayCollection();
    }

    // ================== GETTERS SÉRIALISÉS ==================

    #[Groups(['centre:list'])]
    public function getId(): ?int
    {
        return $this->id;
    }

    #[Groups(['centre:list'])]
    public function getNom(): ?string
    {
        return $this->nom;
    }

    #[Groups(['centre:detail'])]
    public function getNote(): ?float
    {
        return $this->note;
    }

    #[Groups(['centre:detail'])]
    public function getDescription(): ?string
    {
        return $this->description;
    }

    #[Groups(['centre:detail'])]
    public function getSiteWeb(): ?string
    {
        return $this->site_web;
    }

    #[Groups(['centre:detail'])]
    public function getRegion(): ?Region
    {
        return $this->region;
    }

    // ================== SETTERS ==================

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setSiteWeb(?string $site_web): self
    {
        $this->site_web = $site_web;
        return $this;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;
        return $this;
    }
}
