<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $token = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $signature = null;

    #[ORM\OneToMany(mappedBy: 'creationsarticles', targetEntity: CreerArticles::class)]
    private Collection $creationArticles;

    #[ORM\OneToMany(mappedBy: 'creationf', targetEntity: CreerForum::class)]
    private Collection $creerForums;

    #[ORM\ManyToMany(targetEntity: Groupe::class, inversedBy: 'userslie')]
    private Collection $lier;

    #[ORM\OneToMany(mappedBy: 'userpart', targetEntity: Partager::class)]
    private Collection $userspartage;

    #[ORM\OneToMany(mappedBy: 'usersrf', targetEntity: ReponseForum::class)]
    private Collection $reponseForumUsers;

    #[ORM\ManyToMany(targetEntity: Suggestion::class, mappedBy: 'sug_users')]
    private Collection $suggestionsu;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    public function __construct()
    {
        $this->creationArticles = new ArrayCollection();
        $this->creerForums = new ArrayCollection();
        $this->lier = new ArrayCollection();
        $this->userspartage = new ArrayCollection();
        $this->reponseForumUsers = new ArrayCollection();
        $this->suggestionsu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

    
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): self
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @return Collection<int, CreerArticles>
     */
    public function getCreationArticles(): Collection
    {
        return $this->creationArticles;
    }

    public function addCreationArticle(CreerArticles $creationArticle): self
    {
        if (!$this->creationArticles->contains($creationArticle)) {
            $this->creationArticles->add($creationArticle);
            $creationArticle->setRelation($this);
        }

        return $this;
    }

    public function removeCreationArticle(CreerArticles $creationArticle): self
    {
        if ($this->creationArticles->removeElement($creationArticle)) {
            // set the owning side to null (unless already changed)
            if ($creationArticle->getRelation() === $this) {
                $creationArticle->setRelation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CreerForum>
     */
    public function getCreerForums(): Collection
    {
        return $this->creerForums;
    }

    public function addCreerForum(CreerForum $creerForum): self
    {
        if (!$this->creerForums->contains($creerForum)) {
            $this->creerForums->add($creerForum);
            $creerForum->setCreationf($this);
        }

        return $this;
    }

    public function removeCreerForum(CreerForum $creerForum): self
    {
        if ($this->creerForums->removeElement($creerForum)) {
            // set the owning side to null (unless already changed)
            if ($creerForum->getCreationf() === $this) {
                $creerForum->setCreationf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Groupe>
     */
    public function getLier(): Collection
    {
        return $this->lier;
    }

    public function addLier(Groupe $lier): self
    {
        if (!$this->lier->contains($lier)) {
            $this->lier->add($lier);
        }

        return $this;
    }

    public function removeLier(Groupe $lier): self
    {
        $this->lier->removeElement($lier);

        return $this;
    }

    /**
     * @return Collection<int, Partager>
     */
    public function getUserspartage(): Collection
    {
        return $this->userspartage;
    }

    public function addUserspartage(Partager $userspartage): self
    {
        if (!$this->userspartage->contains($userspartage)) {
            $this->userspartage->add($userspartage);
            $userspartage->setUserpart($this);
        }

        return $this;
    }

    public function removeUserspartage(Partager $userspartage): self
    {
        if ($this->userspartage->removeElement($userspartage)) {
            // set the owning side to null (unless already changed)
            if ($userspartage->getUserpart() === $this) {
                $userspartage->setUserpart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReponseForum>
     */
    public function getReponseForumUsers(): Collection
    {
        return $this->reponseForumUsers;
    }

    public function addReponseForumUser(ReponseForum $reponseForumUser): self
    {
        if (!$this->reponseForumUsers->contains($reponseForumUser)) {
            $this->reponseForumUsers->add($reponseForumUser);
            $reponseForumUser->setUsersrf($this);
        }

        return $this;
    }

    public function removeReponseForumUser(ReponseForum $reponseForumUser): self
    {
        if ($this->reponseForumUsers->removeElement($reponseForumUser)) {
            // set the owning side to null (unless already changed)
            if ($reponseForumUser->getUsersrf() === $this) {
                $reponseForumUser->setUsersrf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Suggestion>
     */
    public function getSuggestionsu(): Collection
    {
        return $this->suggestionsu;
    }

    public function addSuggestionsu(Suggestion $suggestionsu): self
    {
        if (!$this->suggestionsu->contains($suggestionsu)) {
            $this->suggestionsu->add($suggestionsu);
            $suggestionsu->addSugUser($this);
        }

        return $this;
    }

    public function removeSuggestionsu(Suggestion $suggestionsu): self
    {
        if ($this->suggestionsu->removeElement($suggestionsu)) {
            $suggestionsu->removeSugUser($this);
        }

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
