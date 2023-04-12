<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'favarticles', targetEntity: CreerArticles::class)]
    private Collection $favorisArticles;

    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'articlesm')]
    private Collection $avoir_articles;

    #[ORM\ManyToMany(targetEntity: SousCategories::class, inversedBy: 'articlesc')]
    private Collection $sous_categoriser;

    public function __construct()
    {
        $this->favorisArticles = new ArrayCollection();
        $this->avoir_articles = new ArrayCollection();
        $this->sous_categoriser = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, CreerArticles>
     */
    public function getFavorisArticles(): Collection
    {
        return $this->favorisArticles;
    }

    public function addFavorisArticle(CreerArticles $favorisArticle): self
    {
        if (!$this->favorisArticles->contains($favorisArticle)) {
            $this->favorisArticles->add($favorisArticle);
            $favorisArticle->setFavarticles($this);
        }

        return $this;
    }

    public function removeFavorisArticle(CreerArticles $favorisArticle): self
    {
        if ($this->favorisArticles->removeElement($favorisArticle)) {
            // set the owning side to null (unless already changed)
            if ($favorisArticle->getFavarticles() === $this) {
                $favorisArticle->setFavarticles(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getAvoirArticles(): Collection
    {
        return $this->avoir_articles;
    }

    public function addAvoirArticle(Media $avoirArticle): self
    {
        if (!$this->avoir_articles->contains($avoirArticle)) {
            $this->avoir_articles->add($avoirArticle);
        }

        return $this;
    }

    public function removeAvoirArticle(Media $avoirArticle): self
    {
        $this->avoir_articles->removeElement($avoirArticle);

        return $this;
    }

    /**
     * @return Collection<int, SousCategories>
     */
    public function getSousCategoriser(): Collection
    {
        return $this->sous_categoriser;
    }

    public function addSousCategoriser(SousCategories $sousCategoriser): self
    {
        if (!$this->sous_categoriser->contains($sousCategoriser)) {
            $this->sous_categoriser->add($sousCategoriser);
        }

        return $this;
    }

    public function removeSousCategoriser(SousCategories $sousCategoriser): self
    {
        $this->sous_categoriser->removeElement($sousCategoriser);

        return $this;
    }
}
