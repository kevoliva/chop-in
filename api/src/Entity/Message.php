<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
* @ApiResource(
* normalizationContext={"groups"={"message:read"}},
* denormalizationContext={"groups"={"message:write"}}
* )
* @ORM\Entity(repositoryClass=MessageRepository::class)
*/
class Message
{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @Groups({"message:read", "message:write"})
  * @ORM\Column(type="integer")
  */
  private $id;

  /**
  * @Groups({"message:read", "message:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $contenu;

  /**
  * @Groups({"message:read", "message:write"})
  * @ORM\Column(type="datetime_immutable", nullable=true)
  */
  private $createdAt;

  /**
  * @ORM\ManyToOne(targetEntity=Salon::class, inversedBy="messages")
  * @Groups({"message:read", "message:write"})
  * @ORM\JoinColumn(nullable=false)
  */
  private $salon;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getContenu(): ?string
  {
    return $this->contenu;
  }

  public function setContenu(string $contenu): self
  {
    $this->contenu = $contenu;

    return $this;
  }

  public function getCreatedAt(): ?\DateTimeImmutable
  {
    return $this->createdAt;
  }

  public function setCreatedAt(?\DateTimeImmutable $createdAt): self
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  public function getSalon(): ?Salon
  {
    return $this->salon;
  }

  public function setSalon(?Salon $salon): self
  {
    $this->salon = $salon;

    return $this;
  }
}
