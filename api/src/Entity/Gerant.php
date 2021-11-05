<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GerantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
* @ApiResource(
* normalizationContext={"groups"={"gerant:read"}},
* denormalizationContext={"groups"={"gerant:write"}}
* )
* @ORM\Entity(repositoryClass=GerantRepository::class)
*/
class Gerant extends User
{
  /**
  * @Groups({"gerant:read", "gerant:write"})
  * @ORM\OneToMany(targetEntity=Bar::class, mappedBy="gerant")
  */
  private $bars;

  public function __construct()
  {
    $this->bars = new ArrayCollection();
  }

  /**
  * @return Collection|Bar[]
  */
  public function getBars(): Collection
  {
    return $this->bars;
  }

  public function addBar(Bar $bar): self
  {
    if (!$this->bars->contains($bar)) {
      $this->bars[] = $bar;
      $bar->setGerant($this);
    }

    return $this;
  }

  public function removeBar(Bar $bar): self
  {
    if ($this->bars->removeElement($bar)) {
      // set the owning side to null (unless already changed)
      if ($bar->getGerant() === $this) {
        $bar->setGerant(null);
      }
    }

    return $this;
  }
}
