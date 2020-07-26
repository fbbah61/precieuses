<?php

namespace App\Entity;

use App\Repository\StampwishRepository;
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
    private $stampwish_nom1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stampwish_nom2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stampwish_nom3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stampwish_nom4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stampwish_nom5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stampwish_nom6;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stampwish_nom7;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stampwish_nom8;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stampwish_nom9;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stampwish_nom10;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStampwishNom1(): ?string
    {
        return $this->stampwish_nom1;
    }

    public function setStampwishNom1(string $stampwish_nom1): self
    {
        $this->stampwish_nom1 = $stampwish_nom1;

        return $this;
    }

    public function getStampwishNom2(): ?string
    {
        return $this->stampwish_nom2;
    }

    public function setStampwishNom2(string $stampwish_nom2): self
    {
        $this->stampwish_nom2 = $stampwish_nom2;

        return $this;
    }

    public function getStampwishNom3(): ?string
    {
        return $this->stampwish_nom3;
    }

    public function setStampwishNom3(string $stampwish_nom3): self
    {
        $this->stampwish_nom3 = $stampwish_nom3;

        return $this;
    }

    public function getStampwishNom4(): ?string
    {
        return $this->stampwish_nom4;
    }

    public function setStampwishNom4(string $stampwish_nom4): self
    {
        $this->stampwish_nom4 = $stampwish_nom4;

        return $this;
    }

    public function getStampwishNom5(): ?string
    {
        return $this->stampwish_nom5;
    }

    public function setStampwishNom5(string $stampwish_nom5): self
    {
        $this->stampwish_nom5 = $stampwish_nom5;

        return $this;
    }

    public function getStampwishNom6(): ?string
    {
        return $this->stampwish_nom6;
    }

    public function setStampwishNom6(string $stampwish_nom6): self
    {
        $this->stampwish_nom6 = $stampwish_nom6;

        return $this;
    }

    public function getStampwishNom7(): ?string
    {
        return $this->stampwish_nom7;
    }

    public function setStampwishNom7(string $stampwish_nom7): self
    {
        $this->stampwish_nom7 = $stampwish_nom7;

        return $this;
    }

    public function getStampwishNom8(): ?string
    {
        return $this->stampwish_nom8;
    }

    public function setStampwishNom8(string $stampwish_nom8): self
    {
        $this->stampwish_nom8 = $stampwish_nom8;

        return $this;
    }

    public function getStampwishNom9(): ?string
    {
        return $this->stampwish_nom9;
    }

    public function setStampwishNom9(string $stampwish_nom9): self
    {
        $this->stampwish_nom9 = $stampwish_nom9;

        return $this;
    }

    public function getStampwishNom10(): ?string
    {
        return $this->stampwish_nom10;
    }

    public function setStampwishNom10(string $stampwish_nom10): self
    {
        $this->stampwish_nom10 = $stampwish_nom10;

        return $this;
    }
}
