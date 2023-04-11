<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
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
}
