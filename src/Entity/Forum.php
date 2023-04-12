<?php

namespace App\Entity;

use App\Repository\ForumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForumRepository::class)]
class Forum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateF = null;

    #[ORM\Column(nullable: true)]
    private ?int $vuef = null;

    #[ORM\OneToMany(mappedBy: 'Favorisf', targetEntity: CreerForum::class)]
    private Collection $favForums;

    #[ORM\OneToMany(mappedBy: 'forumrf', targetEntity: ReponseForum::class)]
    private Collection $reponseForums;

    #[ORM\ManyToMany(targetEntity: SousCategories::class, mappedBy: 'sc_forum')]
    private Collection $forum_sc;

    public function __construct()
    {
        $this->favForums = new ArrayCollection();
        $this->reponseForums = new ArrayCollection();
        $this->forum_sc = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateF(): ?\DateTimeInterface
    {
        return $this->dateF;
    }

    public function setDateF(\DateTimeInterface $dateF): self
    {
        $this->dateF = $dateF;

        return $this;
    }

    public function getVuef(): ?int
    {
        return $this->vuef;
    }

    public function setVuef(?int $vuef): self
    {
        $this->vuef = $vuef;

        return $this;
    }

    /**
     * @return Collection<int, CreerForum>
     */
    public function getFavForums(): Collection
    {
        return $this->favForums;
    }

    public function addFavForum(CreerForum $favForum): self
    {
        if (!$this->favForums->contains($favForum)) {
            $this->favForums->add($favForum);
            $favForum->setFavorisf($this);
        }

        return $this;
    }

    public function removeFavForum(CreerForum $favForum): self
    {
        if ($this->favForums->removeElement($favForum)) {
            // set the owning side to null (unless already changed)
            if ($favForum->getFavorisf() === $this) {
                $favForum->setFavorisf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReponseForum>
     */
    public function getReponseForums(): Collection
    {
        return $this->reponseForums;
    }

    public function addReponseForum(ReponseForum $reponseForum): self
    {
        if (!$this->reponseForums->contains($reponseForum)) {
            $this->reponseForums->add($reponseForum);
            $reponseForum->setForumrf($this);
        }

        return $this;
    }

    public function removeReponseForum(ReponseForum $reponseForum): self
    {
        if ($this->reponseForums->removeElement($reponseForum)) {
            // set the owning side to null (unless already changed)
            if ($reponseForum->getForumrf() === $this) {
                $reponseForum->setForumrf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SousCategories>
     */
    public function getForumSc(): Collection
    {
        return $this->forum_sc;
    }

    public function addForumSc(SousCategories $forumSc): self
    {
        if (!$this->forum_sc->contains($forumSc)) {
            $this->forum_sc->add($forumSc);
            $forumSc->addScForum($this);
        }

        return $this;
    }

    public function removeForumSc(SousCategories $forumSc): self
    {
        if ($this->forum_sc->removeElement($forumSc)) {
            $forumSc->removeScForum($this);
        }

        return $this;
    }
}
