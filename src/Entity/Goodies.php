<?php

namespace App\Entity;

use App\Repository\GoodiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=GoodiesRepository::class)
 * @Vich\Uploadable()
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
    private $photo;

    /**
     * @Vich\UploadableField(mapping="uploads_images", fileNameProperty="photo")
     */

    private $photoFile;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\OneToMany(targetEntity=DetailCommande::class, mappedBy="goodies", orphanRemoval=true)
     */
    private $detailCommandes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $update_at;

    /**
     * @ORM\OneToMany(targetEntity=GoodiesLine::class, mappedBy="goodies")
     */
    private $goodiesLines;


    public function __construct()
    {
        $this->detailCommandes = new ArrayCollection();
        $this->carts = new ArrayCollection();
        $this->goodiesLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
            $detailCommande->setGoodies($this);
        }

        return $this;
    }

    public function removeDetailCommande(DetailCommande $detailCommande): self
    {
        if ($this->detailCommandes->contains($detailCommande)) {
            $this->detailCommandes->removeElement($detailCommande);
            // set the owning side to null (unless already changed)
            if ($detailCommande->getGoodies() === $this) {
                $detailCommande->setGoodies(null);
            }
        }

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->title;

    }


    /**
     * @return mixed
     */
    public function getPhotoFile(): ?File
    {
        return $this->photoFile;
    }

    /**
     * @param mixed $photoFile
     * @return Goodies
     */
    public function setPhotoFile(?File $photoFile = null): self
    {
        $this->photoFile = $photoFile;
        if($this->photoFile instanceof UploadedFile){
            $this->update_at = new \DateTime('now');
        }
        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

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
            $goodiesLine->setGoodies($this);
        }

        return $this;
    }

    public function removeGoodiesLine(GoodiesLine $goodiesLine): self
    {
        if ($this->goodiesLines->contains($goodiesLine)) {
            $this->goodiesLines->removeElement($goodiesLine);
            // set the owning side to null (unless already changed)
            if ($goodiesLine->getGoodies() === $this) {
                $goodiesLine->setGoodies(null);
            }
        }

        return $this;
    }



}
