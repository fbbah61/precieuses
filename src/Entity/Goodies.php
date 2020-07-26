<?php

namespace App\Entity;

use App\Repository\GoodiesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GoodiesRepository::class)
 */
class Goodies
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
    private $goodies_nom1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goodies_nom2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goodies_nom3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goodies_nom4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goodies_nom5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goodies_nom6;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goodies_nom7;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goodies_nom8;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goodies_nom9;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goodies_nom10;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoodiesNom1(): ?string
    {
        return $this->goodies_nom1;
    }

    public function setGoodiesNom1(string $goodies_nom1): self
    {
        $this->goodies_nom1 = $goodies_nom1;

        return $this;
    }

    public function getGoodiesNom2(): ?string
    {
        return $this->goodies_nom2;
    }

    public function setGoodiesNom2(string $goodies_nom2): self
    {
        $this->goodies_nom2 = $goodies_nom2;

        return $this;
    }

    public function getGoodiesNom3(): ?string
    {
        return $this->goodies_nom3;
    }

    public function setGoodiesNom3(string $goodies_nom3): self
    {
        $this->goodies_nom3 = $goodies_nom3;

        return $this;
    }

    public function getGoodiesNom4(): ?string
    {
        return $this->goodies_nom4;
    }

    public function setGoodiesNom4(string $goodies_nom4): self
    {
        $this->goodies_nom4 = $goodies_nom4;

        return $this;
    }

    public function getGoodiesNom5(): ?string
    {
        return $this->goodies_nom5;
    }

    public function setGoodiesNom5(string $goodies_nom5): self
    {
        $this->goodies_nom5 = $goodies_nom5;

        return $this;
    }

    public function getGoodiesNom6(): ?string
    {
        return $this->goodies_nom6;
    }

    public function setGoodiesNom6(string $goodies_nom6): self
    {
        $this->goodies_nom6 = $goodies_nom6;

        return $this;
    }

    public function getGoodiesNom7(): ?string
    {
        return $this->goodies_nom7;
    }

    public function setGoodiesNom7(string $goodies_nom7): self
    {
        $this->goodies_nom7 = $goodies_nom7;

        return $this;
    }

    public function getGoodiesNom8(): ?string
    {
        return $this->goodies_nom8;
    }

    public function setGoodiesNom8(string $goodies_nom8): self
    {
        $this->goodies_nom8 = $goodies_nom8;

        return $this;
    }

    public function getGoodiesNom9(): ?string
    {
        return $this->goodies_nom9;
    }

    public function setGoodiesNom9(string $goodies_nom9): self
    {
        $this->goodies_nom9 = $goodies_nom9;

        return $this;
    }

    public function getGoodiesNom10(): ?string
    {
        return $this->goodies_nom10;
    }

    public function setGoodiesNom10(string $goodies_nom10): self
    {
        $this->goodies_nom10 = $goodies_nom10;

        return $this;
    }
}
