<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titrea = null;

    #[ORM\Column(length: 2000)]
    private ?string $descriptiona = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrea(): ?string
    {
        return $this->titrea;
    }

    public function setTitrea(string $titrea): self
    {
        $this->titrea = $titrea;

        return $this;
    }

    public function getDescriptiona(): ?string
    {
        return $this->descriptiona;
    }

    public function setDescriptiona(string $descriptiona): self
    {
        $this->descriptiona = $descriptiona;

        return $this;
    }
}
