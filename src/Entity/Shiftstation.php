<?php

namespace App\Entity;

use App\Repository\ShiftstationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShiftstationRepository::class)]
class Shiftstation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Worker $Worker = null;

    #[ORM\Column(length: 128)]
    private ?string $Station = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $QualityScore = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $SpeedScore = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $SelfSufficiencyScore = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $TeamRelationScore = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $PatientRelationScore = null;

    #[ORM\ManyToOne(inversedBy: 'Stations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Shift $shift = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorker(): ?Worker
    {
        return $this->Worker;
    }

    public function setWorker(?Worker $Worker): static
    {
        $this->Worker = $Worker;

        return $this;
    }

    public function getStation(): ?string
    {
        return $this->Station;
    }

    public function setStation(string $Station): static
    {
        $this->Station = $Station;

        return $this;
    }

    public function getQualityScore(): ?int
    {
        return $this->QualityScore;
    }

    public function setQualityScore(?int $QualityScore): static
    {
        $this->QualityScore = $QualityScore;

        return $this;
    }

    public function getSpeedScore(): ?int
    {
        return $this->SpeedScore;
    }

    public function setSpeedScore(?int $SpeedScore): static
    {
        $this->SpeedScore = $SpeedScore;

        return $this;
    }

    public function getSelfSufficiencyScore(): ?int
    {
        return $this->SelfSufficiencyScore;
    }

    public function setSelfSufficiencyScore(?int $SelfSufficiencyScore): static
    {
        $this->SelfSufficiencyScore = $SelfSufficiencyScore;

        return $this;
    }

    public function getTeamRelationScore(): ?int
    {
        return $this->TeamRelationScore;
    }

    public function setTeamRelationScore(?int $TeamRelationScore): static
    {
        $this->TeamRelationScore = $TeamRelationScore;

        return $this;
    }

    public function getPatientRelationScore(): ?int
    {
        return $this->PatientRelationScore;
    }

    public function setPatientRelationScore(?int $PatientRelationScore): static
    {
        $this->PatientRelationScore = $PatientRelationScore;

        return $this;
    }

    public function getShift(): ?Shift
    {
        return $this->shift;
    }

    public function setShift(?Shift $shift): static
    {
        $this->shift = $shift;

        return $this;
    }
}
