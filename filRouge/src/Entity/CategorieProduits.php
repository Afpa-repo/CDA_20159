<?php

namespace App\Entity;

use App\Repository\CategorieProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieProduitsRepository::class)
 */
class CategorieProduits
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
    private $NomCatProduit;

    /**
     * @ORM\OneToMany(targetEntity=SousCat::class, mappedBy="IdCatProduit")
     */
    private $SousCatCategorieProduits;

    public function __construct()
    {
        $this->SousCatCategorieProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCatProduit(): ?string
    {
        return $this->NomCatProduit;
    }

    public function setNomCatProduit(string $NomCatProduit): self
    {
        $this->NomCatProduit = $NomCatProduit;

        return $this;
    }

    /**
     * @return Collection|SousCat[]
     */
    public function getSousCatCategorieProduits(): Collection
    {
        return $this->SousCatCategorieProduits;
    }

    public function addSousCatCategorieProduit(SousCat $sousCatCategorieProduit): self
    {
        if (!$this->SousCatCategorieProduits->contains($sousCatCategorieProduit)) {
            $this->SousCatCategorieProduits[] = $sousCatCategorieProduit;
            $sousCatCategorieProduit->setIdCatProduit($this);
        }

        return $this;
    }

    public function removeSousCatCategorieProduit(SousCat $sousCatCategorieProduit): self
    {
        if ($this->SousCatCategorieProduits->removeElement($sousCatCategorieProduit)) {
            // set the owning side to null (unless already changed)
            if ($sousCatCategorieProduit->getIdCatProduit() === $this) {
                $sousCatCategorieProduit->setIdCatProduit(null);
            }
        }

        return $this;
    }
}
