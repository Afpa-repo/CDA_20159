<?php

namespace App\Entity;

use App\Repository\CategorieClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieClientsRepository::class)
 */
class CategorieClients
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
    private $CatClient;

    /**
     * @ORM\OneToMany(targetEntity=Clients::class, mappedBy="IdCatClient")
     */
    private $CategorieClientsDunClient;

    public function __construct()
    {
        $this->CategorieClientsDunClient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatClient(): ?string
    {
        return $this->CatClient;
    }

    public function setCatClient(string $CatClient): self
    {
        $this->CatClient = $CatClient;

        return $this;
    }

    /**
     * @return Collection|Clients[]
     */
    public function getCategorieClientsDunClient(): Collection
    {
        return $this->CategorieClientsDunClient;
    }

    public function addCategorieClientsDunClient(Clients $categorieClientsDunClient): self
    {
        if (!$this->CategorieClientsDunClient->contains($categorieClientsDunClient)) {
            $this->CategorieClientsDunClient[] = $categorieClientsDunClient;
            $categorieClientsDunClient->setIdCatClient($this);
        }

        return $this;
    }

    public function removeCategorieClientsDunClient(Clients $categorieClientsDunClient): self
    {
        if ($this->CategorieClientsDunClient->removeElement($categorieClientsDunClient)) {
            // set the owning side to null (unless already changed)
            if ($categorieClientsDunClient->getIdCatClient() === $this) {
                $categorieClientsDunClient->setIdCatClient(null);
            }
        }

        return $this;
    }
}
