<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
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
    private $img1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img8;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImg1()
    {
        return $this->img1;
    }

    public function setImg1( $img1): self
    {
        $this->img1 = $img1;

        return $this;
    }

    public function getImg2()
    {
        return $this->img2;
    }

    public function setImg2( $img2): self
    {
        $this->img2 = $img2;

        return $this;
    }

    public function getImg3()
    {
        return $this->img3;
    }

    public function setImg3( $img3): self
    {
        $this->img3 = $img3;

        return $this;
    }

    public function getImg4()
    {
        return $this->img4;
    }

    public function setImg4( $img4): self
    {
        $this->img4 = $img4;

        return $this;
    }

    public function getImg5()
    {
        return $this->img5;
    }

    public function setImg5( $img5): self
    {
        $this->img5 = $img5;

        return $this;
    }

    public function getImg6()
    {
        return $this->img6;
    }

    public function setImg6($img6): self
    {
        $this->img6 = $img6;

        return $this;
    }

    public function getImg7()
    {
        return $this->img7;
    }

    public function setImg7( $img7): self
    {
        $this->img7 = $img7;

        return $this;
    }

    public function getImg8()
    {
        return $this->img8;
    }

    public function setImg8( $img8): self
    {
        $this->img8 = $img8;

        return $this;
    }
}
