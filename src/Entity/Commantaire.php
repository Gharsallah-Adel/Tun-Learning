<?php

namespace App\Entity;

use App\Repository\CommantaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommantaireRepository::class)
 */
class Commantaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateComm;

    /**
     * @ORM\ManyToOne(targetEntity=Formationn::class, inversedBy="commentaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateComm(): ?\DateTimeInterface
    {
        return $this->dateComm;
    }

    public function setDateComm(\DateTimeInterface $dateComm): self
    {
        $this->dateComm = $dateComm;

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
