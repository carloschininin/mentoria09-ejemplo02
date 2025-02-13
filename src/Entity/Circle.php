<?php

namespace App\Entity;

use App\Repository\CircleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CircleRepository::class)]
class Circle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $radio = null;

    #[ORM\Column(nullable: true)]
    private ?float $area = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRadio(): ?int
    {
        return $this->radio;
    }

    public function setRadio(int $radio): static
    {
        $this->radio = $radio;

        return $this;
    }

    public function getArea(): ?float
    {
        return $this->area;
    }

    public function setArea(?float $area): static
    {
        $this->area = $area;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(?\DateTimeInterface $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }
}
