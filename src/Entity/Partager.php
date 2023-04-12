<?php

namespace App\Entity;

use App\Repository\PartagerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartagerRepository::class)]
class Partager
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_partager = null;

    #[ORM\Column(length: 200)]
    private ?string $stocker_partager = null;

    #[ORM\Column(length: 255)]
    private ?string $autres_users = null;

    #[ORM\ManyToOne(inversedBy: 'userspartage')]
    private ?Users $userpart = null;

    #[ORM\ManyToOne(inversedBy: 'driverpartager')]
    private ?Drive $drivepart = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePartager(): ?\DateTimeInterface
    {
        return $this->date_partager;
    }

    public function setDatePartager(\DateTimeInterface $date_partager): self
    {
        $this->date_partager = $date_partager;

        return $this;
    }

    public function getStockerPartager(): ?string
    {
        return $this->stocker_partager;
    }

    public function setStockerPartager(string $stocker_partager): self
    {
        $this->stocker_partager = $stocker_partager;

        return $this;
    }

    public function getAutresUsers(): ?string
    {
        return $this->autres_users;
    }

    public function setAutresUsers(string $autres_users): self
    {
        $this->autres_users = $autres_users;

        return $this;
    }

    public function getUserpart(): ?Users
    {
        return $this->userpart;
    }

    public function setUserpart(?Users $userpart): self
    {
        $this->userpart = $userpart;

        return $this;
    }

    public function getDrivepart(): ?Drive
    {
        return $this->drivepart;
    }

    public function setDrivepart(?Drive $drivepart): self
    {
        $this->drivepart = $drivepart;

        return $this;
    }
}
