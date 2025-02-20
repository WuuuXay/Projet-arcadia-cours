<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $race = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etat = 'Bonne santé';

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(targetEntity: Enclos::class, inversedBy: "animaux")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Enclos $enclos = null;

    #[ORM\Column(type: 'integer')]
    private int $vues = 0;

    #[ORM\OneToMany(targetEntity: CompteRendu::class, mappedBy: "animal", cascade: ["persist", "remove"])]
    private Collection $comptesRendus;

    public function __construct()
    {
        $this->comptesRendus = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getNom(): ?string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }

    public function getRace(): ?string { return $this->race; }
    public function setRace(string $race): self { $this->race = $race; return $this; }

    public function getEtat(): ?string { return $this->etat; }
    public function setEtat(string $etat): self { $this->etat = $etat; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): self { $this->description = $description; return $this; }

    public function getEnclos(): ?Enclos { return $this->enclos; }
    public function setEnclos(?Enclos $enclos): self { $this->enclos = $enclos; return $this; }

    public function getVues(): int { return $this->vues; } 
    public function incrementVues(): self { $this->vues++; return $this; }

    public function getComptesRendus(): Collection
    {
        return $this->comptesRendus;
    }

    public function addCompteRendu(CompteRendu $compteRendu): self
    {
        if (!$this->comptesRendus->contains($compteRendu)) {
            $this->comptesRendus[] = $compteRendu;
            $compteRendu->setAnimal($this);
        }
        return $this;
    }

    public function removeCompteRendu(CompteRendu $compteRendu): self
    {
        if ($this->comptesRendus->removeElement($compteRendu)) {
            if ($compteRendu->getAnimal() === $this) {
                $compteRendu->setAnimal(null);
            }
        }
        return $this;
    }
}
