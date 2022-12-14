<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=ProductType::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product_type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $elden_price;

    /**
     * @ORM\Column(type="integer")
     */
    private $posta_price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $vakif_price;

    /**
     * @ORM\OneToMany(targetEntity=Subscription::class, mappedBy="product")
     */
    private $subscriptions;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getProductType(): ?ProductType
    {
        return $this->product_type;
    }

    public function setProductType(?ProductType $product_type): self
    {
        $this->product_type = $product_type;

        return $this;
    }

    public function getEldenPrice(): ?int
    {
        return $this->elden_price;
    }

    public function setEldenPrice(?int $elden_price): self
    {
        $this->elden_price = $elden_price;

        return $this;
    }

    public function getPostaPrice(): ?int
    {
        return $this->posta_price;
    }

    public function setPostaPrice(int $posta_price): self
    {
        $this->posta_price = $posta_price;

        return $this;
    }

    public function getVakifPrice(): ?int
    {
        return $this->vakif_price;
    }

    public function setVakifPrice(?int $vakif_price): self
    {
        $this->vakif_price = $vakif_price;

        return $this;
    }

    /**
     * @return Collection<int, Subscription>
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription(Subscription $subscription): self
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions[] = $subscription;
            $subscription->setProduct($this);
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        if ($this->subscriptions->removeElement($subscription)) {
            // set the owning side to null (unless already changed)
            if ($subscription->getProduct() === $this) {
                $subscription->setProduct(null);
            }
        }

        return $this;
    }
}
