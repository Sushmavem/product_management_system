<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "product")]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    private $name;

    #[ORM\Column(type: "integer")]
    private $inventory_count;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private $cost;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private $selling_price;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTime(); // automatically set created_at
    }

    // --- Getters and Setters ---
    public function getId(): ?int { return $this->id; }
    public function getName(): ?string { return $this->name; }
    public function setName(string $name): self { $this->name = $name; return $this; }
    public function getInventoryCount(): ?int { return $this->inventory_count; }
    public function setInventoryCount(int $inventory_count): self { $this->inventory_count = $inventory_count; return $this; }
    public function getCost(): ?float { return (float)$this->cost; }
    public function setCost(float $cost): self { $this->cost = $cost; return $this; }
    public function getSellingPrice(): ?float { return (float)$this->selling_price; }
    public function setSellingPrice(float $selling_price): self { $this->selling_price = $selling_price; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->created_at; }
    public function setCreatedAt(\DateTimeInterface $created_at): self { $this->created_at = $created_at; return $this; }
}
