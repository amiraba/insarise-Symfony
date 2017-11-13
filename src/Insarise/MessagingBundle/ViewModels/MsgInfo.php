<?php

namespace Insarise\MessagingBundle\ViewModels;

class MsgInfo
{
	private $titre;
	private $contenu ;
	private $emetteur ; 
	private $destinataire ;
	private $date_envoi;
    private $date_lec;



    public function getTitre()
    {
        return $this->titre;
    }

  
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

  
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getEmetteur()
    {
        return $this->emetteur;
    }

  
    public function setEmetteur($emetteur)
    {
        $this->emetteur = $emetteur;

        return $this;
    }
    public function getDestinataire()
    {
        return $this->destinataire;
    }

  
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    public function getDate_envoi()
    {
        return $this->date_envoi;
    }

  
    public function setDate_envoi($date_envoi)
    {
        $this->date_envoi = $date_envoi;

        return $this;
    }

    public function getDate_lec()
    {
        return $this->date_lec;
    }

  
    public function setDate_lec($date_lec)
    {
        $this->date_lec = $date_lec;

        return $this;
    }
}