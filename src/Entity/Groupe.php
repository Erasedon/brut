<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Users::class, mappedBy: 'lier')]
    private Collection $userslie;

    public function __construct()
    {
        $this->userslie = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Users>
     */
    public function getUserslie(): Collection
    {
        return $this->userslie;
    }

    public function addUserslie(Users $userslie): self
    {
        if (!$this->userslie->contains($userslie)) {
            $this->userslie->add($userslie);
            $userslie->addLier($this);
        }

        return $this;
    }

    public function removeUserslie(Users $userslie): self
    {
        if ($this->userslie->removeElement($userslie)) {
            $userslie->removeLier($this);
        }

        return $this;
    }
}
