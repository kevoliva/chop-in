<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\SalonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"salon:read"}},
 * denormalizationContext={"groups"={"salon:write"}}
 * )
 * @ORM\Entity(repositoryClass=SalonRepository::class)
 */
class Salon
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @Groups({"salon:read", "salon:write"})
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @Groups({"salon:read", "salon:write"})
   * @ORM\ManyToMany(targetEntity=Client::class, mappedBy="salons")
   */
  private $clients;

  /**
   * @ApiSubResource
   * @Groups({"salon:read", "salon:write"})
   * @ORM\OneToMany(targetEntity=Message::class, mappedBy="salon", orphanRemoval=true)
   */
  private $messages;

  /**
   * @Groups({"salon:read", "salon:write"})
   * @ORM\OneToOne(targetEntity=Bar::class, mappedBy="salon", cascade={"persist", "remove"})
   */
  private $bar;

  public function __construct()
  {
    $this->clients = new ArrayCollection();
    $this->messages = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
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

  /**
   * @return Collection|Client[]
   */
  public function getClients(): Collection
  {
    return $this->clients;
  }

  public function addClient(Client $client): self
  {
    if (!$this->clients->contains($client)) {
      $this->clients[] = $client;
      $client->addSalon($this);
    }

    return $this;
  }

  public function removeClient(Client $client): self
  {
    if ($this->clients->removeElement($client)) {
      $client->removeSalon($this);
    }

    return $this;
  }

  /**
   * @return Collection|Message[]
   */
  public function getMessages(): Collection
  {
    return $this->messages;
  }

  public function addMessage(Message $message): self
  {
    if (!$this->messages->contains($message)) {
      $this->messages[] = $message;
      $message->setSalon($this);
    }

    return $this;
  }

  public function removeMessage(Message $message): self
  {
    if ($this->messages->removeElement($message)) {
      // set the owning side to null (unless already changed)
      if ($message->getSalon() === $this) {
        $message->setSalon(null);
      }
    }

    return $this;
  }
}
