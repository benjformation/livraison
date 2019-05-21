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
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expediteur", referencedColumnName="id")
     * })
     */
    private $expediteur;

    /**
     * @var \Clients
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="destinataire", referencedColumnName="id")
     * })
     */
    private $destinataire;

    /**
     * @var \Depots
     *
     * @ORM\ManyToOne(targetEntity="Depot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="livraison_en_depot", referencedColumnName="id")
     * })
     */
    private $livraisonEnDepot;

    /**
     * @var \Tarifs
     *
     * @ORM\ManyToOne(targetEntity="Tarif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tarif", referencedColumnName="id")
     * })
     */
    private $tarif;

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function getExpediteur(): ?Client
    {
        return $this->expediteur;
    }

    public function setExpediteur(?Client $expediteur): self
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    public function getDestinataire(): ?Client
    {
        return $this->destinataire;
    }

    public function setDestinataire(?Client $destinataire): self
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    public function getLivraisonEnDepot(): ?Depot
    {
        return $this->livraisonEnDepot;
    }

    public function setLivraisonEnDepot(?Depot $livraisonEnDepot): self
    {
        $this->livraisonEnDepot = $livraisonEnDepot;

        return $this;
    }

    public function getTarif(): ?Tarif
    {
        return $this->tarif;
    }

    public function setTarif(?Tarif $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }


}
