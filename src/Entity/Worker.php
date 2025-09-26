<?php

namespace App\Entity;

use App\Enum\WorkerType;
use App\Repository\WorkerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkerRepository::class)]
class Worker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $FirstName = null;

    #[ORM\Column(length: 512)]
    private ?string $LastName = null;

    #[ORM\Column(length: 8)]
    private ?string $Prefix = null;

    #[ORM\Column(enumType: WorkerType::class)]
    private ?WorkerType $Type = null;

    #[ORM\Column(length: 512)]
    private ?string $Description = null;

    #[ORM\Column(length: 4)]
    private ?string $PhoneDDI = null;

    #[ORM\Column(length: 2)]
    private ?string $PhoneDDD = null;

    #[ORM\Column(length: 10)]
    private ?string $PhoneNumber = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Notes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): static
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): static
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->Prefix;
    }

    public function setPrefix(string $Prefix): static
    {
        $this->Prefix = $Prefix;

        return $this;
    }

    public function getType(): ?WorkerType
    {
        return $this->Type;
    }

    public function setType(WorkerType $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPhoneDDI(): ?string
    {
        return $this->PhoneDDI;
    }

    public function setPhoneDDI(string $PhoneDDI): static
    {
        $this->PhoneDDI = $PhoneDDI;

        return $this;
    }

    public function getPhoneDDD(): ?string
    {
        return $this->PhoneDDD;
    }

    public function setPhoneDDD(string $PhoneDDD): static
    {
        $this->PhoneDDD = $PhoneDDD;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber(string $PhoneNumber): static
    {
        $this->PhoneNumber = $PhoneNumber;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    public function setNotes(?string $Notes): static
    {
        $this->Notes = $Notes;

        return $this;
    }
}
