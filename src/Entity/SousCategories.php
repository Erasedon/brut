<?php

namespace App\Entity;

use App\Repository\SousCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousCategoriesRepository::class)]
class SousCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titresc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitresc(): ?string
    {
        return $this->titresc;
    }

    public function setTitresc(string $titresc): self
    {
        $this->titresc = $titresc;

        return $this;
    }
}
