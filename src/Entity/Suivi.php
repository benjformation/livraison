<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suivi
 *
 * @ORM\Table(name="suivi", indexes={@ORM\Index(name="suivi_colis_fk", columns={"colis"}), @ORM\Index(name="suivi_depots_fk", columns={"depot"})})
 * @ORM\Entity
 */
class Suivi
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="instant", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $instant = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="statut_colis", type="integer", nullable=false)
     */
    private $statutColis;

    /**
     * @var \Colis
     *
     * @ORM\ManyToOne(targetEntity="Colis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="colis", referencedColumnName="numero")
     * })
     */
    private $colis;

    /**
     * @var \Depots
     *
     * @ORM\ManyToOne(targetEntity="Depots")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="depot", referencedColumnName="id")
     * })
     */
    private $depot;

    /**
     * @var \StatutColis
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="StatutColis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
