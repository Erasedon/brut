<?php

namespace App\Entity;

use App\Repository\CreerForumRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreerForumRepository::class)]
class CreerForum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $creation_forum = null;

    #[ORM\Column]
    private ?bool $favoris_forum = null;

    #[ORM\ManyToOne(inversedBy: 'creerForums')]
    private ?Users $creationf = null;

    #[ORM\ManyToOne(inversedBy: 'favForums')]
    private ?Forum $Favorisf = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isCreationForum(): ?bool
    {
        return $this->creation_forum;
    }

    public function setCreationForum(bool $creation_forum): self
    {
        $this->creation_forum = $creation_forum;

        return $this;
    }

    public function isFavorisForum(): ?bool
    {
        return $this->favoris_forum;
    }

    public function setFavorisForum(bool $favoris_forum): self
    {
        $this->favoris_forum = $favoris_forum;

        return $this;
    }

    public function getCreationf(): ?Users
    {
        return $this->creationf;
    }

    public function setCreationf(?Users $creationf): self
    {
        $this->creationf = $creationf;

        return $this;
    }

    public function getFavorisf(): ?Forum
    {
        return $this->Favorisf;
    }

    public function setFavorisf(?Forum $Favorisf): self
    {
        $this->Favorisf = $Favorisf;

        return $this;
    }
}
