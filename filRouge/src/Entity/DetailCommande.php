<?php

namespace App\Entity;

use App\Repository\DetailCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetailCommandeRepository::class)
 */
class DetailCommande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $prixTotal;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2, nullable=true)
     */
    private $remise;

    /**
     * @ORM\ManyToOne(targetEntity=Produits::class, inversedBy="DetailCommandeProduits")
     */
    private $IdProduit;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="DetailCommandeDuneCommande")
     */
    private $IdCommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixTotal(): ?string
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(string $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getRemise(): ?string
    {
        return $this->remise;
    }

    public function setRemise(?string $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getIdProduit(): ?Produits
    {
        return $this->IdProduit;
    }

    public function setIdProduit(?Produits $IdProduit): self
    {
        $this->IdProduit = $IdProduit;

        return $this;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->IdCommande;
    }

    public function setIdCommande(?Commande $IdCommande): self
    {
        $this->IdCommande = $IdCommande;

        return $this;
    }
}
