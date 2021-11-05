<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ConsommableRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
* @ApiResource(
* normalizationContext={"groups"={"consommable:read"}},
* denormalizationContext={"groups"={"consommable:write"}}
* )
* @ORM\Entity(repositoryClass=ConsommableRepository::class)
*/
class Consommable
{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @Groups({"consommable:read", "consommable:write"})
  * @ORM\Column(type="integer")
  */
  private $id;

  /**
  * @Groups({"consommable:read", "consommable:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $nom;

  /**
  * @Groups({"consommable:read", "consommable:write"})
  * @ORM\Column(type="float")
  */
  private $prix;

  /**
  * @Groups({"consommable:read", "consommable:write"})
  * @ORM\Column(type="float", nullable=true)
  */
  private $quantite;

  /**
  * @ORM\ManyToOne(targetEntity=Bar::class, inversedBy="consommables")
  * @Groups({"consommable:read", "consommable:write"})
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

  public function getPrix(): ?float
  {
    return $this->prix;
  }

  public function setPrix(float $prix): self
  {
    $this->prix = $prix;

    return $this;
  }

  public function getQuantite(): ?float
  {
    return $this->quantite;
  }

  public function setQuantite(?float $quantite): self
  {
    $this->quantite = $quantite;

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
