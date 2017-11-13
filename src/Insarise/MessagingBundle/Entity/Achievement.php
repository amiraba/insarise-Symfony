<?php

namespace Insarise\MessagingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achievement
 *
 * @ORM\Table(name="achievement")
 * @ORM\Entity
 */
class Achievement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ach", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAch;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ach", type="string", length=50, nullable=true)
     */
    private $nomAch;

    /**
     * @var string
     *
     * @ORM\Column(name="description_ach", type="string", length=255, nullable=true)
     */
    private $descriptionAch;



    /**
     * Get idAch
     *
     * @return integer 
     */
    public function getIdAch()
    {
        return $this->idAch;
    }

    /**
     * Set nomAch
     *
     * @param string $nomAch
     * @return Achievement
     */
    public function setNomAch($nomAch)
    {
        $this->nomAch = $nomAch;

        return $this;
    }

    /**
     * Get nomAch
     *
     * @return string 
     */
    public function getNomAch()
    {
        return $this->nomAch;
    }

    /**
     * Set descriptionAch
     *
     * @param string $descriptionAch
     * @return Achievement
     */
    public function setDescriptionAch($descriptionAch)
    {
        $this->descriptionAch = $descriptionAch;

        return $this;
    }

    /**
     * Get descriptionAch
     *
     * @return string 
     */
    public function getDescriptionAch()
    {
        return $this->descriptionAch;
    }
}
