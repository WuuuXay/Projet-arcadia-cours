<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\ZoneRepository;

#[ORM\Entity(repositoryClass: ZoneRepository::class)]
class Zone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: "zone", targetEntity: Enclos::class, cascade: ["persist", "remove"])]
    private Collection $enclos;

    public function __construct()
    {
        $this->enclos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return Collection|Enclos[]
     */
    public function getEnclos(): Collection
    {
        return $this->enclos;
    }

    public function addEnclos(Enclos $enclos): self
    {
        if (!$this->enclos->contains($enclos)) {
            $this->enclos->add($enclos);
            $enclos->setZone($this);
        }

        return $this;
    }

    public function removeEnclos(Enclos $enclos): self
    {
        if ($this->enclos->removeElement($enclos)) {
            if ($enclos->getZone() === $this) {
                $enclos->setZone(null);
            }
        }

        return $this;
    }
}
