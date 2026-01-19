<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
class Felino
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $felino_id = null;
    #[ORM\Column(type: 'string', length: 50, unique: true)]
    private ?string $nombreComun = null;
    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private ?string $nombreCientifico = null;
    #[ORM\Column(type: 'string', length: 50)]
    private ?string $estadoConservacion = null;
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $dieta = null;
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $habitat = null;
    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $image = null;

    public function getFelinoId(): ?int
    {
        return $this->felino_id;
    }

    public function setFelinoId(?int $felino_id): void
    {
        $this->felino_id = $felino_id;
    }



    public function getNombreComun(): ?string
    {
        return $this->nombreComun;
    }

    public function setNombreComun(?string $nombreComun): void
    {
        $this->nombreComun = $nombreComun;
    }

    public function getNombreCientifico(): ?string
    {
        return $this->nombreCientifico;
    }

    public function setNombreCientifico(?string $nombreCientifico): void
    {
        $this->nombreCientifico = $nombreCientifico;
    }

    public function getEstadoConservacion(): ?string
    {
        return $this->estadoConservacion;
    }

    public function setEstadoConservacion(?string $estadoConservacion): void
    {
        $this->estadoConservacion = $estadoConservacion;
    }

    public function getDieta(): ?string
    {
        return $this->dieta;
    }

    public function setDieta(?string $dieta): void
    {
        $this->dieta = $dieta;
    }

    public function getHabitat(): ?string
    {
        return $this->habitat;
    }

    public function setHabitat(?string $habitat): void
    {
        $this->habitat = $habitat;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }



}
