<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Depots
 *
 * @ORM\Table(name="depots", indexes={@ORM\Index(name="depots_types_depot_id_fk", columns={"type_depot"})})
 * @ORM\Entity
 */
class Depots
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
     * @ORM\ManyToOne(targetEntity="TypesDepot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_depot", referencedColumnName="id")
     * })
     */
    private $typeDepot;


}
