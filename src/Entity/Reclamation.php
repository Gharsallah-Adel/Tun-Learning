<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
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
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Formationn::class, mappedBy="reclamation")
     */
    private $relation;

    /**
     * @ORM\ManyToOne(targetEntity=Formationn::class, inversedBy="reclamation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Formationn[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Formationn $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setReclamation($this);
        }

        return $this;
    }

    public function removeRelation(Formationn $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getReclamation() === $this) {
                $relation->setReclamation(null);
            }
        }

        return $this;
    }

    public function getFormation(): ?Formationn
    {
        return $this->formation;
    }

    public function setFormation(?Formationn $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
}
