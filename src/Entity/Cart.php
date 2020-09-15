<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CartRepository::class)
 */
class Cart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isProcessed;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="carts")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Stampwish::class, mappedBy="cart", orphanRemoval=true)
     */
    private $stampwishes;

    /**
     * @ORM\ManyToMany(targetEntity=Goodies::class, inversedBy="carts")
     */
    private $goodies;

    /**
     * @ORM\OneToMany(targetEntity=GoodiesLine::class, mappedBy="cart", cascade={"persist", "merge"})
     */
    private $goodiesLines;

    public function __construct()
    {
        $this->stampwishes = new ArrayCollection();
        $this->goodies = new ArrayCollection();

        $this->date = new \DateTime();
        $this->isProcessed = false;
        $this->goodiesLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getIsProcessed(): ?bool
    {
        return $this->isProcessed;
    }

    public function setIsProcessed(bool $isProcessed): self
    {
        $this->isProcessed = $isProcessed;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Stampwish[]
     */
    public function getStampwishes(): Collection
    {
        return $this->stampwishes;
    }

    public function addStampwish(Stampwish $stampwish): self
    {
        if (!$this->stampwishes->contains($stampwish)) {
            $this->stampwishes[] = $stampwish;
            $stampwish->setCart($this);
        }

        return $this;
    }

    public function removeStampwish(Stampwish $stampwish): self
    {
        if ($this->stampwishes->contains($stampwish)) {
            $this->stampwishes->removeElement($stampwish);
            // set the owning side to null (unless already changed)
            if ($stampwish->getCart() === $this) {
                $stampwish->setCart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Goodies[]
     */
    public function getGoodies(): Collection
    {
        return $this->goodies;
    }

    public function addGoody(Goodies $goody): self
    {
        if (!$this->goodies->contains($goody)) {
            $this->goodies[] = $goody;
        }

        return $this;
    }

    public function removeGoody(Goodies $goody): self
    {
        if ($this->goodies->contains($goody)) {
            $this->goodies->removeElement($goody);
        }

        return $this;
    }

    /**
     * @return Collection|GoodiesLine[]
     */
    public function getGoodiesLines(): Collection
    {
        return $this->goodiesLines;
    }

    public function addGoodiesLine(GoodiesLine $goodiesLine): self
    {
        if (!$this->goodiesLines->contains($goodiesLine)) {
            $this->goodiesLines[] = $goodiesLine;
            $goodiesLine->setCart($this);
        }

        return $this;
    }

    public function removeGoodiesLine(GoodiesLine $goodiesLine): self
    {
        if ($this->goodiesLines->contains($goodiesLine)) {
            $this->goodiesLines->removeElement($goodiesLine);
            // set the owning side to null (unless already changed)
            if ($goodiesLine->getCart() === $this) {
                $goodiesLine->setCart(null);
            }
        }

        return $this;
    }
}
