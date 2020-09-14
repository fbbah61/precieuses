<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *  @UniqueEntity(
 * fields = {"email"},
 * message="un compte est deja existant a cette adresse Email!!"
 * )
 */
class User implements UserInterface
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\Length(min="8",minMessage="votre message doit faire minimum 8 caracter")
     * @Assert\EqualTo(propertyPath="confirm_password", message="les mots de passe ne correspondent pas")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="les mots de passe ne correspondent pas")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="user", orphanRemoval=true)
     */
    private $commandes;

    /**
     * @ORM\OneToMany(targetEntity=Stampwish::class, mappedBy="user", orphanRemoval=true)
     */
    private $stampwishes;

    /**
     * @ORM\OneToMany(targetEntity=Cart::class, mappedBy="user")
     */
    private $carts;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->stampwishes = new ArrayCollection();
        $this->carts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }

        return $this;
    }
    public function eraseCredentials()
    {

    }
    //renvoie la chaine de caractere encoder que l'utilisateur a saisi qui a ete utiliser a l'origine pour coder le mdp

    public function getSalt()
    {

    }
    public function __toString()
    {
        return $this->email . '';
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function addRole($role) {
        if (!in_array($role, $this->getRoles())) array_push($this->roles, $role);
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
            $stampwish->setUser($this);
        }

        return $this;
    }

    public function removeStampwish(Stampwish $stampwish): self
    {
        if ($this->stampwishes->contains($stampwish)) {
            $this->stampwishes->removeElement($stampwish);
            // set the owning side to null (unless already changed)
            if ($stampwish->getUser() === $this) {
                $stampwish->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cart[]
     */
    public function getCarts(): Collection
    {
        return $this->carts;
    }

    public function addCart(Cart $cart): self
    {
        if (!$this->carts->contains($cart)) {
            $this->carts[] = $cart;
            $cart->setUser($this);
        }

        return $this;
    }

    public function removeCart(Cart $cart): self
    {
        if ($this->carts->contains($cart)) {
            $this->carts->removeElement($cart);
            // set the owning side to null (unless already changed)
            if ($cart->getUser() === $this) {
                $cart->setUser(null);
            }
        }

        return $this;
    }

}
