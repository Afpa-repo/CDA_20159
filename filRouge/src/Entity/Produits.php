<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 */
class Produits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NomProduit;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $CodeProduit;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $LibelleProduit;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $DescriptionProduit;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $PrixProduit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StockProduit;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $CouleurProduit;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $PhotoProduit;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateAjoutProduit;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateModifProduit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StockAlert;

    /**
     * @ORM\ManyToOne(targetEntity=SousCat::class, inversedBy="SousCatProduits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdSousCat;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseurs::class, inversedBy="ProduitsFournisseur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdFournisseur;

    /**
     * @ORM\OneToMany(targetEntity=DetailCommande::class, mappedBy="IdProduit")
     */
    private $DetailCommandeProduits;

    public function __construct()
    {
        $this->DetailCommandeProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->NomProduit;
    }

    public function setNomProduit(string $NomProduit): self
    {
        $this->NomProduit = $NomProduit;

        return $this;
    }

    public function getCodeProduit(): ?string
    {
        return $this->CodeProduit;
    }

    public function setCodeProduit(string $CodeProduit): self
    {
        $this->CodeProduit = $CodeProduit;

        return $this;
    }

    public function getLibelleProduit(): ?string
    {
        return $this->LibelleProduit;
    }

    public function setLibelleProduit(string $LibelleProduit): self
    {
        $this->LibelleProduit = $LibelleProduit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->DescriptionProduit;
    }

    public function setDescriptionProduit(?string $DescriptionProduit): self
    {
        $this->DescriptionProduit = $DescriptionProduit;

        return $this;
    }

    public function getPrixProduit(): ?string
    {
        return $this->PrixProduit;
    }

    public function setPrixProduit(?string $PrixProduit): self
    {
        $this->PrixProduit = $PrixProduit;

        return $this;
    }

    public function getStockProduit(): ?int
    {
        return $this->StockProduit;
    }

    public function setStockProduit(?int $StockProduit): self
    {
        $this->StockProduit = $StockProduit;

        return $this;
    }

    public function getCouleurProduit(): ?string
    {
        return $this->CouleurProduit;
    }

    public function setCouleurProduit(?string $CouleurProduit): self
    {
        $this->CouleurProduit = $CouleurProduit;

        return $this;
    }

    public function getPhotoProduit(): ?string
    {
        return $this->PhotoProduit;
    }

    public function setPhotoProduit(?string $PhotoProduit): self
    {
        $this->PhotoProduit = $PhotoProduit;

        return $this;
    }

    public function getDateAjoutProduit(): ?\DateTimeInterface
    {
        return $this->DateAjoutProduit;
    }

    public function setDateAjoutProduit(?\DateTimeInterface $DateAjoutProduit): self
    {
        $this->DateAjoutProduit = $DateAjoutProduit;

        return $this;
    }

    public function getDateModifProduit(): ?\DateTimeInterface
    {
        return $this->DateModifProduit;
    }

    public function setDateModifProduit(?\DateTimeInterface $DateModifProduit): self
    {
        $this->DateModifProduit = $DateModifProduit;

        return $this;
    }

    public function getStockAlert(): ?int
    {
        return $this->StockAlert;
    }

    public function setStockAlert(?int $StockAlert): self
    {
        $this->StockAlert = $StockAlert;

        return $this;
    }

    public function getIdSousCat(): ?SousCat
    {
        return $this->IdSousCat;
    }

    public function setIdSousCat(?SousCat $IdSousCat): self
    {
        $this->IdSousCat = $IdSousCat;

        return $this;
    }

    public function getIdFournisseur(): ?Fournisseurs
    {
        return $this->IdFournisseur;
    }

    public function setIdFournisseur(?Fournisseurs $IdFournisseur): self
    {
        $this->IdFournisseur = $IdFournisseur;

        return $this;
    }

    /**
     * @return Collection|DetailCommande[]
     */
    public function getDetailCommandeProduits(): Collection
    {
        return $this->DetailCommandeProduits;
    }

    public function addDetailCommandeProduit(DetailCommande $detailCommandeProduit): self
    {
        if (!$this->DetailCommandeProduits->contains($detailCommandeProduit)) {
            $this->DetailCommandeProduits[] = $detailCommandeProduit;
            $detailCommandeProduit->setIdProduit($this);
        }

        return $this;
    }

    public function removeDetailCommandeProduit(DetailCommande $detailCommandeProduit): self
    {
        if ($this->DetailCommandeProduits->removeElement($detailCommandeProduit)) {
            // set the owning side to null (unless already changed)
            if ($detailCommandeProduit->getIdProduit() === $this) {
                $detailCommandeProduit->setIdProduit(null);
            }
        }

        return $this;
    }





}
