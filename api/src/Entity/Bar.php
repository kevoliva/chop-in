<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
* @ApiResource(
* normalizationContext={"groups"={"bar:read"}},
* denormalizationContext={"groups"={"bar:write"}}
* )
* @ORM\Entity(repositoryClass=BarRepository::class)
*/
class Bar
{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="integer")
  */
  private $id;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $nom;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="float")
  */
  private $latitude;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="float")
  */
  private $longitude;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $nomRue;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $numRue;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $codePostal;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $ville;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="string", length=255)
  */
  private $telephone;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\Column(type="string", length=255, nullable=true)
  */
  private $qrCode;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\OneToMany(targetEntity=Consommable::class, mappedBy="bar", orphanRemoval=true)
  */
  private $consommables;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\OneToMany(targetEntity=Evenement::class, mappedBy="bar", orphanRemoval=true)
  */
  private $evenements;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\OneToMany(targetEntity=Salon::class, mappedBy="bar", orphanRemoval=true)
  */
  private $salons;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="bar", orphanRemoval=true)
  */
  private $avis;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\ManyToOne(targetEntity=Gerant::class, inversedBy="bars")
  */
  private $gerant;

  /**
  * @Groups({"bar:read", "bar:write"})
  * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="bar", orphanRemoval=true)
  */
  private $photos;

  public function __construct()
  {
    $this->consommables = new ArrayCollection();
    $this->evenements = new ArrayCollection();
    $this->salons = new ArrayCollection();
    $this->avis = new ArrayCollection();
    $this->photos = new ArrayCollection();
  }

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

  public function getLatitude(): ?float
  {
    return $this->latitude;
  }

  public function setLatitude(float $latitude): self
  {
    $this->latitude = $latitude;

    return $this;
  }

  public function getLongitude(): ?float
  {
    return $this->longitude;
  }

  public function setLongitude(float $longitude): self
  {
    $this->longitude = $longitude;

    return $this;
  }

  public function getNomRue(): ?string
  {
    return $this->nomRue;
  }

  public function setNomRue(string $nomRue): self
  {
    $this->nomRue = $nomRue;

    return $this;
  }

  public function getNumRue(): ?string
  {
    return $this->numRue;
  }

  public function setNumRue(string $numRue): self
  {
    $this->numRue = $numRue;

    return $this;
  }

  public function getCodePostal(): ?string
  {
    return $this->codePostal;
  }

  public function setCodePostal(string $codePostal): self
  {
    $this->codePostal = $codePostal;

    return $this;
  }

  public function getVille(): ?string
  {
    return $this->ville;
  }

  public function setVille(string $ville): self
  {
    $this->ville = $ville;

    return $this;
  }

  public function getTelephone(): ?string
  {
    return $this->telephone;
  }

  public function setTelephone(string $telephone): self
  {
    $this->telephone = $telephone;

    return $this;
  }

  public function getQrCode(): ?string
  {
    return $this->qrCode;
  }

  public function setQrCode(?string $qrCode): self
  {
    $this->qrCode = $qrCode;

    return $this;
  }

  /**
  * @return Collection|Consommable[]
  */
  public function getConsommables(): Collection
  {
    return $this->consommables;
  }

  public function addConsommable(Consommable $consommable): self
  {
    if (!$this->consommables->contains($consommable)) {
      $this->consommables[] = $consommable;
      $consommable->setBar($this);
    }

    return $this;
  }

  public function removeConsommable(Consommable $consommable): self
  {
    if ($this->consommables->removeElement($consommable)) {
      // set the owning side to null (unless already changed)
      if ($consommable->getBar() === $this) {
        $consommable->setBar(null);
      }
    }

    return $this;
  }

  /**
  * @return Collection|Evenement[]
  */
  public function getEvenements(): Collection
  {
    return $this->evenements;
  }

  public function addEvenement(Evenement $evenement): self
  {
    if (!$this->evenements->contains($evenement)) {
      $this->evenements[] = $evenement;
      $evenement->setBar($this);
    }

    return $this;
  }

  public function removeEvenement(Evenement $evenement): self
  {
    if ($this->evenements->removeElement($evenement)) {
      // set the owning side to null (unless already changed)
      if ($evenement->getBar() === $this) {
        $evenement->setBar(null);
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
      $salon->setBar($this);
    }

    return $this;
  }

  public function removeSalon(Salon $salon): self
  {
    if ($this->salons->removeElement($salon)) {
      // set the owning side to null (unless already changed)
      if ($salon->getBar() === $this) {
        $salon->setBar(null);
      }
    }

    return $this;
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
      $avi->setBar($this);
    }

    return $this;
  }

  public function removeAvi(Avis $avi): self
  {
    if ($this->avis->removeElement($avi)) {
      // set the owning side to null (unless already changed)
      if ($avi->getBar() === $this) {
        $avi->setBar(null);
      }
    }

    return $this;
  }

  public function getGerant(): ?Gerant
  {
    return $this->gerant;
  }

  public function setGerant(?Gerant $gerant): self
  {
    $this->gerant = $gerant;

    return $this;
  }

  /**
  * @return Collection|Photo[]
  */
  public function getPhotos(): Collection
  {
    return $this->photos;
  }

  public function addPhoto(Photo $photo): self
  {
    if (!$this->photos->contains($photo)) {
      $this->photos[] = $photo;
      $photo->setBar($this);
    }

    return $this;
  }

  public function removePhoto(Photo $photo): self
  {
    if ($this->photos->removeElement($photo)) {
      // set the owning side to null (unless already changed)
      if ($photo->getBar() === $this) {
        $photo->setBar(null);
      }
    }

    return $this;
  }
}
