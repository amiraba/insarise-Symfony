<?php

namespace Insarise\MessagingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message", indexes={@ORM\Index(name="fk_emetteur", columns={"id_emetteur_mes"}), @ORM\Index(name="fk_destinataire", columns={"id_destinataire_mes"})})
 * @ORM\Entity
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_mes", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMes;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_emetteur_mes", type="integer", nullable=false)
     */
    private $idEmetteurMes;

    /**
     * @var string
     *
     * @ORM\Column(name="type_emetteur_mes", type="string", nullable=false)
     */
    private $typeEmetteurMes;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_destinataire_mes", type="integer", nullable=false)
     */
    private $idDestinataireMes;

    /**
     * @var string
     *
     * @ORM\Column(name="type_destinataire_mes", type="string", nullable=false)
     */
    private $typeDestinataireMes;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_mes", type="string", length=50, nullable=true)
     */
    private $titreMes;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_mes", type="text", length=65535, nullable=true)
     */
    private $contenuMes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateenvoi_mes", type="date", nullable=true)
     */
    private $dateenvoiMes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datelecture_mes", type="date", nullable=true)
     */
    private $datelectureMes;



    /**
     * Get idMes
     *
     * @return integer 
     */
    public function getIdMes()
    {
        return $this->idMes;
    }

    /**
     * Set idEmetteurMes
     *
     * @param integer $idEmetteurMes
     * @return Message
     */
    public function setIdEmetteurMes($idEmetteurMes)
    {
        $this->idEmetteurMes = $idEmetteurMes;

        return $this;
    }

    /**
     * Get idEmetteurMes
     *
     * @return integer 
     */
    public function getIdEmetteurMes()
    {
        return $this->idEmetteurMes;
    }

    /**
     * Set typeEmetteurMes
     *
     * @param string $typeEmetteurMes
     * @return Message
     */
    public function setTypeEmetteurMes($typeEmetteurMes)
    {
        $this->typeEmetteurMes = $typeEmetteurMes;

        return $this;
    }

    /**
     * Get typeEmetteurMes
     *
     * @return string 
     */
    public function getTypeEmetteurMes()
    {
        return $this->typeEmetteurMes;
    }

    /**
     * Set idDestinataireMes
     *
     * @param integer $idDestinataireMes
     * @return Message
     */
    public function setIdDestinataireMes($idDestinataireMes)
    {
        $this->idDestinataireMes = $idDestinataireMes;

        return $this;
    }

    /**
     * Get idDestinataireMes
     *
     * @return integer 
     */
    public function getIdDestinataireMes()
    {
        return $this->idDestinataireMes;
    }

    /**
     * Set typeDestinataireMes
     *
     * @param string $typeDestinataireMes
     * @return Message
     */
    public function setTypeDestinataireMes($typeDestinataireMes)
    {
        $this->typeDestinataireMes = $typeDestinataireMes;

        return $this;
    }

    /**
     * Get typeDestinataireMes
     *
     * @return string 
     */
    public function getTypeDestinataireMes()
    {
        return $this->typeDestinataireMes;
    }

    /**
     * Set titreMes
     *
     * @param string $titreMes
     * @return Message
     */
    public function setTitreMes($titreMes)
    {
        $this->titreMes = $titreMes;

        return $this;
    }

    /**
     * Get titreMes
     *
     * @return string 
     */
    public function getTitreMes()
    {
        return $this->titreMes;
    }

    /**
     * Set contenuMes
     *
     * @param string $contenuMes
     * @return Message
     */
    public function setContenuMes($contenuMes)
    {
        $this->contenuMes = $contenuMes;

        return $this;
    }

    /**
     * Get contenuMes
     *
     * @return string 
     */
    public function getContenuMes()
    {
        return $this->contenuMes;
    }

    /**
     * Set dateenvoiMes
     *
     * @param \DateTime $dateenvoiMes
     * @return Message
     */
    public function setDateenvoiMes($dateenvoiMes)
    {
        $this->dateenvoiMes = $dateenvoiMes;

        return $this;
    }

    /**
     * Get dateenvoiMes
     *
     * @return \DateTime 
     */
    public function getDateenvoiMes()
    {
        return $this->dateenvoiMes;
    }

    /**
     * Set datelectureMes
     *
     * @param \DateTime $datelectureMes
     * @return Message
     */
    public function setDatelectureMes($datelectureMes)
    {
        $this->datelectureMes = $datelectureMes;

        return $this;
    }

    /**
     * Get datelectureMes
     *
     * @return \DateTime 
     */
    public function getDatelectureMes()
    {
        return $this->datelectureMes;
    }
}
