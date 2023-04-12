<?php

namespace App\Entity;

use App\Repository\ReponseForumRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseForumRepository::class)]
class ReponseForum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2000)]
    private ?string $description_rf = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_rf = null;

    #[ORM\ManyToOne(inversedBy: 'reponseForumUsers')]
    private ?Users $usersrf = null;

    #[ORM\ManyToOne(inversedBy: 'reponseForumMedia')]
    private ?Media $mediarf = null;

    #[ORM\ManyToOne(inversedBy: 'reponseForums')]
    private ?Forum $forumrf = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionRf(): ?string
    {
        return $this->description_rf;
    }

    public function setDescriptionRf(string $description_rf): self
    {
        $this->description_rf = $description_rf;

        return $this;
    }

    public function getDateRf(): ?\DateTimeInterface
    {
        return $this->date_rf;
    }

    public function setDateRf(\DateTimeInterface $date_rf): self
    {
        $this->date_rf = $date_rf;

        return $this;
    }

    public function getUsersrf(): ?Users
    {
        return $this->usersrf;
    }

    public function setUsersrf(?Users $usersrf): self
    {
        $this->usersrf = $usersrf;

        return $this;
    }

    public function getMediarf(): ?Media
    {
        return $this->mediarf;
    }

    public function setMediarf(?Media $mediarf): self
    {
        $this->mediarf = $mediarf;

        return $this;
    }

    public function getForumrf(): ?Forum
    {
        return $this->forumrf;
    }

    public function setForumrf(?Forum $forumrf): self
    {
        $this->forumrf = $forumrf;

        return $this;
    }
}
