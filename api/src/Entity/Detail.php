<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DetailRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    mercure: false,
    normalizationContext: ['groups' => ['detail_read']]
    )]
#[ORM\Entity(repositoryClass: DetailRepository::class)]
class Detail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['pizza_read', 'detail_read'])]
    private ?float $price = null;

    #[ORM\Column(length: 2)]
    #[Groups(['pizza_read', 'detail_read'])]
    private ?string $size = null;

    #[ORM\ManyToOne(inversedBy: 'detail')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('detail_read')]
    private ?Order $orders = null;

    #[ORM\ManyToOne(inversedBy: 'detail')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('detail_read')]
    private ?Pizza $pizza = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getOrders(): ?Order
    {
        return $this->orders;
    }

    public function setOrders(?Order $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getPizza(): ?Pizza
    {
        return $this->pizza;
    }

    public function setPizza(?Pizza $pizza): self
    {
        $this->pizza = $pizza;

        return $this;
    }
}
