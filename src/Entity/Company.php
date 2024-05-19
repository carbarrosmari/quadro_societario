<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['api_list'])]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['api_list'])]
    private ?string $corporateName = null;

    #[ORM\Column(length: 50)]
    #[Groups(['api_list'])]
    private ?string $cnpj = null;

    #[ORM\Column(length: 50)]
    #[Groups(['api_list'])]
    private ?string $phone = null;

    #[ORM\Column(length: 100)]
    #[Groups(['api_list'])]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups(['api_list'])]
    private ?string $address = null;

    /**
     * @var Collection<int, Partner>
     */
    #[ORM\OneToMany(targetEntity: Partner::class, mappedBy: 'company')]
    private Collection $partners;

    public function __construct()
    {
        $this->partners = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorporateName(): ?string
    {
        return $this->corporateName;
    }

    public function setCorporateName(string $corporateName): static
    {
        $this->corporateName = $corporateName;

        return $this;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): static
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, Partner>
     */
    public function getPartners(): Collection
    {
        return $this->partners;
    }

    public function addPartner(Partner $partner): static
    {
        if (!$this->partners->contains($partner)) {
            $this->partners->add($partner);
            $partner->setCompany($this);
        }

        return $this;
    }

    public function removePartner(Partner $partner): static
    {
        if ($this->partners->removeElement($partner)) {
            // set the owning side to null (unless already changed)
            if ($partner->getCompany() === $this) {
                $partner->setCompany(null);
            }
        }

        return $this;
    }
}
