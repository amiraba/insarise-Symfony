<?php
namespace Insarise\InsariseBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use insarise\InsariseBundle\Entity\Entreprise;
use insarise\InsariseBundle\Entity\Competence;
use insarise\InsariseBundle\Entity\Projet;
use insarise\InsariseBundle\Entity\Etape;
use insarise\InsariseBundle\Entity\Candidat;
use insarise\InsariseBundle\Entity\Candidature;
use Symfony\Component\HttpFoundation\Session\Session;
class EntrepriseController extends Controller
{
   
    public function indexAction()
    {
        return $this->render('InsariseBundle:Entreprise:registerE.html.twig');
    }
   /*  public function registerAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $login = $request->get('login');
            $password=$request->get('password');
            $name = $request->get('name');
            $resp = $request->get('resp');
            $email = $request->get('email');
            $adress = $request->get('adress');
            $desc = $request->get('desc');
            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('InsariseBundle:Entreprise');
            $entrep = $repository->findOneBy(array('loginEnt' => $login));
            if ($entrep)
            {
               return $this->render('InsariseBundle:Entreprise:registerE.html.twig');
            }
            else
            {
             $e = new Entreprise();
             $e->setLoginEnt($login);
             $e->setPasswordEnt($password);
             $e->setNomEnt($name);
             $e->setNomResponsableEnt($resp);
             $e->setEmailEnt($email);
             $e->setAdresseEnt($adress);
             $e->setDescriptionEnt($desc);
            $em->persist($e);
            $em->flush();
               $session = new Session();
            if (! $session)
            {
            	 $session->start();
            
            }
            	$session->set('login',$login);
            return $this->render('InsariseBundle:Entreprise:welcomeEntr.html.twig');  
            
            
            }
            
        }
        return $this->render('InsariseBundle:Entreprise:registerE.html.twig');
    }*/
    public function deconnectAction()
    {
      $session = new Session();
      
      if ($session)
      {
       $session->clear();
      }
       return $this->render('InsariseBundle:Default:index.html.twig');
    }
    public function addAction()
    {
         $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('InsariseBundle:Competence');
            $comp = $repository->findAll();
        return $this->render('InsariseBundle:Entreprise:AddP.html.twig',array('comp'=> $comp));
    }
    public function insertAction(Request $request)
    {
        $session = new Session();
        if (! $session)
        {
          return $this->render('InsariseBundle:Default:index.html.twig');
        }
        else
        {
        
         $em = $this->getDoctrine()->getEntityManager();
         $nomp = $request->get('nom');
         $desc = $request->get('desc');
        $repository = $em->getRepository('InsariseBundle:Projet');
        $test = $repository->findOneBy(array('nomProj'=>$nomp));
        if($test)
        {
              return $this->render('InsariseBundle:Default:index.html.twig');  
        }
        else
        {
        $p = new Projet();
        $p->setNomProj($nomp);
        $p->setDescriptionProj($desc);
        $p->setStatutProj('non_classé');
        $login=$session->get('login');
        $rep=$em->getRepository('InsariseBundle:Entreprise');
        $e=$rep->findOneBy(array('loginEnt' => $login));
        $p->setIdEntProj($e);
        $p->setIdCandProj(0);
        
       
        $em = $this->getDoctrine()->getEntityManager();
         $r= $em->getRepository('InsariseBundle:Competence');
      
        foreach ($request->get('comp') as $key ) 
        {
            $com = $r->findOneBy(array('idCom'=>$key));
            $p->addIdComPc($com);
            
            $com->getIdCandEc($p);
           
        }
        $em->persist($p);
        $em->flush();
        return $this->render('InsariseBundle:Entreprise:addEt.html.twig',array('idproj'=> $p->getIdProj()));  
        }
       
        }
    }

    public function homeAction()
    {
        return $this->render('InsariseBundle:Entreprise:welcomeEntr.html.twig');  
    }

    public function listAction()
    {
      $session = new Session();
      if (! $session)
      {
       return $this->render('InsariseBundle:Default:index.html.twig');
      }
      else
       {
          $em = $this->getDoctrine()->getEntityManager();
          $repository = $em->getRepository('InsariseBundle:Entreprise');
          $e = $repository->findOneBy(array('loginEnt'=> $session->get('login')));
      $query = $em->createQuery('SELECT p FROM InsariseBundle:Projet p WHERE p.idEntProj = :id'
  )->setParameter('id',$e->getIdEnt());
  $projets = $query->getResult();
 
         return $this->render('InsariseBundle:Entreprise:ListeP.html.twig',array('list' =>$projets));  
         
       }
    }

    public function setEtAction(Request $request)
    {
       return $this->render('InsariseBundle:Entreprise:addEt.html.twig',array('idproj'=> $request->get('idproj')));  
    }
    public function validEtAction(Request $request)
    {
      $session =new Session();
      if (! $session)
      {
         return $this->render('InsariseBundle:Default:index.html.twig');
      }
      else
      {
      $tit= $request->get('title');
      $desc=$request->get('desc');
      $idp=$request->get('idp');
      $login = $session->get('login');
      echo $tit.$desc.$idp.$login;
      $em = $this->getDoctrine()->getEntityManager();
      $repository1 = $em->getRepository('InsariseBundle:Projet');
      $p=$repository1->findOneBy(array('idProj'=>$idp));
      $repository2 = $em->getRepository('InsariseBundle:Entreprise');
      $e= $repository2->findOneBy(array('loginEnt'=>$login));
      $repository = $em->getRepository('InsariseBundle:Etape');
      $et = new Etape();
      $et->setNomEt($tit);
      $et->setDescriptionEt($desc);
      $et->setIdEntEt($e);
      $et->setIdProjEt($p);
      //$et->setDateAchevementEt(NULL);
      //$et->setDatevalidationEt(NULL);
      $em->persist($et);
      $em->flush();
      return new Response('done');
      }
      
    }
     public function cntlEtAction()
    {
      $session = new Session();
      if (! $session)
      {
        return $this->render('InsariseBundle:Default:index.html.twig');
      }
      else
      {
     $login = $session->get('login');
      $em = $this->getDoctrine()->getEntityManager();
      $repository1 = $em->getRepository('InsariseBundle:Entreprise');
      $e=$repository1->findOneBy(array('loginEnt'=>$login));
      $repository2 = $em->getRepository('InsariseBundle:Projet');
       $query = $em->createQuery('SELECT p FROM InsariseBundle:Projet p WHERE p.idEntProj = :id AND p.idCandProj > 0'
  )->setParameter('id',$e->getIdEnt());
  $projets = $query->getResult();
  $matrice=array();
  foreach ($projets as $proj) {
    $idC=$proj->getIdCandProj();
    $rep=$em->getRepository('InsariseBundle:Candidat');
    $cand = $rep->findOneBy(array('idCand'=> $idC));
    $nom = $cand->getNomCand();
    $prenom = $cand->getPrenomCand();
    $matrice[$nom.' '.$prenom]=$proj;
  }
  return $this->render('InsariseBundle:Entreprise:ListeAff.html.twig',array('matrice'=> $matrice));  
      }
    }

    public function EntEtAction(Request $request)
    {
      $idp = $request->get('idp');
      $em = $this->getDoctrine()->getEntityManager();
      $query = $em->createQuery('SELECT e FROM InsariseBundle:Etape e WHERE e.idProjEt = :id AND e.dateAchevementEt IS NOT NULL'
  )->setParameter('id',$idp);
  $etapes = $query->getResult();
  $ch="<table id='table'><tr><td>Title</td><td>Description</td><td>Does it meet your demand?</td></tr>";
  if (! $etapes)
  {
    $ch="No realizes task to validate!";
  }
  else
  {
    foreach ($etapes as $et) {
    $ch = $ch."<tr><td>".$et->getNomEt()."</td><td>".$et->getDescriptionEt()."</td><td>";
    if ($et->getDatevalidationEt())
      {
        $ch=$ch.'validated';
      }
      else{
        $a = 1+$et->getIdEt();
        $ch = $ch."<div id=".$et->getIdEt()."></div><div id=".$a."><a href='#' onclick='methode(".$et->getIdEt().",1)'>yes</a></div></td></tr>";
      }
  }
  $ch=$ch.'</table>';
  }
  
      return new Response($ch);
  }

  public function validateAction(Request $request)
  {
  $idet= $request->get('id');
  $datetime = date("Y-m-d");
  $em = $this->getDoctrine()->getEntityManager();
  $repository = $em->getRepository('InsariseBundle:Etape');
  $et = $repository->findOneBy(array('idEt'=> $idet));
  $et->setDatevalidationEt(new \DateTime($datetime));
  $em->flush();
  return new Response("etape".$et->getNomEt().$datetime);
  } 

  public function chooseAction()
{
  $session = new Session();
  if (! $session)
  {
    return $this->render('InsariseBundle:Default:index.html.twig');
  }
  else
  {
    $login = $session->get('login');
    $em = $this->getDoctrine()->getEntityManager();
    $repository = $em->getRepository('InsariseBundle:Entreprise');
    $ent = $repository->findOneBy(array('loginEnt'=> $login));
    $query = $em->createQuery('SELECT p FROM InsariseBundle:Projet p WHERE p.idEntProj = :id'
  )->setParameter('id',$ent->getIdEnt());
  $projets = $query->getResult();
  $mat = array();
  foreach ($projets as $proj) {
    $mat[$proj->getNomProj()]=array();
     $query1 = $em->createQuery('SELECT c FROM InsariseBundle:Candidature c WHERE c.idProjCandid = :id'
  )->setParameter('id',$proj->getIdProj());
  $cand = $query1->getResult();
  $i = 0;
  foreach ($cand as $key) {
     $repository = $em->getRepository('InsariseBundle:Candidat');
    $co = $repository->findOneBy(array('idCand'=> $key->getIdCandCandid()));
    $mat[$proj->getNomProj()][$i]=$co;
    $i++;
  }

  }
    return $this->render('InsariseBundle:Entreprise:chooseC.html.twig',array('mat'=>$mat));

  }
}

public function seeProAction(Request $request)
{
  $idC = $request->get('idC');
  $nomP = $request->get('nomP');
   $em = $this->getDoctrine()->getEntityManager();
    $rep = $em->getRepository('InsariseBundle:Candidat');
    $c = $rep->findOneBy(array('idCand'=> $idC));
    return $this->render('InsariseBundle:Entreprise:Profile.html.twig',array('cand'=>$c,'nomP'=>$nomP));
}

public function finiAction(Request $request)
{
  $nomp = $request->get('nomP');
  $idC= $request->get('idC');
   $em = $this->getDoctrine()->getEntityManager();
    $repository = $em->getRepository('InsariseBundle:Projet');
    $p = $repository->findOneBy(array('nomProj'=> $nomp));
    $rep = $em->getRepository('InsariseBundle:Candidat');
    $c = $rep->findOneBy(array('idCand'=> $idC));
    $p->setIdCandProj($idC);
    $em->flush();
   return $this->render('InsariseBundle:Entreprise:welcomeEntr.html.twig', array('alert'=>'2','msg'=>'The project :'.$nomp.' is assigned to :'.$c->getLoginCand().'('.$c->getEmailCand().')'));  
}
}
?>