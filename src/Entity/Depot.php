<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Depots
 *
 * @ORM\Table(name="depots", indexes={@ORM\Index(name="depots_types_depot_id_fk", columns={"type_depot"})})
 * @ORM\Entity
 */
class Depot
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=64, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var \TypesDepot
     *
     * @ORM\ManyToOne(targetEntity="TypeDepot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_depot", referencedColumnName="id")
     * })
     */
    private $typeDepot;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTypeDepot(): ?TypeDepot
    {
        return $this->typeDepot;
    }

    public function setTypeDepot(?TypeDepot $typeDepot): self
    {
        $this->typeDepot = $typeDepot;

        return $this;
    }


}
