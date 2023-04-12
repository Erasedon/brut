<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titrec = null;

    #[ORM\ManyToMany(targetEntity: SousCategories::class, inversedBy: 'categoriessc')]
    private Collection $categoriser;

    public function __construct()
    {
        $this->categoriser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrec(): ?string
    {
        return $this->titrec;
    }

    public function setTitrec(string $titrec): self
    {
        $this->titrec = $titrec;

        return $this;
    }

    /**
     * @return Collection<int, SousCategories>
     */
    public function getCategoriser(): Collection
    {
        return $this->categoriser;
    }

    public function addCategoriser(SousCategories $categoriser): self
    {
        if (!$this->categoriser->contains($categoriser)) {
            $this->categoriser->add($categoriser);
        }

        return $this;
    }

    public function removeCategoriser(SousCategories $categoriser): self
    {
        $this->categoriser->removeElement($categoriser);

        return $this;
    }
}
