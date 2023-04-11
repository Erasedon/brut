<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $pseudo_g = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudoG(): ?string
    {
        return $this->pseudo_g;
    }

    public function setPseudoG(string $pseudo_g): self
    {
        $this->pseudo_g = $pseudo_g;

        return $this;
    }
}
