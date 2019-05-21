<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutColis
 *
 * @ORM\Table(name="statut_colis")
 * @ORM\Entity
 */
class StatutColis
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
     * @ORM\Column(name="nom", type="string", length=16, nullable=false)
     */
    private $nom;


}
