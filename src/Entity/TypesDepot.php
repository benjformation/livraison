<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypesDepot
 *
 * @ORM\Table(name="types_depot")
 * @ORM\Entity
 */
class TypesDepot
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
