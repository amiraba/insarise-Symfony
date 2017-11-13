<?php

namespace Insarise\MessagingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidat
 *
 * @ORM\Table(name="candidat", indexes={@ORM\Index(name="fk_estdetype", columns={"type_cand"})})
 * @ORM\Entity
 */
class Candidat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cand", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCand;

    /**
     * @var string
     *
     * @ORM\Column(name="login_cand", type="string", length=50, nullable=false)
     */
    private $loginCand;

    /**
     * @var string
     *
     * @ORM\Column(name="password_cand", type="string", length=50, nullable=false)
     */
    private $passwordCand;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cand", type="string", length=50, nullable=true)
     */
    private $nomCand;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_cand", type="string", length=50, nullable=true)
     */
    private $prenomCand;

    /**
     * @var string
     *
     * @ORM\Column(name="email_cand", type="string", length=50, nullable=true)
     */
    private $emailCand;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_cand", type="string", length=50, nullable=true)
     */
    private $telephoneCand;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_cand", type="string", length=255, nullable=true)
     */
    private $adresseCand;

    /**
     * @var string
     *
     * @ORM\Column(name="type_cand", type="string", nullable=false)
     */
    private $typeCand;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Competence", inversedBy="idCandEc")
     * @ORM\JoinTable(name="candidat_competence",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_cand_ec", referencedColumnName="id_cand")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_com_ec", referencedColumnName="id_com")
     *   }
     * )
     */
    private $idComEc;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idComEc = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set loginCand
     *
     * @param string $loginCand
     * @return Candidat
     */
    public function setLoginCand($loginCand)
    {
        $this->loginCand = $loginCand;

        return $this;
    }

    /**
     * Get loginCand
     *
     * @return string 
     */
    public function getLoginCand()
    {
        return $this->loginCand;
    }

    /**
     * Set passwordCand
     *
     * @param string $passwordCand
     * @return Candidat
     */
    public function setPasswordCand($passwordCand)
    {
        $this->passwordCand = $passwordCand;

        return $this;
    }

    /**
     * Get passwordCand
     *
     * @return string 
     */
    public function getPasswordCand()
    {
        return $this->passwordCand;
    }

    /**
     * Set nomCand
     *
     * @param string $nomCand
     * @return Candidat
     */
    public function setNomCand($nomCand)
    {
        $this->nomCand = $nomCand;

        return $this;
    }

    /**
     * Get nomCand
     *
     * @return string 
     */
    public function getNomCand()
    {
        return $this->nomCand;
    }

    /**
     * Set prenomCand
     *
     * @param string $prenomCand
     * @return Candidat
     */
    public function setPrenomCand($prenomCand)
    {
        $this->prenomCand = $prenomCand;

        return $this;
    }

    /**
     * Get prenomCand
     *
     * @return string 
     */
    public function getPrenomCand()
    {
        return $this->prenomCand;
    }

    /**
     * Set emailCand
     *
     * @param string $emailCand
     * @return Candidat
     */
    public function setEmailCand($emailCand)
    {
        $this->emailCand = $emailCand;

        return $this;
    }

    /**
     * Get emailCand
     *
     * @return string 
     */
    public function getEmailCand()
    {
        return $this->emailCand;
    }

    /**
     * Set telephoneCand
     *
     * @param string $telephoneCand
     * @return Candidat
     */
    public function setTelephoneCand($telephoneCand)
    {
        $this->telephoneCand = $telephoneCand;

        return $this;
    }

    /**
     * Get telephoneCand
     *
     * @return string 
     */
    public function getTelephoneCand()
    {
        return $this->telephoneCand;
    }

    /**
     * Set adresseCand
     *
     * @param string $adresseCand
     * @return Candidat
     */
    public function setAdresseCand($adresseCand)
    {
        $this->adresseCand = $adresseCand;

        return $this;
    }

    /**
     * Get adresseCand
     *
     * @return string 
     */
    public function getAdresseCand()
    {
        return $this->adresseCand;
    }

    /**
     * Set typeCand
     *
     * @param string $typeCand
     * @return Candidat
     */
    public function setTypeCand($typeCand)
    {
        $this->typeCand = $typeCand;

        return $this;
    }

    /**
     * Get typeCand
     *
     * @return string 
     */
    public function getTypeCand()
    {
        return $this->typeCand;
    }

    /**
     * Add idComEc
     *
     * @param \Insarise\MessagingBundle\Entity\Competence $idComEc
     * @return Candidat
     */
    public function addIdComEc(\Insarise\MessagingBundle\Entity\Competence $idComEc)
    {
        $this->idComEc[] = $idComEc;

        return $this;
    }

    /**
     * Remove idComEc
     *
     * @param \Insarise\MessagingBundle\Entity\Competence $idComEc
     */
    public function removeIdComEc(\Insarise\MessagingBundle\Entity\Competence $idComEc)
    {
        $this->idComEc->removeElement($idComEc);
    }

    /**
     * Get idComEc
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdComEc()
    {
        return $this->idComEc;
    }
}
