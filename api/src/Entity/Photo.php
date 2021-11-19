<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
* @ApiResource(
* normalizationContext={"groups"={"photo:read"}},
* denormalizationContext={"groups"={"photo:write"}}
* )
* @ORM\Entity(repositoryClass=PhotoRepository::class)
*/
class Photo
{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @Groups({"photo:read", "photo:write"})
  * @ORM\Column(type="integer")
  */
  private $id;

  /**
  * @Groups({"photo:read", "photo:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $cheminPhoto;

  /**
  * @Groups({"photo:read", "photo:write"})
  * @ORM\Column(type="string", length=255, nullable=true)
  */
  private $description;

  /**
  * @ORM\ManyToOne(targetEntity=Bar::class, inversedBy="photos")
  * @Groups({"photo:read", "photo:write"})
  * @ORM\JoinColumn(nullable=false)
  */
  private $bar;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getCheminPhoto(): ?string
  {
    return $this->cheminPhoto;
  }

  public function setCheminPhoto(string $cheminPhoto): self
  {
    $this->cheminPhoto = $cheminPhoto;

    return $this;
  }

  public function getDescription(): ?string
  {
    return $this->description;
  }

  public function setDescription(?string $description): self
  {
    $this->description = $description;

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
