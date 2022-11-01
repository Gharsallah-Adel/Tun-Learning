<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $nomCat;

    /**
     * @ORM\ManyToOne(targetEntity=Formationn::class, inversedBy="Relation")
     */
    private $formationn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCat(): ?string
    {
        return $this->nomCat;
    }

    public function setNomCat(string $nomCat): self
    {
        $this->nomCat = $nomCat;

        return $this;
    }

    public function getFormationn(): ?Formationn
    {
        return $this->formationn;
    }

    public function setFormationn(?Formationn $formationn): self
    {
        $this->formationn = $formationn;

        return $this;
    }
}
