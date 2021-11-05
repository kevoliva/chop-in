<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
* @ApiResource(
* normalizationContext={"groups"={"avis:read"}},
* denormalizationContext={"groups"={"avis:write"}}
* )
* @ORM\Entity(repositoryClass=AvisRepository::class)
*/
class Avis
{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @Groups({"avis:read", "avis:write"})
  * @ORM\Column(type="integer")
  */
  private $id;

  /**
  * @Groups({"avis:read", "avis:write"})
  * @ORM\Column(type="float", nullable=true)
  */
  private $note;

  /**
  * @Groups({"avis:read", "avis:write"})
  * @ORM\Column(type="string", length=255, nullable=true)
  */
  private $commentaire;

  /**
  * @Groups({"avis:read", "avis:write"})
  * @ORM\ManyToOne(targetEntity=Bar::class, inversedBy="avis")
  * @ORM\JoinColumn(nullable=false)
  */
  private $bar;

  /**
  * @Groups({"avis:read", "avis:write"})
  * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="avis")
  * @ORM\JoinColumn(nullable=false)
  */
  private $client;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getNote(): ?float
  {
    return $this->note;
  }

  public function setNote(?float $note): self
  {
    $this->note = $note;

    return $this;
  }

  public function getCommentaire(): ?string
  {
    return $this->commentaire;
  }

  public function setCommentaire(?string $commentaire): self
  {
    $this->commentaire = $commentaire;

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

  public function getClient(): ?Client
  {
    return $this->client;
  }

  public function setClient(?Client $client): self
  {
    $this->client = $client;

    return $this;
  }
}
