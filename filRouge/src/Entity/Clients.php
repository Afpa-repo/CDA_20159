<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientsRepository::class)
 */
class Clients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MdpClient;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $MatriculeSociete;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NomSociete;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $CodePostal;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Ville;

    /**
     * @ORM\Column(type="string", length=15)
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
     * @ORM\Column(type="datetime")
     */
    private $DateInscription;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Tva;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="IdClient")
     */
    private $CommandeClients;

    /**
     * @ORM\ManyToOne(targetEntity=Employers::class, inversedBy="EmployersClients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdEmployer;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieClients::class, inversedBy="CategorieClientsDunClient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdCatClient;

    public function __construct()
    {
        $this->CommandeClients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMdpClient(): ?string
    {
        return $this->MdpClient;
    }

    public function setMdpClient(string $MdpClient): self
    {
        $this->MdpClient = $MdpClient;

        return $this;
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

    public function setNomSociete(string $NomSociete): self
    {
        $this->NomSociete = $NomSociete;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->CodePostal;
    }

    public function setCodePostal(string $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(string $Pays): self
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

    public function setDateInscription(\DateTimeInterface $DateInscription): self
    {
        $this->DateInscription = $DateInscription;

        return $this;
    }

    public function getTva(): ?string
    {
        return $this->Tva;
    }

    public function setTva(string $Tva): self
    {
        $this->Tva = $Tva;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandeClients(): Collection
    {
        return $this->CommandeClients;
    }

    public function addCommandeClient(Commande $commandeClient): self
    {
        if (!$this->CommandeClients->contains($commandeClient)) {
            $this->CommandeClients[] = $commandeClient;
            $commandeClient->setIdClient($this);
        }

        return $this;
    }

    public function removeCommandeClient(Commande $commandeClient): self
    {
        if ($this->CommandeClients->removeElement($commandeClient)) {
            // set the owning side to null (unless already changed)
            if ($commandeClient->getIdClient() === $this) {
                $commandeClient->setIdClient(null);
            }
        }

        return $this;
    }

    public function getIdEmployer(): ?Employers
    {
        return $this->IdEmployer;
    }

    public function setIdEmployer(?Employers $IdEmployer): self
    {
        $this->IdEmployer = $IdEmployer;

        return $this;
    }

    public function getIdCatClient(): ?CategorieClients
    {
        return $this->IdCatClient;
    }

    public function setIdCatClient(?CategorieClients $IdCatClient): self
    {
        $this->IdCatClient = $IdCatClient;

        return $this;
    }
}
