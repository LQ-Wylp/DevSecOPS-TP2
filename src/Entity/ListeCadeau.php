<?php

namespace App\Entity;

use App\Repository\ListeCadeauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeCadeauRepository::class)]
class ListeCadeau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Cadeau::class, inversedBy: 'listeCadeaux')]
    private Collection $cadeaux;

    public function __construct()
    {
        $this->cadeaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Cadeau>
     */
    public function getCadeaux(): Collection
    {
        return $this->cadeaux;
    }

    public function addCadeaux(Cadeau $cadeaux): static
    {
        if (!$this->cadeaux->contains($cadeaux)) {
            $this->cadeaux->add($cadeaux);
        }

        return $this;
    }

    public function removeCadeaux(Cadeau $cadeaux): static
    {
        $this->cadeaux->removeElement($cadeaux);

        return $this;
    }
}
