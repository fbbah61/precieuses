<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MembreRepository::class)
 */
class Membre
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
    private $membre_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $membre_prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $membre_civilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $membre_adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $membre_code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMembreNom(): ?string
    {
        return $this->membre_nom;
    }

    public function setMembreNom(string $membre_nom): self
    {
        $this->membre_nom = $membre_nom;

        return $this;
    }

    public function getMembrePrenom(): ?string
    {
        return $this->membre_prenom;
    }

    public function setMembrePrenom(string $membre_prenom): self
    {
        $this->membre_prenom = $membre_prenom;

        return $this;
    }

    public function getMembreCivilite(): ?string
    {
        return $this->membre_civilite;
    }

    public function setMembreCivilite(string $membre_civilite): self
    {
        $this->membre_civilite = $membre_civilite;

        return $this;
    }

    public function getMembreAdresse(): ?string
    {
        return $this->membre_adresse;
    }

    public function setMembreAdresse(string $membre_adresse): self
    {
        $this->membre_adresse = $membre_adresse;

        return $this;
    }

    public function getMembreCode(): ?int
    {
        return $this->membre_code;
    }

    public function setMembreCode(int $membre_code): self
    {
        $this->membre_code = $membre_code;

        return $this;
    }
}
