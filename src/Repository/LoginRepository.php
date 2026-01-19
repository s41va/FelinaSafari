<?php

namespace App\Repository;

use App\Entity\Login;
use Doctrine\Persistence\ManagerRegistry;

class LoginRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Login::class);
    }
}
