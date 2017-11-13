<?php

namespace Insarise\MessagingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidature
 *
 * @ORM\Table(name="candidature", indexes={@ORM\Index(name="id_proj_candid", columns={"id_proj_candid"})})
 * @ORM\Entity
 */
class Candidature
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cand_candid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idCandCandid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proj_candid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idProjCandid;



    /**
     * Set idCandCandid
     *
     * @param integer $idCandCandid
     * @return Candidature
     */
    public function setIdCandCandid($idCandCandid)
    {
        $this->idCandCandid = $idCandCandid;

        return $this;
    }

    /**
     * Get idCandCandid
     *
     * @return integer 
     */
    public function getIdCandCandid()
    {
        return $this->idCandCandid;
    }

    /**
     * Set idProjCandid
     *
     * @param integer $idProjCandid
     * @return Candidature
     */
    public function setIdProjCandid($idProjCandid)
    {
        $this->idProjCandid = $idProjCandid;

        return $this;
    }

    /**
     * Get idProjCandid
     *
     * @return integer 
     */
    public function getIdProjCandid()
    {
        return $this->idProjCandid;
    }
}
