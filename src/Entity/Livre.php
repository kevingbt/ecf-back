<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_ISBN', fields: ['isbn'])]
#[UniqueEntity(fields: ['isbn'], message: 'There is already a book with this ISBN')]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $auteur = null;

    #[ORM\Column]
    private ?int $isbn = null;

    #[ORM\Column]
    private ?\DateTime $date_publication = null;

    #[ORM\Column]
    private ?bool $disponible = null;

    /**
     * @var Collection<int, Emprunt>
     */
    #[ORM\OneToMany(targetEntity: Emprunt::class, mappedBy: 'livre_id')]
    private Collection $emprunt_id;

    public function __construct()
    {
        $this->emprunt_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): static
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getDatePublication(): ?\DateTime
    {
        return $this->date_publication;
    }

    public function setDatePublication(\DateTime $date_publication): static
    {
        $this->date_publication = $date_publication;

        return $this;
    }

    public function isDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): static
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * @return Collection<int, Emprunt>
     */
    public function getEmpruntId(): Collection
    {
        return $this->emprunt_id;
    }

    public function addEmpruntId(Emprunt $empruntId): static
    {
        if (!$this->emprunt_id->contains($empruntId)) {
            $this->emprunt_id->add($empruntId);
            $empruntId->setLivreId($this);
        }

        return $this;
    }

    public function removeEmpruntId(Emprunt $empruntId): static
    {
        if ($this->emprunt_id->removeElement($empruntId)) {
            // set the owning side to null (unless already changed)
            if ($empruntId->getLivreId() === $this) {
                $empruntId->setLivreId(null);
            }
        }

        return $this;
    }
}
