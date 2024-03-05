<?php

namespace App\Entity;

use App\Repository\CadeauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CadeauRepository::class)]
class Cadeau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: ListeCadeau::class, mappedBy: 'cadeaux')]
    private Collection $listeCadeaux;

    public function __construct()
    {
        $this->listeCadeaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

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

    /**
     * @return Collection<int, ListeCadeau>
     */
    public function getListeCadeaux(): Collection
    {
        return $this->listeCadeaux;
    }

    public function addListeCadeaux(ListeCadeau $listeCadeaux): static
    {
        if (!$this->listeCadeaux->contains($listeCadeaux)) {
            $this->listeCadeaux->add($listeCadeaux);
            $listeCadeaux->addCadeaux($this);
        }

        return $this;
    }

    public function removeListeCadeaux(ListeCadeau $listeCadeaux): static
    {
        if ($this->listeCadeaux->removeElement($listeCadeaux)) {
            $listeCadeaux->removeCadeaux($this);
        }

        return $this;
    }
}
