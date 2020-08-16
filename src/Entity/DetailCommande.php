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
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="detailCommandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    /**
     * @ORM\ManyToOne(targetEntity=Stampwish::class, inversedBy="detailCommandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stampwish;

    /**
     * @ORM\ManyToOne(targetEntity=Goodies::class, inversedBy="detailCommandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $goodies;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getStampwish(): ?Stampwish
    {
        return $this->stampwish;
    }

    public function setStampwish(?Stampwish $stampwish): self
    {
        $this->stampwish = $stampwish;

        return $this;
    }

    public function getGoodies(): ?Goodies
    {
        return $this->goodies;
    }

    public function setGoodies(?Goodies $goodies): self
    {
        $this->goodies = $goodies;

        return $this;
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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
