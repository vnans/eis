<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParamsRepository")
 */
class Params
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageaccueil;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apropos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aproposou;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aproposquand;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageaccueil()
    {
        return $this->imageaccueil;
    }

    public function setImageaccueil($imageaccueil): self
    {
        $this->imageaccueil = $imageaccueil;

        return $this;
    }

    public function getApropos(): ?string
    {
        return $this->apropos;
    }

    public function setApropos(?string $apropos): self
    {
        $this->apropos = $apropos;

        return $this;
    }

    public function getAproposou(): ?string
    {
        return $this->aproposou;
    }

    public function setAproposou(?string $aproposou): self
    {
        $this->aproposou = $aproposou;

        return $this;
    }

    public function getAproposquand(): ?string
    {
        return $this->aproposquand;
    }

    public function setAproposquand(?string $aproposquand): self
    {
        $this->aproposquand = $aproposquand;

        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo( $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
