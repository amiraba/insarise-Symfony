<?php

namespace Insarise\InsariseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moderateur
 *
 * @ORM\Table(name="moderateur")
 * @ORM\Entity
 */
class Moderateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_mod", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMod;

    /**
     * @var string
     *
     * @ORM\Column(name="login_mod", type="string", length=50, nullable=true)
     */
    private $loginMod;

    /**
     * @var string
     *
     * @ORM\Column(name="password_mod", type="string", length=50, nullable=true)
     */
    private $passwordMod;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_mod", type="string", length=50, nullable=true)
     */
    private $nomMod;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_mod", type="string", length=50, nullable=true)
     */
    private $prenomMod;

    /**
     * @var string
     *
     * @ORM\Column(name="email_mod", type="string", length=50, nullable=true)
     */
    private $emailMod;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Projet", inversedBy="idModAp")
     * @ORM\JoinTable(name="approbation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_mod_ap", referencedColumnName="id_mod")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_proj_ap", referencedColumnName="id_proj")
     *   }
     * )
     */
    private $idProjAp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProjAp = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idMod
     *
     * @return integer 
     */
    public function getIdMod()
    {
        return $this->idMod;
    }

    /**
     * Set loginMod
     *
     * @param string $loginMod
     * @return Moderateur
     */
    public function setLoginMod($loginMod)
    {
        $this->loginMod = $loginMod;

        return $this;
    }

    /**
     * Get loginMod
     *
     * @return string 
     */
    public function getLoginMod()
    {
        return $this->loginMod;
    }

    /**
     * Set passwordMod
     *
     * @param string $passwordMod
     * @return Moderateur
     */
    public function setPasswordMod($passwordMod)
    {
        $this->passwordMod = $passwordMod;

        return $this;
    }

    /**
     * Get passwordMod
     *
     * @return string 
     */
    public function getPasswordMod()
    {
        return $this->passwordMod;
    }

    /**
     * Set nomMod
     *
     * @param string $nomMod
     * @return Moderateur
     */
    public function setNomMod($nomMod)
    {
        $this->nomMod = $nomMod;

        return $this;
    }

    /**
     * Get nomMod
     *
     * @return string 
     */
    public function getNomMod()
    {
        return $this->nomMod;
    }

    /**
     * Set prenomMod
     *
     * @param string $prenomMod
     * @return Moderateur
     */
    public function setPrenomMod($prenomMod)
    {
        $this->prenomMod = $prenomMod;

        return $this;
    }

    /**
     * Get prenomMod
     *
     * @return string 
     */
    public function getPrenomMod()
    {
        return $this->prenomMod;
    }

    /**
     * Set emailMod
     *
     * @param string $emailMod
     * @return Moderateur
     */
    public function setEmailMod($emailMod)
    {
        $this->emailMod = $emailMod;

        return $this;
    }

    /**
     * Get emailMod
     *
     * @return string 
     */
    public function getEmailMod()
    {
        return $this->emailMod;
    }

    /**
     * Add idProjAp
     *
     * @param \Insarise\InsariseBundle\Entity\Projet $idProjAp
     * @return Moderateur
     */
    public function addIdProjAp(\Insarise\InsariseBundle\Entity\Projet $idProjAp)
    {
        $this->idProjAp[] = $idProjAp;

        return $this;
    }

    /**
     * Remove idProjAp
     *
     * @param \Insarise\InsariseBundle\Entity\Projet $idProjAp
     */
    public function removeIdProjAp(\Insarise\InsariseBundle\Entity\Projet $idProjAp)
    {
        $this->idProjAp->removeElement($idProjAp);
    }

    /**
     * Get idProjAp
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdProjAp()
    {
        return $this->idProjAp;
    }
}
