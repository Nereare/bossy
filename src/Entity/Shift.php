<?php

namespace App\Entity;

use App\Enum\TurnStatus;
use App\Repository\ShiftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShiftRepository::class)]
class Shift
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(type: Types::DATE_MUTABLE)]
  private ?\DateTime $date = null;

  #[ORM\Column(enumType: TurnStatus::class)]
  private ?TurnStatus $turn = null;

  /**
   * @var Collection<int, Worker>
   */
  #[ORM\ManyToMany(targetEntity: Worker::class)]
  private Collection $NurseSupervision;

  /**
   * @var Collection<int, Shiftstation>
   */
  #[ORM\OneToMany(targetEntity: Shiftstation::class, mappedBy: 'shift', orphanRemoval: true)]
  private Collection $Stations;

  #[ORM\ManyToOne(inversedBy: 'shifts')]
  #[ORM\JoinColumn(nullable: false)]
  private ?User $Head = null;

  public function __construct()
  {
      $this->NurseSupervision = new ArrayCollection();
      $this->Stations = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getDate(): ?\DateTime
  {
    return $this->date;
  }

  public function setDate(\DateTime $date): static
  {
    $this->date = $date;

    return $this;
  }

  public function getTurn(): ?TurnStatus
  {
    return $this->turn;
  }

  public function setTurn(TurnStatus $turn): static
  {
    $this->turn = $turn;

    return $this;
  }

  /**
   * @return Collection<int, Worker>
   */
  public function getNurseSupervision(): Collection
  {
      return $this->NurseSupervision;
  }

  public function addNurseSupervision(Worker $nurseSupervision): static
  {
      if (!$this->NurseSupervision->contains($nurseSupervision)) {
          $this->NurseSupervision->add($nurseSupervision);
      }

      return $this;
  }

  public function removeNurseSupervision(Worker $nurseSupervision): static
  {
      $this->NurseSupervision->removeElement($nurseSupervision);

      return $this;
  }

  /**
   * @return Collection<int, Shiftstation>
   */
  public function getStations(): Collection
  {
      return $this->Stations;
  }

  public function addStation(Shiftstation $station): static
  {
      if (!$this->Stations->contains($station)) {
          $this->Stations->add($station);
          $station->setShift($this);
      }

      return $this;
  }

  public function removeStation(Shiftstation $station): static
  {
      if ($this->Stations->removeElement($station)) {
          // set the owning side to null (unless already changed)
          if ($station->getShift() === $this) {
              $station->setShift(null);
          }
      }

      return $this;
  }

  public function getHead(): ?User
  {
      return $this->Head;
  }

  public function setHead(?User $Head): static
  {
      $this->Head = $Head;

      return $this;
  }
}
