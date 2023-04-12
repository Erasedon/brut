<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $url = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?float $taile = null;

    #[ORM\OneToMany(mappedBy: 'mediarf', targetEntity: ReponseForum::class)]
    private Collection $reponseForumMedia;

    #[ORM\ManyToMany(targetEntity: Articles::class, mappedBy: 'avoir_articles')]
    private Collection $articlesm;

    #[ORM\ManyToMany(targetEntity: Drive::class, mappedBy: 'drive_media')]
    private Collection $drivem;

    #[ORM\ManyToMany(targetEntity: Suggestion::class, mappedBy: 'sug_media')]
    private Collection $suggestionsm;

    public function __construct()
    {
        $this->reponseForumMedia = new ArrayCollection();
        $this->articlesm = new ArrayCollection();
        $this->drivem = new ArrayCollection();
        $this->suggestionsm = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTaile(): ?float
    {
        return $this->taile;
    }

    public function setTaile(float $taile): self
    {
        $this->taile = $taile;

        return $this;
    }

    /**
     * @return Collection<int, ReponseForum>
     */
    public function getReponseForumMedia(): Collection
    {
        return $this->reponseForumMedia;
    }

    public function addReponseForumMedium(ReponseForum $reponseForumMedium): self
    {
        if (!$this->reponseForumMedia->contains($reponseForumMedium)) {
            $this->reponseForumMedia->add($reponseForumMedium);
            $reponseForumMedium->setMediarf($this);
        }

        return $this;
    }

    public function removeReponseForumMedium(ReponseForum $reponseForumMedium): self
    {
        if ($this->reponseForumMedia->removeElement($reponseForumMedium)) {
            // set the owning side to null (unless already changed)
            if ($reponseForumMedium->getMediarf() === $this) {
                $reponseForumMedium->setMediarf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Articles>
     */
    public function getArticlesm(): Collection
    {
        return $this->articlesm;
    }

    public function addArticlesm(Articles $articlesm): self
    {
        if (!$this->articlesm->contains($articlesm)) {
            $this->articlesm->add($articlesm);
            $articlesm->addAvoirArticle($this);
        }

        return $this;
    }

    public function removeArticlesm(Articles $articlesm): self
    {
        if ($this->articlesm->removeElement($articlesm)) {
            $articlesm->removeAvoirArticle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Drive>
     */
    public function getDrivem(): Collection
    {
        return $this->drivem;
    }

    public function addDrivem(Drive $drivem): self
    {
        if (!$this->drivem->contains($drivem)) {
            $this->drivem->add($drivem);
            $drivem->addDriveMedium($this);
        }

        return $this;
    }

    public function removeDrivem(Drive $drivem): self
    {
        if ($this->drivem->removeElement($drivem)) {
            $drivem->removeDriveMedium($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Suggestion>
     */
    public function getSuggestionsm(): Collection
    {
        return $this->suggestionsm;
    }

    public function addSuggestionsm(Suggestion $suggestionsm): self
    {
        if (!$this->suggestionsm->contains($suggestionsm)) {
            $this->suggestionsm->add($suggestionsm);
            $suggestionsm->addSugMedium($this);
        }

        return $this;
    }

    public function removeSuggestionsm(Suggestion $suggestionsm): self
    {
        if ($this->suggestionsm->removeElement($suggestionsm)) {
            $suggestionsm->removeSugMedium($this);
        }

        return $this;
    }
}
