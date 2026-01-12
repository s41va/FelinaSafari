<?php

namespace App\Entity;

class Entradas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $entrada_id = null;
    #[ORM\Column(type: 'string', unique: true)]
    private ?string $user_id = null;
    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['general', 'infantil', 'jubilado'], message: 'Selecciona un tipo de entrada válido.')]
    private ?string $tipo_entrada = null;
    #[ORM\Column(type: 'datetime')]
    private ?string $fechaVisita = null;
    #[ORM\Column(type: 'datetime')]
    private ?string $fechaCompra = null;

    public function getEntradaId(): ?int
    {
        return $this->entrada_id;
    }

    public function setEntradaId(?int $entrada_id): void
    {
        $this->entrada_id = $entrada_id;
    }

    public function getUserId(): ?string
    {
        return $this->user_id;
    }

    public function setUserId(?string $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getTipoEntrada(): ?string
    {
        return $this->tipo_entrada;
    }

    public function setTipoEntrada(?string $tipo_entrada): void
    {
        $this->tipo_entrada = $tipo_entrada;
    }

    public function getFechaVisita(): ?string
    {
        return $this->fechaVisita;
    }

    public function setFechaVisita(?string $fechaVisita): void
    {
        $this->fechaVisita = $fechaVisita;
    }

    public function getFechaCompra(): ?string
    {
        return $this->fechaCompra;
    }

    public function setFechaCompra(?string $fechaCompra): void
    {
        $this->fechaCompra = $fechaCompra;
    }




}
