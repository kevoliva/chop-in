<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
* @ApiResource(
* normalizationContext={"groups"={"evenement:read"}},
* denormalizationContext={"groups"={"evenement:write"}}
* )
* @ORM\Entity(repositoryClass=EvenementRepository::class)
*/
class Evenement
{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @Groups({"evenement:read", "evenement:write"})
  * @ORM\Column(type="integer")
  */
  private $id;

  /**
  * @Groups({"evenement:read", "evenement:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $nom;

  /**
  * @Groups({"evenement:read", "evenement:write"})
  * @ORM\Column(type="boolean")
  */
  private $etat;

  /**
  * @Groups({"evenement:read", "evenement:write"})
  * @ORM\Column(type="string", length=255, nullable=true)
  */
  private $type;

  /**
  * @Groups({"evenement:read", "evenement:write"})
  * @ORM\Column(type="datetime", nullable=true)
  */
  private $heureDebut;

  /**
  * @Groups({"evenement:read", "evenement:write"})
  * @ORM\Column(type="datetime", nullable=true)
  */
  private $heureFin;

  /**
  * @ORM\ManyToOne(targetEntity=Bar::class, inversedBy="evenements")
  * @Groups({"evenement:read", "evenement:write"})
  * @ORM\JoinColumn(nullable=false)
  */
  private $bar;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getNom(): ?string
  {
    return $this->nom;
  }

  public function setNom(string $nom): self
  {
    $this->nom = $nom;

    return $this;
  }

  public function getEtat(): ?bool
  {
    return $this->etat;
  }

  public function setEtat(bool $etat): self
  {
    $this->etat = $etat;

    return $this;
  }

  public function getType(): ?string
  {
    return $this->type;
  }

  public function setType(?string $type): self
  {
    $this->type = $type;

    return $this;
  }

  public function getHeureDebut(): ?\DateTimeInterface
  {
    return $this->heureDebut;
  }

  public function setHeureDebut(?\DateTimeInterface $heureDebut): self
  {
    $this->heureDebut = $heureDebut;

    return $this;
  }

  public function getHeureFin(): ?\DateTimeInterface
  {
    return $this->heureFin;
  }

  public function setHeureFin(?\DateTimeInterface $heureFin): self
  {
    $this->heureFin = $heureFin;

    return $this;
  }

  public function getBar(): ?Bar
  {
    return $this->bar;
  }

  public function setBar(?Bar $bar): self
  {
    $this->bar = $bar;

    return $this;
  }
}
