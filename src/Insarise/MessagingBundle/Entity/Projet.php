<?php

namespace Insarise\MessagingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet", indexes={@ORM\Index(name="fk_projet_ent", columns={"id_ent_proj"})})
 * @ORM\Entity
 */
class Projet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_proj", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProj;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cand_proj", type="integer", nullable=true)
     */
    private $idCandProj;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_proj", type="string", length=50, nullable=true)
     */
    private $nomProj;

    /**
     * @var string
     *
     * @ORM\Column(name="description_proj", type="text", length=65535, nullable=true)
     */
    private $descriptionProj;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_proj", type="string", nullable=false)
     */
    private $statutProj;

    /**
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ent_proj", referencedColumnName="id_ent")
     * })
     */
    private $idEntProj;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Moderateur", mappedBy="idProjAp")
     */
    private $idModAp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Competence", inversedBy="idProjPc")
     * @ORM\JoinTable(name="projet_competence",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_proj_pc", referencedColumnName="id_proj")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_com_pc", referencedColumnName="id_com")
     *   }
     * )
     */
    private $idComPc;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idModAp = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idComPc = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set idCandProj
     *
     * @param integer $idCandProj
     * @return Projet
     */
    public function setIdCandProj($idCandProj)
    {
        $this->idCandProj = $idCandProj;

        return $this;
    }

    /**
     * Get idCandProj
     *
     * @return integer 
     */
    public function getIdCandProj()
    {
        return $this->idCandProj;
    }

    /**
     * Set nomProj
     *
     * @param string $nomProj
     * @return Projet
     */
    public function setNomProj($nomProj)
    {
        $this->nomProj = $nomProj;

        return $this;
    }

    /**
     * Get nomProj
     *
     * @return string 
     */
    public function getNomProj()
    {
        return $this->nomProj;
    }

    /**
     * Set descriptionProj
     *
     * @param string $descriptionProj
     * @return Projet
     */
    public function setDescriptionProj($descriptionProj)
    {
        $this->descriptionProj = $descriptionProj;

        return $this;
    }

    /**
     * Get descriptionProj
     *
     * @return string 
     */
    public function getDescriptionProj()
    {
        return $this->descriptionProj;
    }

    /**
     * Set statutProj
     *
     * @param string $statutProj
     * @return Projet
     */
    public function setStatutProj($statutProj)
    {
        $this->statutProj = $statutProj;

        return $this;
    }

    /**
     * Get statutProj
     *
     * @return string 
     */
    public function getStatutProj()
    {
        return $this->statutProj;
    }

    /**
     * Set idEntProj
     *
     * @param \Insarise\MessagingBundle\Entity\Entreprise $idEntProj
     * @return Projet
     */
    public function setIdEntProj(\Insarise\MessagingBundle\Entity\Entreprise $idEntProj = null)
    {
        $this->idEntProj = $idEntProj;

        return $this;
    }

    /**
     * Get idEntProj
     *
     * @return \Insarise\MessagingBundle\Entity\Entreprise 
     */
    public function getIdEntProj()
    {
        return $this->idEntProj;
    }

    /**
     * Add idModAp
     *
     * @param \Insarise\MessagingBundle\Entity\Moderateur $idModAp
     * @return Projet
     */
    public function addIdModAp(\Insarise\MessagingBundle\Entity\Moderateur $idModAp)
    {
        $this->idModAp[] = $idModAp;

        return $this;
    }

    /**
     * Remove idModAp
     *
     * @param \Insarise\MessagingBundle\Entity\Moderateur $idModAp
     */
    public function removeIdModAp(\Insarise\MessagingBundle\Entity\Moderateur $idModAp)
    {
        $this->idModAp->removeElement($idModAp);
    }

    /**
     * Get idModAp
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdModAp()
    {
        return $this->idModAp;
    }

    /**
     * Add idComPc
     *
     * @param \Insarise\MessagingBundle\Entity\Competence $idComPc
     * @return Projet
     */
    public function addIdComPc(\Insarise\MessagingBundle\Entity\Competence $idComPc)
    {
        $this->idComPc[] = $idComPc;

        return $this;
    }

    /**
     * Remove idComPc
     *
     * @param \Insarise\MessagingBundle\Entity\Competence $idComPc
     */
    public function removeIdComPc(\Insarise\MessagingBundle\Entity\Competence $idComPc)
    {
        $this->idComPc->removeElement($idComPc);
    }

    /**
     * Get idComPc
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdComPc()
    {
        return $this->idComPc;
    }
}
