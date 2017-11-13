<?php

namespace Insarise\InsariseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etape
 *
 * @ORM\Table(name="etape", indexes={@ORM\Index(name="fk_etape_projet", columns={"id_proj_et"}), @ORM\Index(name="fk_etape_entreprise", columns={"id_ent_et"}), @ORM\Index(name="fk_etape_etud", columns={"id_cand_et"})})
 * @ORM\Entity
 */
class Etape
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_et", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEt;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_et", type="string", length=50, nullable=true)
     */
    private $nomEt;

    /**
     * @var string
     *
     * @ORM\Column(name="description_et", type="string", length=50, nullable=true)
     */
    private $descriptionEt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_achevement_et", type="date", nullable=true)
     */
    private $dateAchevementEt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datevalidation_et", type="date", nullable=true)
     */
    private $datevalidationEt;

    /**
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ent_et", referencedColumnName="id_ent")
     * })
     */
    private $idEntEt;

    /**
     * @var \Candidat
     *
     * @ORM\ManyToOne(targetEntity="Candidat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cand_et", referencedColumnName="id_cand")
     * })
     */
    private $idCandEt;

    /**
     * @var \Projet
     *
     * @ORM\ManyToOne(targetEntity="Projet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proj_et", referencedColumnName="id_proj")
     * })
     */
    private $idProjEt;



    /**
     * Get idEt
     *
     * @return integer 
     */
    public function getIdEt()
    {
        return $this->idEt;
    }

    /**
     * Set nomEt
     *
     * @param string $nomEt
     * @return Etape
     */
    public function setNomEt($nomEt)
    {
        $this->nomEt = $nomEt;

        return $this;
    }

    /**
     * Get nomEt
     *
     * @return string 
     */
    public function getNomEt()
    {
        return $this->nomEt;
    }

    /**
     * Set descriptionEt
     *
     * @param string $descriptionEt
     * @return Etape
     */
    public function setDescriptionEt($descriptionEt)
    {
        $this->descriptionEt = $descriptionEt;

        return $this;
    }

    /**
     * Get descriptionEt
     *
     * @return string 
     */
    public function getDescriptionEt()
    {
        return $this->descriptionEt;
    }

    /**
     * Set dateAchevementEt
     *
     * @param \DateTime $dateAchevementEt
     * @return Etape
     */
    public function setDateAchevementEt($dateAchevementEt)
    {
        $this->dateAchevementEt = $dateAchevementEt;

        return $this;
    }

    /**
     * Get dateAchevementEt
     *
     * @return \DateTime 
     */
    public function getDateAchevementEt()
    {
        return $this->dateAchevementEt;
    }

    /**
     * Set datevalidationEt
     *
     * @param \DateTime $datevalidationEt
     * @return Etape
     */
    public function setDatevalidationEt($datevalidationEt)
    {
        $this->datevalidationEt = $datevalidationEt;

        return $this;
    }

    /**
     * Get datevalidationEt
     *
     * @return \DateTime 
     */
    public function getDatevalidationEt()
    {
        return $this->datevalidationEt;
    }

    /**
     * Set idEntEt
     *
     * @param \Insarise\InsariseBundle\Entity\Entreprise $idEntEt
     * @return Etape
     */
    public function setIdEntEt(\Insarise\InsariseBundle\Entity\Entreprise $idEntEt = null)
    {
        $this->idEntEt = $idEntEt;

        return $this;
    }

    /**
     * Get idEntEt
     *
     * @return \Insarise\InsariseBundle\Entity\Entreprise 
     */
    public function getIdEntEt()
    {
        return $this->idEntEt;
    }

    /**
     * Set idCandEt
     *
     * @param \Insarise\InsariseBundle\Entity\Candidat $idCandEt
     * @return Etape
     */
    public function setIdCandEt(\Insarise\InsariseBundle\Entity\Candidat $idCandEt = null)
    {
        $this->idCandEt = $idCandEt;

        return $this;
    }

    /**
     * Get idCandEt
     *
     * @return \Insarise\InsariseBundle\Entity\Candidat 
     */
    public function getIdCandEt()
    {
        return $this->idCandEt;
    }

    /**
     * Set idProjEt
     *
     * @param \Insarise\InsariseBundle\Entity\Projet $idProjEt
     * @return Etape
     */
    public function setIdProjEt(\Insarise\InsariseBundle\Entity\Projet $idProjEt = null)
    {
        $this->idProjEt = $idProjEt;

        return $this;
    }

    /**
     * Get idProjEt
     *
     * @return \Insarise\InsariseBundle\Entity\Projet 
     */
    public function getIdProjEt()
    {
        return $this->idProjEt;
    }
}
