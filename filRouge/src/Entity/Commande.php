<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateCommande;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateLivraison;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateEnvoi;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDePaiement;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $AdresseLivraison;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2, nullable=true)
     */
    private $FraisTransport;

    /**
     * @ORM\OneToMany(targetEntity=DetailCommande::class, mappedBy="IdCommande")
     */
    private $DetailCommandeDuneCommande;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="CommandeClients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdClient;

    public function __construct()
    {
        $this->DetailCommandeDuneCommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->DateCommande;
    }

    public function setDateCommande(\DateTimeInterface $DateCommande): self
    {
        $this->DateCommande = $DateCommande;

        return $this;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->DateLivraison;
    }

    public function setDateLivraison(\DateTimeInterface $DateLivraison): self
    {
        $this->DateLivraison = $DateLivraison;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->DateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $DateEnvoi): self
    {
        $this->DateEnvoi = $DateEnvoi;

        return $this;
    }

    public function getDateDePaiement(): ?\DateTimeInterface
    {
        return $this->dateDePaiement;
    }

    public function setDateDePaiement(\DateTimeInterface $dateDePaiement): self
    {
        $this->dateDePaiement = $dateDePaiement;

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->AdresseLivraison;
    }

    public function setAdresseLivraison(string $AdresseLivraison): self
    {
        $this->AdresseLivraison = $AdresseLivraison;

        return $this;
    }

    public function getFraisTransport(): ?string
    {
        return $this->FraisTransport;
    }

    public function setFraisTransport(?string $FraisTransport): self
    {
        $this->FraisTransport = $FraisTransport;

        return $this;
    }

    /**
     * @return Collection|DetailCommande[]
     */
    public function getDetailCommandeDuneCommande(): Collection
    {
        return $this->DetailCommandeDuneCommande;
    }

    public function addDetailCommandeDuneCommande(DetailCommande $detailCommandeDuneCommande): self
    {
        if (!$this->DetailCommandeDuneCommande->contains($detailCommandeDuneCommande)) {
            $this->DetailCommandeDuneCommande[] = $detailCommandeDuneCommande;
            $detailCommandeDuneCommande->setIdCommande($this);
        }

        return $this;
    }

    public function removeDetailCommandeDuneCommande(DetailCommande $detailCommandeDuneCommande): self
    {
        if ($this->DetailCommandeDuneCommande->removeElement($detailCommandeDuneCommande)) {
            // set the owning side to null (unless already changed)
            if ($detailCommandeDuneCommande->getIdCommande() === $this) {
                $detailCommandeDuneCommande->setIdCommande(null);
            }
        }

        return $this;
    }

    public function getIdClient(): ?Clients
    {
        return $this->IdClient;
    }

    public function setIdClient(?Clients $IdClient): self
    {
        $this->IdClient = $IdClient;

        return $this;
    }
}
