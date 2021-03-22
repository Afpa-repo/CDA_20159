<?php

namespace App\Entity;

use App\Repository\EmployersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployersRepository::class)
 */
class Employers
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
    private $NomEmp;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $PrenomEmp;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $FonctionEmp;

    /**
     * @ORM\OneToMany(targetEntity=Clients::class, mappedBy="IdEmployer")
     */
    private $EmployersClients;

    public function __construct()
    {
        $this->EmployersClients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmp(): ?string
    {
        return $this->NomEmp;
    }

    public function setNomEmp(string $NomEmp): self
    {
        $this->NomEmp = $NomEmp;

        return $this;
    }

    public function getPrenomEmp(): ?string
    {
        return $this->PrenomEmp;
    }

    public function setPrenomEmp(string $PrenomEmp): self
    {
        $this->PrenomEmp = $PrenomEmp;

        return $this;
    }

    public function getFonctionEmp(): ?string
    {
        return $this->FonctionEmp;
    }

    public function setFonctionEmp(string $FonctionEmp): self
    {
        $this->FonctionEmp = $FonctionEmp;

        return $this;
    }

    /**
     * @return Collection|Clients[]
     */
    public function getEmployersClients(): Collection
    {
        return $this->EmployersClients;
    }

    public function addEmployersClient(Clients $employersClient): self
    {
        if (!$this->EmployersClients->contains($employersClient)) {
            $this->EmployersClients[] = $employersClient;
            $employersClient->setIdEmployer($this);
        }

        return $this;
    }

    public function removeEmployersClient(Clients $employersClient): self
    {
        if ($this->EmployersClients->removeElement($employersClient)) {
            // set the owning side to null (unless already changed)
            if ($employersClient->getIdEmployer() === $this) {
                $employersClient->setIdEmployer(null);
            }
        }

        return $this;
    }
}
