<?php

namespace App\Entity;

use App\Repository\CreerArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreerArticlesRepository::class)]
class CreerArticles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $creation_articles = null;

    #[ORM\Column]
    private ?bool $favoris_articles = null;

    #[ORM\ManyToOne(inversedBy: 'creationArticles')]
    private ?Users $creationsarticles = null;

    #[ORM\ManyToOne(inversedBy: 'favorisArticles')]
    private ?Articles $favarticles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isCreationArticles(): ?bool
    {
        return $this->creation_articles;
    }

    public function setCreationArticles(bool $creation_articles): self
    {
        $this->creation_articles = $creation_articles;

        return $this;
    }

    public function isFavorisArticles(): ?bool
    {
        return $this->favoris_articles;
    }

    public function setFavorisArticles(bool $favoris_articles): self
    {
        $this->favoris_articles = $favoris_articles;

        return $this;
    }

    public function getRelation(): ?Users
    {
        return $this->creationsarticles;
    }

    public function setRelation(?Users $creationsarticles): self
    {
        $this->creationsarticles = $creationsarticles;

        return $this;
    }

    public function getFavarticles(): ?Articles
    {
        return $this->favarticles;
    }

    public function setFavarticles(?Articles $favarticles): self
    {
        $this->favarticles = $favarticles;

        return $this;
    }

}
