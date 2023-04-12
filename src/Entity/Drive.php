<?php

namespace App\Entity;

use App\Repository\DriveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriveRepository::class)]
class Drive
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $taille_max = null;

    #[ORM\OneToMany(mappedBy: 'drivepart', targetEntity: Partager::class)]
    private Collection $driverpartager;

    #[ORM\ManyToMany(targetEntity: SousCategories::class, mappedBy: 'sc_drive')]
    private Collection $drives_sc;

    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'drivem')]
    private Collection $drive_media;

    public function __construct()
    {
        $this->driverpartager = new ArrayCollection();
        $this->drives_sc = new ArrayCollection();
        $this->drive_media = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTailleMax(): ?float
    {
        return $this->taille_max;
    }

    public function setTailleMax(float $taille_max): self
    {
        $this->taille_max = $taille_max;

        return $this;
    }

    /**
     * @return Collection<int, Partager>
     */
    public function getDriverpartager(): Collection
    {
        return $this->driverpartager;
    }

    public function addDriverpartager(Partager $driverpartager): self
    {
        if (!$this->driverpartager->contains($driverpartager)) {
            $this->driverpartager->add($driverpartager);
            $driverpartager->setDrivepart($this);
        }

        return $this;
    }

    public function removeDriverpartager(Partager $driverpartager): self
    {
        if ($this->driverpartager->removeElement($driverpartager)) {
            // set the owning side to null (unless already changed)
            if ($driverpartager->getDrivepart() === $this) {
                $driverpartager->setDrivepart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SousCategories>
     */
    public function getDrivesSc(): Collection
    {
        return $this->drives_sc;
    }

    public function addDrivesSc(SousCategories $drivesSc): self
    {
        if (!$this->drives_sc->contains($drivesSc)) {
            $this->drives_sc->add($drivesSc);
            $drivesSc->addScDrive($this);
        }

        return $this;
    }

    public function removeDrivesSc(SousCategories $drivesSc): self
    {
        if ($this->drives_sc->removeElement($drivesSc)) {
            $drivesSc->removeScDrive($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getDriveMedia(): Collection
    {
        return $this->drive_media;
    }

    public function addDriveMedium(Media $driveMedium): self
    {
        if (!$this->drive_media->contains($driveMedium)) {
            $this->drive_media->add($driveMedium);
        }

        return $this;
    }

    public function removeDriveMedium(Media $driveMedium): self
    {
        $this->drive_media->removeElement($driveMedium);

        return $this;
    }
}
