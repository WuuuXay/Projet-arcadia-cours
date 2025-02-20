<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity()]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank]
    private string $jour;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $heureOuverture = null;
    
    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $heureFermeture = null;

    // Getters et setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;
        return $this;
    }

    public function getHeureOuverture(): ?\DateTimeInterface
    {
        return $this->heureOuverture;
    }

    public function setHeureOuverture(?\DateTimeInterface $heureOuverture): self
    {
        $this->heureOuverture = $heureOuverture;
        return $this;
    }

    public function getHeureFermeture(): ?\DateTimeInterface
    {
        return $this->heureFermeture;
    }

    public function setHeureFermeture(?\DateTimeInterface $heureFermeture): self
    {
        $this->heureFermeture = $heureFermeture;
        return $this;
    }
}
