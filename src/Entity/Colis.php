<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Colis
 *
 * @ORM\Table(name="colis", indexes={@ORM\Index(name="colis_tarifs_fk", columns={"tarif"}), @ORM\Index(name="colis_clients_fk", columns={"expediteur"}), @ORM\Index(name="colis_depots_fk", columns={"livraison_en_depot"}), @ORM\Index(name="colis_clients_fk_1", columns={"destinataire"})})
 * @ORM\Entity
 */
class Colis
{
    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numero;

    /**
     * @var \Clients
     *
     * @ORM\ManyToOne(targetEntity="Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expediteur", referencedColumnName="id")
     * })
     */
    private $expediteur;

    /**
     * @var \Clients
     *
     * @ORM\ManyToOne(targetEntity="Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="destinataire", referencedColumnName="id")
     * })
     */
    private $destinataire;

    /**
     * @var \Depots
     *
     * @ORM\ManyToOne(targetEntity="Depots")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="livraison_en_depot", referencedColumnName="id")
     * })
     */
    private $livraisonEnDepot;

    /**
     * @var \Tarifs
     *
     * @ORM\ManyToOne(targetEntity="Tarifs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tarif", referencedColumnName="id")
     * })
     */
    private $tarif;


}
