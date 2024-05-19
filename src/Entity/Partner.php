<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PartnerRepository::class)]
class Partner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['api_list'])]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['api_list'])]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    #[Groups(['api_list'])]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    #[Groups(['api_list'])]
    private ?string $cpf = null;

    #[ORM\ManyToOne(inversedBy: 'partners')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['api_list'])]
    private ?Company $company = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): static
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): static
    {
        $this->company = $company;

        return $this;
    }
}
