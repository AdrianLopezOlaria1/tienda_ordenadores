<?php

namespace App\Entity;

use App\Repository\NombreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NombreRepository::class)]
class Nombre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
