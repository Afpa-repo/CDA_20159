<?php

namespace App\Entity;

use App\Repository\FournisseursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseursRepository::class)
 */
class Fournisseurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $MatriculeSociete;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NomSociete;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $AdresseFournisseur;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $CpFournisseur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $VilleFournisseur;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $PaysFournisseur;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $NumTelFournisseur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateInscFournisseur;

    /**
     * @ORM\OneToMany(targetEntity=Produits::class, mappedBy="IdFournisseur")
     */
    private $ProduitsFournisseur;

    public function __construct()
    {
        $this->ProduitsFournisseur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatriculeSociete(): ?string
    {
        return $this->MatriculeSociete;
    }

    public function setMatriculeSociete(string $MatriculeSociete): self
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

    public function getAdresseFournisseur(): ?string
    {
        return $this->AdresseFournisseur;
    }

    public function setAdresseFournisseur(string $AdresseFournisseur): self
    {
        $this->AdresseFournisseur = $AdresseFournisseur;

        return $this;
    }

    public function getCpFournisseur(): ?string
    {
        return $this->CpFournisseur;
    }

    public function setCpFournisseur(string $CpFournisseur): self
    {
        $this->CpFournisseur = $CpFournisseur;

        return $this;
    }

    public function getVilleFournisseur(): ?string
    {
        return $this->VilleFournisseur;
    }

    public function setVilleFournisseur(string $VilleFournisseur): self
    {
        $this->VilleFournisseur = $VilleFournisseur;

        return $this;
    }

    public function getPaysFournisseur(): ?string
    {
        return $this->PaysFournisseur;
    }

    public function setPaysFournisseur(string $PaysFournisseur): self
    {
        $this->PaysFournisseur = $PaysFournisseur;

        return $this;
    }

    public function getNumTelFournisseur(): ?string
    {
        return $this->NumTelFournisseur;
    }

    public function setNumTelFournisseur(?string $NumTelFournisseur): self
    {
        $this->NumTelFournisseur = $NumTelFournisseur;

        return $this;
    }

    public function getDateInscFournisseur(): ?\DateTimeInterface
    {
        return $this->DateInscFournisseur;
    }

    public function setDateInscFournisseur(\DateTimeInterface $DateInscFournisseur): self
    {
        $this->DateInscFournisseur = $DateInscFournisseur;

        return $this;
    }

    /**
     * @return Collection|Produits[]
     */
    public function getProduitsFournisseur(): Collection
    {
        return $this->ProduitsFournisseur;
    }

    public function addProduitsFournisseur(Produits $produitsFournisseur): self
    {
        if (!$this->ProduitsFournisseur->contains($produitsFournisseur)) {
            $this->ProduitsFournisseur[] = $produitsFournisseur;
            $produitsFournisseur->setIdFournisseur($this);
        }

        return $this;
    }

    public function removeProduitsFournisseur(Produits $produitsFournisseur): self
    {
        if ($this->ProduitsFournisseur->removeElement($produitsFournisseur)) {
            // set the owning side to null (unless already changed)
            if ($produitsFournisseur->getIdFournisseur() === $this) {
                $produitsFournisseur->setIdFournisseur(null);
            }
        }

        return $this;
    }
}
