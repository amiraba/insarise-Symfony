<?php

namespace Insarise\InsariseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competence
 *
 * @ORM\Table(name="competence")
 * @ORM\Entity
 */
class Competence
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_com", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_com", type="string", length=50, nullable=true)
     */
    private $nomCom;

    /**
     * @var string
     *
     * @ORM\Column(name="description_com", type="text", length=65535, nullable=true)
     */
    private $descriptionCom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Candidat", mappedBy="idComEc")
     */
    private $idCandEc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Projet", mappedBy="idComPc")
     */
    private $idProjPc;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCandEc = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idProjPc = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idCom
     *
     * @return integer 
     */
    public function getIdCom()
    {
        return $this->idCom;
    }

    /**
     * Set nomCom
     *
     * @param string $nomCom
     * @return Competence
     */
    public function setNomCom($nomCom)
    {
        $this->nomCom = $nomCom;

        return $this;
    }

    /**
     * Get nomCom
     *
     * @return string 
     */
    public function getNomCom()
    {
        return $this->nomCom;
    }

    /**
     * Set descriptionCom
     *
     * @param string $descriptionCom
     * @return Competence
     */
    public function setDescriptionCom($descriptionCom)
    {
        $this->descriptionCom = $descriptionCom;

        return $this;
    }

    /**
     * Get descriptionCom
     *
     * @return string 
     */
    public function getDescriptionCom()
    {
        return $this->descriptionCom;
    }

    /**
     * Add idCandEc
     *
     * @param \Insarise\InsariseBundle\Entity\Candidat $idCandEc
     * @return Competence
     */
    public function addIdCandEc(\Insarise\InsariseBundle\Entity\Candidat $idCandEc)
    {
        $this->idCandEc[] = $idCandEc;

        return $this;
    }

    /**
     * Remove idCandEc
     *
     * @param \Insarise\InsariseBundle\Entity\Candidat $idCandEc
     */
    public function removeIdCandEc(\Insarise\InsariseBundle\Entity\Candidat $idCandEc)
    {
        $this->idCandEc->removeElement($idCandEc);
    }

    /**
     * Get idCandEc
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdCandEc()
    {
        return $this->idCandEc;
    }

    /**
     * Add idProjPc
     *
     * @param \Insarise\InsariseBundle\Entity\Projet $idProjPc
     * @return Competence
     */
    public function addIdProjPc(\Insarise\InsariseBundle\Entity\Projet $idProjPc)
    {
        $this->idProjPc[] = $idProjPc;

        return $this;
    }

    /**
     * Remove idProjPc
     *
     * @param \Insarise\InsariseBundle\Entity\Projet $idProjPc
     */
    public function removeIdProjPc(\Insarise\InsariseBundle\Entity\Projet $idProjPc)
    {
        $this->idProjPc->removeElement($idProjPc);
    }

    /**
     * Get idProjPc
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdProjPc()
    {
        return $this->idProjPc;
    }
}
