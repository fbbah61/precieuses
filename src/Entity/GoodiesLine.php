<?php

namespace App\Entity;

use App\Repository\GoodiesLineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GoodiesLineRepository::class)
 */
class GoodiesLine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Goodies::class, inversedBy="goodiesLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $goodies;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Cart::class, inversedBy="goodiesLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cart;

    public function __construct(Goodies $goodies, Cart $cart)
    {
        $this->goodies = $goodies;
        $this->cart = $cart;
        $this->quantity = 1;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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
