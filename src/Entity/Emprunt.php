<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $date_emprunt = null;

    #[ORM\Column]
    private ?\DateTime $date_retour_prevue = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $date_retour_effective = null;

    #[ORM\ManyToOne(inversedBy: 'emprunt_id')]
    private ?livre $livre_id = null;

    #[ORM\ManyToOne(inversedBy: 'emprunt_id')]
    private ?abonne $abonne_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEmprunt(): ?\DateTime
    {
        return $this->date_emprunt;
    }

    public function setDateEmprunt(\DateTime $date_emprunt): static
    {
        $this->date_emprunt = $date_emprunt;

        return $this;
    }

    public function getDateRetourPrevue(): ?\DateTime
    {
        return $this->date_retour_prevue;
    }

    public function setDateRetourPrevue(\DateTime $date_retour_prevue): static
    {
        $this->date_retour_prevue = $date_retour_prevue;

        return $this;
    }

    public function getDateRetourEffective(): ?\DateTime
    {
        return $this->date_retour_effective;
    }

    public function setDateRetourEffective(?\DateTime $date_retour_effective): static
    {
        $this->date_retour_effective = $date_retour_effective;

        return $this;
    }

    public function getLivreId(): ?livre
    {
        return $this->livre_id;
    }

    public function setLivreId(?livre $livre_id): static
    {
        $this->livre_id = $livre_id;

        return $this;
    }

    public function getAbonneId(): ?abonne
    {
        return $this->abonne_id;
    }

    public function setAbonneId(?abonne $abonne_id): static
    {
        $this->abonne_id = $abonne_id;

        return $this;
    }
}
