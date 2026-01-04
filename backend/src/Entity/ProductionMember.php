<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductionMemberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductionMemberRepository::class)]
#[ApiResource]
class ProductionMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'productionMembers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Production $production = null;

    #[ORM\ManyToOne(inversedBy: 'productionMembers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $person = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduction(): ?Production
    {
        return $this->production;
    }

    public function setProduction(?Production $production): static
    {
        $this->production = $production;

        return $this;
    }

    public function getPerson(): ?User
    {
        return $this->person;
    }

    public function setPerson(?User $person): static
    {
        $this->person = $person;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }
}
