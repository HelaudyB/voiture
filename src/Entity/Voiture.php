<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoitureRepository")
 */
class Voiture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marque", inversedBy="voitures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Puissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_km;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getPuissance(): ?string
    {
        return $this->Puissance;
    }

    public function setPuissance(string $Puissance): self
    {
        $this->Puissance = $Puissance;

        return $this;
    }

    public function getNombreKm(): ?int
    {
        return $this->nombre_km;
    }

    public function setNombreKm(int $nombre_km): self
    {
        $this->nombre_km = $nombre_km;

        return $this;
    }
    public function __toString()
    {
       return $this->marque;
    }
}
