<?php

namespace App\Entity;


use App\Entity\User;

use App\Repository\DonacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonacionRepository::class)]
class Donacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'user_id',nullable: true)]
    private ?User $user = null;

    #[ORM\Column(type: 'float')]
    private ?float $importe = null;


}
