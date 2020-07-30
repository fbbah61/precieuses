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
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Membre::class, mappedBy="commande", orphanRemoval=true)
     */
    private $membre;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=DetailsCommande::class, inversedBy="commande")
     */
    private $detailsCommande;

    public function __construct()
    {
        $this->membre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Membre[]
     */
    public function getMembre(): Collection
    {
        return $this->membre;
    }

    public function addMembre(Membre $membre): self
    {
        if (!$this->membre->contains($membre)) {
            $this->membre[] = $membre;
            $membre->setCommande($this);
        }

        return $this;
    }

    public function removeMembre(Membre $membre): self
    {
        if ($this->membre->contains($membre)) {
            $this->membre->removeElement($membre);
            // set the owning side to null (unless already changed)
            if ($membre->getCommande() === $this) {
                $membre->setCommande(null);
            }
        }

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDetailsCommande(): ?DetailsCommande
    {
        return $this->detailsCommande;
    }

    public function setDetailsCommande(?DetailsCommande $detailsCommande): self
    {
        $this->detailsCommande = $detailsCommande;

        return $this;
    }
}
