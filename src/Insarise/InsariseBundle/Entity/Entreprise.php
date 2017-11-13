<?php

namespace Insarise\InsariseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity
 */
class Entreprise
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEnt;

    /**
     * @var string
     *
     * @ORM\Column(name="login_ent", type="string", length=50, nullable=true)
     */
    private $loginEnt;

    /**
     * @var string
     *
     * @ORM\Column(name="password_ent", type="string", length=50, nullable=true)
     */
    private $passwordEnt;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ent", type="string", length=50, nullable=true)
     */
    private $nomEnt;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_responsable_ent", type="string", length=255, nullable=true)
     */
    private $nomResponsableEnt;

    /**
     * @var string
     *
     * @ORM\Column(name="email_ent", type="string", length=50, nullable=true)
     */
    private $emailEnt;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_ent", type="string", length=255, nullable=true)
     */
    private $adresseEnt;

    /**
     * @var string
     *
     * @ORM\Column(name="description_ent", type="text", length=65535, nullable=true)
     */
    private $descriptionEnt;



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
     * Set loginEnt
     *
     * @param string $loginEnt
     * @return Entreprise
     */
    public function setLoginEnt($loginEnt)
    {
        $this->loginEnt = $loginEnt;

        return $this;
    }

    /**
     * Get loginEnt
     *
     * @return string 
     */
    public function getLoginEnt()
    {
        return $this->loginEnt;
    }

    /**
     * Set passwordEnt
     *
     * @param string $passwordEnt
     * @return Entreprise
     */
    public function setPasswordEnt($passwordEnt)
    {
        $this->passwordEnt = $passwordEnt;

        return $this;
    }

    /**
     * Get passwordEnt
     *
     * @return string 
     */
    public function getPasswordEnt()
    {
        return $this->passwordEnt;
    }

    /**
     * Set nomEnt
     *
     * @param string $nomEnt
     * @return Entreprise
     */
    public function setNomEnt($nomEnt)
    {
        $this->nomEnt = $nomEnt;

        return $this;
    }

    /**
     * Get nomEnt
     *
     * @return string 
     */
    public function getNomEnt()
    {
        return $this->nomEnt;
    }

    /**
     * Set nomResponsableEnt
     *
     * @param string $nomResponsableEnt
     * @return Entreprise
     */
    public function setNomResponsableEnt($nomResponsableEnt)
    {
        $this->nomResponsableEnt = $nomResponsableEnt;

        return $this;
    }

    /**
     * Get nomResponsableEnt
     *
     * @return string 
     */
    public function getNomResponsableEnt()
    {
        return $this->nomResponsableEnt;
    }

    /**
     * Set emailEnt
     *
     * @param string $emailEnt
     * @return Entreprise
     */
    public function setEmailEnt($emailEnt)
    {
        $this->emailEnt = $emailEnt;

        return $this;
    }

    /**
     * Get emailEnt
     *
     * @return string 
     */
    public function getEmailEnt()
    {
        return $this->emailEnt;
    }

    /**
     * Set adresseEnt
     *
     * @param string $adresseEnt
     * @return Entreprise
     */
    public function setAdresseEnt($adresseEnt)
    {
        $this->adresseEnt = $adresseEnt;

        return $this;
    }

    /**
     * Get adresseEnt
     *
     * @return string 
     */
    public function getAdresseEnt()
    {
        return $this->adresseEnt;
    }

    /**
     * Set descriptionEnt
     *
     * @param string $descriptionEnt
     * @return Entreprise
     */
    public function setDescriptionEnt($descriptionEnt)
    {
        $this->descriptionEnt = $descriptionEnt;

        return $this;
    }

    /**
     * Get descriptionEnt
     *
     * @return string 
     */
    public function getDescriptionEnt()
    {
        return $this->descriptionEnt;
    }
}
