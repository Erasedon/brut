<?php

namespace App\Entity;

use App\Repository\SuggestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: SousCategories::class, mappedBy: 'sc_sug')]
    private Collection $sug_sc;

    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'suggestionsm')]
    private Collection $sug_media;

    #[ORM\ManyToMany(targetEntity: Users::class, inversedBy: 'suggestionsu')]
    private Collection $sug_users;

    public function __construct()
    {
        $this->sug_sc = new ArrayCollection();
        $this->sug_media = new ArrayCollection();
        $this->sug_users = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, SousCategories>
     */
    public function getSugSc(): Collection
    {
        return $this->sug_sc;
    }

    public function addSugSc(SousCategories $sugSc): self
    {
        if (!$this->sug_sc->contains($sugSc)) {
            $this->sug_sc->add($sugSc);
            $sugSc->addScSug($this);
        }

        return $this;
    }

    public function removeSugSc(SousCategories $sugSc): self
    {
        if ($this->sug_sc->removeElement($sugSc)) {
            $sugSc->removeScSug($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getSugMedia(): Collection
    {
        return $this->sug_media;
    }

    public function addSugMedium(Media $sugMedium): self
    {
        if (!$this->sug_media->contains($sugMedium)) {
            $this->sug_media->add($sugMedium);
        }

        return $this;
    }

    public function removeSugMedium(Media $sugMedium): self
    {
        $this->sug_media->removeElement($sugMedium);

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getSugUsers(): Collection
    {
        return $this->sug_users;
    }

    public function addSugUser(Users $sugUser): self
    {
        if (!$this->sug_users->contains($sugUser)) {
            $this->sug_users->add($sugUser);
        }

        return $this;
    }

    public function removeSugUser(Users $sugUser): self
    {
        $this->sug_users->removeElement($sugUser);

        return $this;
    }
}
