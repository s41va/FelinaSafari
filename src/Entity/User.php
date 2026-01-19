<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name: 'user')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Entradas::class)]
    private ?int $user_id = null;
    #[ORM\Column(type: 'string', length: 50, unique: true)]
    private ?string $username = null;
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $email = null;
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $password = null;
    #[ORM\Column(type: 'integer', length: 9, nullable: true)]
    private ?string $telefono = null;

    #[ORM\Column(type: 'datetime')]
    private ?string $fechaCreacion = null;

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): void
    {
        $this->user_id = $user_id;
    }


    public function getUsername(): ?string
    {
        return $this->username;
    }
    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getFechaCreacion(): ?string
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(?string $fechaCreacion): void
    {
        $this->fechaCreacion = $fechaCreacion;
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
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }
}
