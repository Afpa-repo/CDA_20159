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
     * @ORM\OneToMany(targetEntity=Clients::class, mappedBy="CatClient")
     */
    private $CategorieClients;

    public function __construct()
    {
        $this->CategorieClients = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->CatClient;
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
    public function getCategorieClients(): Collection
    {
        return $this->CategorieClients;
    }

    public function addCategorieClient(Clients $categorieClient): self
    {
        if (!$this->CategorieClients->contains($categorieClient)) {
            $this->CategorieClients[] = $categorieClient;
            $categorieClient->setCatClient($this);
        }

        return $this;
    }

    public function removeCategorieClient(Clients $categorieClient): self
    {
        if ($this->CategorieClients->removeElement($categorieClient)) {
            // set the owning side to null (unless already changed)
            if ($categorieClient->getCatClient() === $this) {
                $categorieClient->setCatClient(null);
            }
        }

        return $this;
    }
}
