<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ClientsRepository::class)
 */
class Clients implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $MatriculeSociete;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $NomSociete;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $CodePostal;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Ville;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Pays;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $NumTel;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $NumFax;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateInscription;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Tva;

    /**
     * @ORM\Column(type="boolean")
     */
    private $VerifInfos;

    /**
     * @ORM\ManyToOne(targetEntity=Employers::class, inversedBy="EmployersClients")
     */
    private $Employer;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieClients::class, inversedBy="CategorieClients")
     */
    private $CatClient;

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
    public function getUsername(): string
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
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getMatriculeSociete(): ?string
    {
        return $this->MatriculeSociete;
    }

    public function setMatriculeSociete(?string $MatriculeSociete): self
    {
        $this->MatriculeSociete = $MatriculeSociete;

        return $this;
    }

    public function getNomSociete(): ?string
    {
        return $this->NomSociete;
    }

    public function setNomSociete(?string $NomSociete): self
    {
        $this->NomSociete = $NomSociete;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->CodePostal;
    }

    public function setCodePostal(?string $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(?string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(?string $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->NumTel;
    }

    public function setNumTel(?string $NumTel): self
    {
        $this->NumTel = $NumTel;

        return $this;
    }

    public function getNumFax(): ?string
    {
        return $this->NumFax;
    }

    public function setNumFax(?string $NumFax): self
    {
        $this->NumFax = $NumFax;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->DateInscription;
    }

    public function setDateInscription(?\DateTimeInterface $DateInscription): self
    {
        $this->DateInscription = $DateInscription;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->Tva;
    }

    public function setTva(?float $Tva): self
    {
        $this->Tva = $Tva;

        return $this;
    }

    public function getVerifInfos(): ?bool
    {
        return $this->VerifInfos;
    }

    public function setVerifInfos(bool $VerifInfos): self
    {
        $this->VerifInfos = $VerifInfos;

        return $this;
    }

    public function getEmployer(): ?Employers
    {
        return $this->Employer;
    }

    public function setEmployer(?Employers $Employer): self
    {
        $this->Employer = $Employer;

        return $this;
    }

    public function getCatClient(): ?CategorieClients
    {
        return $this->CatClient;
    }

    public function setCatClient(?CategorieClients $CatClient): self
    {
        $this->CatClient = $CatClient;

        return $this;
    }
}
