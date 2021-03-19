<?php

namespace App\Entity;

use App\Repository\SousCatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousCatRepository::class)
 */
class SousCat
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
    private $NomSousCat;

    /**
     * @ORM\OneToMany(targetEntity=Produits::class, mappedBy="IdSousCat")
     */
    private $SousCatProduits;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieProduits::class, inversedBy="SousCatCategorieProduits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdCatProduit;

    public function __construct()
    {
        $this->SousCatProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSousCat(): ?string
    {
        return $this->NomSousCat;
    }

    public function setNomSousCat(string $NomSousCat): self
    {
        $this->NomSousCat = $NomSousCat;

        return $this;
    }

    /**
     * @return Collection|Produits[]
     */
    public function getSousCatProduits(): Collection
    {
        return $this->SousCatProduits;
    }

    public function addSousCatProduit(Produits $sousCatProduit): self
    {
        if (!$this->SousCatProduits->contains($sousCatProduit)) {
            $this->SousCatProduits[] = $sousCatProduit;
            $sousCatProduit->setIdSousCat($this);
        }

        return $this;
    }

    public function removeSousCatProduit(Produits $sousCatProduit): self
    {
        if ($this->SousCatProduits->removeElement($sousCatProduit)) {
            // set the owning side to null (unless already changed)
            if ($sousCatProduit->getIdSousCat() === $this) {
                $sousCatProduit->setIdSousCat(null);
            }
        }

        return $this;
    }

    public function getIdCatProduit(): ?CategorieProduits
    {
        return $this->IdCatProduit;
    }

    public function setIdCatProduit(?CategorieProduits $IdCatProduit): self
    {
        $this->IdCatProduit = $IdCatProduit;

        return $this;
    }
}
