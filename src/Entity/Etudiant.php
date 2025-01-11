<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $NCE = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\OneToOne(mappedBy: 'etudiant', cascade: ['persist', 'remove'])]
    private ?Soutenance $soutenance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNCE(): ?int
    {
        return $this->NCE;
    }

    public function setNCE(int $NCE): static
    {
        $this->NCE = $NCE;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSoutenance(): ?Soutenance
    {
        return $this->soutenance;
    }

    public function setSoutenance(Soutenance $soutenance): static
    {
        // set the owning side of the relation if necessary
        if ($soutenance->getEtudiant() !== $this) {
            $soutenance->setEtudiant($this);
        }

        $this->soutenance = $soutenance;

        return $this;
    }
}
