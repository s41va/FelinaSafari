<?php

namespace App\Entity;
use App\Repository\TipoEntradaRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Table(name: 'TipoEntrada')]
#[ORM\Entity(repositoryClass: TipoEntradaRepository::class)]
class TipoEntrada
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $id = null;
    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['general', 'infantil', 'jubilado'])]
    private ?string $tipo = null;

    #[ORM\Column(type: 'float', unique: true)]
    private ?float $precio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(?float $precio): void
    {
        $this->precio = $precio;
    }







}
