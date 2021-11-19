<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
* @ApiResource(
* normalizationContext={"groups"={"user:read"}},
* denormalizationContext={"groups"={"user:write"}}
* )
* @ORM\Entity(repositoryClass=ClientRepository::class)
*/
class Client extends User
{
  /**
  * @ApiSubResource
  * @Groups({"user:read", "user:write"})
  * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="client", orphanRemoval=true)
  */
  private $avis;

  /**
  * @ApiSubResource
  * @Groups({"user:read", "user:write"})
  * @ORM\ManyToMany(targetEntity=Salon::class, inversedBy="clients")
  */
  private $salons;

  public function __construct()
  {
    $this->avis = new ArrayCollection();
    $this->salons = new ArrayCollection();
  }

  /**
  * @return Collection|Avis[]
  */
  public function getAvis(): Collection
  {
    return $this->avis;
  }

  public function addAvi(Avis $avi): self
  {
    if (!$this->avis->contains($avi)) {
      $this->avis[] = $avi;
      $avi->setClient($this);
    }

    return $this;
  }

  public function removeAvi(Avis $avi): self
  {
    if ($this->avis->removeElement($avi)) {
      // set the owning side to null (unless already changed)
      if ($avi->getClient() === $this) {
        $avi->setClient(null);
      }
    }

    return $this;
  }

  /**
  * @return Collection|Salon[]
  */
  public function getSalons(): Collection
  {
    return $this->salons;
  }

  public function addSalon(Salon $salon): self
  {
    if (!$this->salons->contains($salon)) {
      $this->salons[] = $salon;
    }

    return $this;
  }

  public function removeSalon(Salon $salon): self
  {
    $this->salons->removeElement($salon);

    return $this;
  }
}
