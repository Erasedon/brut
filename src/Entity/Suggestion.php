<?php

namespace App\Entity;

use App\Repository\SuggestionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuggestionRepository::class)]
class Suggestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titre_sug = null;

    #[ORM\Column(length: 2000)]
    private ?string $description_sug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreSug(): ?string
    {
        return $this->titre_sug;
    }

    public function setTitreSug(string $titre_sug): self
    {
        $this->titre_sug = $titre_sug;

        return $this;
    }

    public function getDescriptionSug(): ?string
    {
        return $this->description_sug;
    }

    public function setDescriptionSug(string $description_sug): self
    {
        $this->description_sug = $description_sug;

        return $this;
    }
}
