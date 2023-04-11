<?php

namespace App\Entity;

use App\Repository\DriveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriveRepository::class)]
class Drive
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $taille_max = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTailleMax(): ?float
    {
        return $this->taille_max;
    }

    public function setTailleMax(float $taille_max): self
    {
        $this->taille_max = $taille_max;

        return $this;
    }
}
