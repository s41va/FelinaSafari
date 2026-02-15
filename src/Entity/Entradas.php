<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'entradas')]
class Entradas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $entrada_id = null;
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'user_id')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'user_id',nullable: false)]
    private ?User $user_id = null;
    #[ORM\ManyToOne(targetEntity: TipoEntrada::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?TipoEntrada $tipo_entrada = null;
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $fechaVisita = null;
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $fechaCompra = null;

    public function getEntradaId(): ?int
    {
        return $this->entrada_id;
    }

    public function setEntradaId(?int $entrada_id): void
    {
        $this->entrada_id = $entrada_id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getTipoEntrada(): ?TipoEntrada
    {
        return $this->tipo_entrada;
    }

    public function setTipoEntrada(?TipoEntrada $tipo_entrada): void
    {
        $this->tipo_entrada = $tipo_entrada;
    }

    public function getFechaVisita(): ?\DateTimeInterface
    {
        return $this->fechaVisita;
    }

    public function setFechaVisita(?\DateTimeInterface $fechaVisita): void
    {
        $this->fechaVisita = $fechaVisita;
    }

    public function getFechaCompra(): ?\DateTimeInterface
    {
        return $this->fechaCompra;
    }

    public function setFechaCompra(?\DateTimeInterface $fechaCompra): void
    {
        $this->fechaCompra = $fechaCompra;
    }


}
