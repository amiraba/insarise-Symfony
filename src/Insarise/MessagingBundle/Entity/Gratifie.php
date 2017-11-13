<?php

namespace Insarise\MessagingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gratifie
 *
 * @ORM\Table(name="gratifie", indexes={@ORM\Index(name="fk_grat_ent", columns={"id_ent"}), @ORM\Index(name="fk_grat_etud", columns={"id_cand"}), @ORM\Index(name="fk_grat_ach", columns={"id_ach"})})
 * @ORM\Entity
 */
class Gratifie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_proj", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idProj;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idEnt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cand", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idCand;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ach", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idAch;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;



    /**
     * Set idProj
     *
     * @param integer $idProj
     * @return Gratifie
     */
    public function setIdProj($idProj)
    {
        $this->idProj = $idProj;

        return $this;
    }

    /**
     * Get idProj
     *
     * @return integer 
     */
    public function getIdProj()
    {
        return $this->idProj;
    }

    /**
     * Set idEnt
     *
     * @param integer $idEnt
     * @return Gratifie
     */
    public function setIdEnt($idEnt)
    {
        $this->idEnt = $idEnt;

        return $this;
    }

    /**
     * Get idEnt
     *
     * @return integer 
     */
    public function getIdEnt()
    {
        return $this->idEnt;
    }

    /**
     * Set idCand
     *
     * @param integer $idCand
     * @return Gratifie
     */
    public function setIdCand($idCand)
    {
        $this->idCand = $idCand;

        return $this;
    }

    /**
     * Get idCand
     *
     * @return integer 
     */
    public function getIdCand()
    {
        return $this->idCand;
    }

    /**
     * Set idAch
     *
     * @param integer $idAch
     * @return Gratifie
     */
    public function setIdAch($idAch)
    {
        $this->idAch = $idAch;

        return $this;
    }

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
     * Set date
     *
     * @param \DateTime $date
     * @return Gratifie
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
