<?php

namespace App\Entity;


use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: RegionRepository::class)]
class Region
{
    // ================== PROPRIÉTÉS ==================
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    // ================== Getters ==================

    #[Groups(['region:list'])]
    public function getId(): ?int
    {
        return $this->id;
    }

    #[Groups(['region:list'])]
    public function getNom(): ?string
    {
        return $this->nom;
    }

    // ================== SETTERS ==================


    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection <int, Centre>
     */
    public function getCentres(): Collection
    {
        return $this->centres;
    }

    public function addCentre(Centre $centre): static
    {
        if (!$this->centres->contains($centre)) {
            $this->centres->add($centre);
            $centre->setCentre($this);
        }

        return $this;
    }

    public function removeCentre(Centre $centre): static
    {
        if ($this->centres->removeElement($centre)) {
            // set the owning side to null (unless already changed)
            if ($centre->getCentre() === $this) {
                $centre->setCentre(null);
            }
        }

        return $this;
    }

}
