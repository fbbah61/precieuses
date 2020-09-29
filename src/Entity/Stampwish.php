<?php

namespace App\Entity;

use App\Repository\StampwishRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StampwishRepository::class)
 */
class Stampwish
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
    private $theme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomExpediteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomDestinataire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseDestinataire;

    /**
     * @ORM\OneToMany(targetEntity=DetailCommande::class, mappedBy="stampwish", orphanRemoval=true)
     */
    private $detailCommandes;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="stampwishes", fetch="LAZY")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Cart::class, inversedBy="stampwishes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cart;

    public function __construct($user)
    {
        $this->user = $user;
        $this->detailCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getNomExpediteur(): ?string
    {
        return $this->nomExpediteur;
    }

    public function setNomExpediteur(string $nomExpediteur): self
    {
        $this->nomExpediteur = $nomExpediteur;

        return $this;
    }

    public function getNomDestinataire(): ?string
    {
        return $this->nomDestinataire;
    }

    public function setNomDestinataire(string $nomDestinataire): self
    {
        $this->nomDestinataire = $nomDestinataire;

        return $this;
    }

    public function getAdresseDestinataire(): ?string
    {
        return $this->adresseDestinataire;
    }

    public function setAdresseDestinataire(string $adresseDestinataire): self
    {
        $this->adresseDestinataire = $adresseDestinataire;

        return $this;
    }

    /**
     * @return Collection|DetailCommande[]
     */
    public function getDetailCommandes(): Collection
    {
        return $this->detailCommandes;
    }

    public function addDetailCommande(DetailCommande $detailCommande): self
    {
        if (!$this->detailCommandes->contains($detailCommande)) {
            $this->detailCommandes[] = $detailCommande;
            $detailCommande->setStampwish($this);
        }

        return $this;
    }

    public function removeDetailCommande(DetailCommande $detailCommande): self
    {
        if ($this->detailCommandes->contains($detailCommande)) {
            $this->detailCommandes->removeElement($detailCommande);
            // set the owning side to null (unless already changed)
            if ($detailCommande->getStampwish() === $this) {
                $detailCommande->setStampwish(null);
            }
        }

        return $this;
    }

    /*public function __toString()
    {
        return $this->username. '';
    }*/

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(?Cart $cart): self
    {
        $this->cart = $cart;

        return $this;
    }
}
