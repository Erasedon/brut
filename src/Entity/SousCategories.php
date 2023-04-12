<?php

namespace App\Entity;

use App\Repository\SousCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousCategoriesRepository::class)]
class SousCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titresc = null;

    #[ORM\ManyToMany(targetEntity: Articles::class, mappedBy: 'sous_categoriser')]
    private Collection $articlesc;

    #[ORM\ManyToMany(targetEntity: Categories::class, mappedBy: 'categoriser')]
    private Collection $categoriessc;

    #[ORM\ManyToMany(targetEntity: Forum::class, inversedBy: 'forum_sc')]
    private Collection $sc_forum;

    #[ORM\ManyToMany(targetEntity: Drive::class, inversedBy: 'drives_sc')]
    private Collection $sc_drive;

    #[ORM\ManyToMany(targetEntity: Suggestion::class, inversedBy: 'sug_sc')]
    private Collection $sc_sug;

    public function __construct()
    {
        $this->articlesc = new ArrayCollection();
        $this->categoriessc = new ArrayCollection();
        $this->sc_forum = new ArrayCollection();
        $this->sc_drive = new ArrayCollection();
        $this->sc_sug = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitresc(): ?string
    {
        return $this->titresc;
    }

    public function setTitresc(string $titresc): self
    {
        $this->titresc = $titresc;

        return $this;
    }

    /**
     * @return Collection<int, Articles>
     */
    public function getArticlesc(): Collection
    {
        return $this->articlesc;
    }

    public function addArticlesc(Articles $articlesc): self
    {
        if (!$this->articlesc->contains($articlesc)) {
            $this->articlesc->add($articlesc);
            $articlesc->addSousCategoriser($this);
        }

        return $this;
    }

    public function removeArticlesc(Articles $articlesc): self
    {
        if ($this->articlesc->removeElement($articlesc)) {
            $articlesc->removeSousCategoriser($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategoriessc(): Collection
    {
        return $this->categoriessc;
    }

    public function addCategoriessc(Categories $categoriessc): self
    {
        if (!$this->categoriessc->contains($categoriessc)) {
            $this->categoriessc->add($categoriessc);
            $categoriessc->addCategoriser($this);
        }

        return $this;
    }

    public function removeCategoriessc(Categories $categoriessc): self
    {
        if ($this->categoriessc->removeElement($categoriessc)) {
            $categoriessc->removeCategoriser($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Forum>
     */
    public function getScForum(): Collection
    {
        return $this->sc_forum;
    }

    public function addScForum(Forum $scForum): self
    {
        if (!$this->sc_forum->contains($scForum)) {
            $this->sc_forum->add($scForum);
        }

        return $this;
    }

    public function removeScForum(Forum $scForum): self
    {
        $this->sc_forum->removeElement($scForum);

        return $this;
    }

    /**
     * @return Collection<int, Drive>
     */
    public function getScDrive(): Collection
    {
        return $this->sc_drive;
    }

    public function addScDrive(Drive $scDrive): self
    {
        if (!$this->sc_drive->contains($scDrive)) {
            $this->sc_drive->add($scDrive);
        }

        return $this;
    }

    public function removeScDrive(Drive $scDrive): self
    {
        $this->sc_drive->removeElement($scDrive);

        return $this;
    }

    /**
     * @return Collection<int, Suggestion>
     */
    public function getScSug(): Collection
    {
        return $this->sc_sug;
    }

    public function addScSug(Suggestion $scSug): self
    {
        if (!$this->sc_sug->contains($scSug)) {
            $this->sc_sug->add($scSug);
        }

        return $this;
    }

    public function removeScSug(Suggestion $scSug): self
    {
        $this->sc_sug->removeElement($scSug);

        return $this;
    }
}
