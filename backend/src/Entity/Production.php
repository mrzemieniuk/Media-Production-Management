<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductionRepository::class)]
#[ApiResource]
class Production
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    /**
     * @var Collection<int, Asset>
     */
    #[ORM\OneToMany(targetEntity: Asset::class, mappedBy: 'production', orphanRemoval: true)]
    private Collection $assets;

    /**
     * @var Collection<int, ProductionMember>
     */
    #[ORM\OneToMany(targetEntity: ProductionMember::class, mappedBy: 'production', orphanRemoval: true)]
    private Collection $productionMembers;

    public function __construct()
    {
        $this->assets = new ArrayCollection();
        $this->productionMembers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Asset>
     */
    public function getAssets(): Collection
    {
        return $this->assets;
    }

    public function addAsset(Asset $asset): static
    {
        if (!$this->assets->contains($asset)) {
            $this->assets->add($asset);
            $asset->setProduction($this);
        }

        return $this;
    }

    public function removeAsset(Asset $asset): static
    {
        if ($this->assets->removeElement($asset)) {
            // set the owning side to null (unless already changed)
            if ($asset->getProduction() === $this) {
                $asset->setProduction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductionMember>
     */
    public function getProductionMembers(): Collection
    {
        return $this->productionMembers;
    }

    public function addProductionMember(ProductionMember $productionMember): static
    {
        if (!$this->productionMembers->contains($productionMember)) {
            $this->productionMembers->add($productionMember);
            $productionMember->setProduction($this);
        }

        return $this;
    }

    public function removeProductionMember(ProductionMember $productionMember): static
    {
        if ($this->productionMembers->removeElement($productionMember)) {
            // set the owning side to null (unless already changed)
            if ($productionMember->getProduction() === $this) {
                $productionMember->setProduction(null);
            }
        }

        return $this;
    }
}
