<?php

namespace App\Entity;

use App\Repository\LiensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LiensRepository::class)]
class Liens
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name_l = null;

    #[ORM\Column(length: 500)]
    private ?string $description_l = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameL(): ?string
    {
        return $this->name_l;
    }

    public function setNameL(string $name_l): self
    {
        $this->name_l = $name_l;

        return $this;
    }

    public function getDescriptionL(): ?string
    {
        return $this->description_l;
    }

    public function setDescriptionL(string $description_l): self
    {
        $this->description_l = $description_l;

        return $this;
    }
}
