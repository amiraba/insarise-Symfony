<?php
namespace Insarise\InsariseBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use insarise\InsariseBundle\Entity\Candidat;
use insarise\InsariseBundle\Entity\Candidature;
use insarise\InsariseBundle\Entity\Etape;
use Symfony\Component\HttpFoundation\Session\Session;
include ("methode.php");
include("FindBy.php");
class InsariseController extends Controller
{
   
    public function indexAction()
    {
        return $this->render('InsariseBundle:Default:index.html.twig');
    }
   
    public function connectAction(Request $request)
    {

        $session = new Session();

if (! $session)
{
  $session->start();

}  
        $em = $this->getDoctrine()->getEntityManager();
        
            
        if ($request->getMethod() == 'POST') {
            $login = $request->get('login');
            $password = $request->get('password');
         // $type=$request->get('type');
              
             $repository = $em->getRepository('InsariseBundle:Candidat');
               $user = $repository->findOneBy(array('loginCand' => $login, 'passwordCand' => $password));
            if ($user) {
              //return $this->render('InsariseBundle:Default:welcome.html.twig', array('alert' => '0','msg' =>' '));          
               $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('InsariseBundle:Entreprise');
            $ents = $repository->findAll();
             $session->set('login', $login);
             $session->set('type','Candidat');
            $matrice = array();
            foreach ($ents as $ent) {
                $matrice[$ent->getNomEnt()]=array();
            }
              // $projets=$repository->findAll();
               // $projets = $repository->findByIdEtudProj(0);*
 
                $query = $em->createQuery(
                'SELECT p FROM InsariseBundle:Projet p WHERE p.idCandProj = 0 AND p.statutProj = :statut'
  )->setParameter('statut', 'approuvé');
  $projets = $query->getResult();

             foreach ($projets as $proj) 
            {
              $e= $proj->getIdEntProj()->getNomEnt();
              $a = sizeof( $matrice[$e]);
              $matrice[$e][$a+1]=$proj;
                 
                
            }
     
        return $this->render('InsariseBundle:Default:getall.html.twig',array('matrice' => $matrice));
               }
            
            else 
            {
              $repository = $em->getRepository('InsariseBundle:Entreprise');
                $user = $repository->findOneBy(array('loginEnt' => $login, 'passwordEnt' => $password));
                if ($user)
                {
                  $session->set('login', $login);
             $session->set('type','entreprise');
                   return $this->render('InsariseBundle:Entreprise:welcomeEntr.html.twig', array('alert'=>'2','msg'=>'Welcome Back!'));  
                }
                else
                {
                  $rep = $em->getRepository('InsariseBundle:Moderateur');
                 $mod = $rep->findOneBy(array('loginMod'=>$login,'passwordMod'=>$password));
                 if ($mod)
                 {
                  $session->set('login', $login);
             $session->set('type','mod');
                 return $this->render('InsariseBundle:Default:mod_page.html.twig');
                 }
                 else
                 {
                    return $this->render('InsariseBundle:Default:index.html.twig');
                 }
           
                }
       
                } 
                       } 
                return $this->render('InsariseBundle:Default:index.html.twig');
                 
      
    
  }
    public function deconnectAction()
    {
      $session = new Session();
      
      if ($session)
      {
       $session->clear();
      }
       return $this->render('InsariseBundle:Default:index.html.twig');
    }
    public function getallAction(Request $request)
    {
            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('InsariseBundle:Entreprise');
            $ents = $repository->findAll();
       
            $matrice = array();
            foreach ($ents as $ent) {
                $matrice[$ent->getNomEnt()]=array();
            }
              // $projets=$repository->findAll();
               // $projets = $repository->findByIdEtudProj(0);*
 
                $query = $em->createQuery(
                'SELECT p FROM InsariseBundle:Projet p WHERE p.idCandProj = 0 AND p.statutProj = :statut'
  )->setParameter('statut', 'approuvé');
  $projets = $query->getResult();

             foreach ($projets as $proj) 
            {
              $e= $proj->getIdEntProj()->getNomEnt();
              $a = sizeof( $matrice[$e]);
              $matrice[$e][$a+1]=$proj;
                 
                
            }
     
        return $this->render('InsariseBundle:Default:getall.html.twig',array('matrice' => $matrice));
    }


    public function somepAction(Request $request)
    {
      $session = new Session();
      if(! $session)
      {
        $this->render('InsariseBundle:Default:index.html.twig');
      }
      else
      {
         $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('InsariseBundle:Candidat');
        $user = $repository->findOneBy(array('loginCand' => $session->get('login')));
        if ($user)
        {
            $matrice = array();
            foreach ($user->getIdComEc() as $com) {
                $matrice[$com->getNomCom()]=array();
               // echo $com->getNomCom();
            }
               $query = $em->createQuery(
                'SELECT p FROM InsariseBundle:Projet p WHERE p.idCandProj = 0 AND p.statutProj = :statut'
  )->setParameter('statut', 'approuvé');
  $projets = $query->getResult();
             foreach ($projets as $proj) 
            {
               foreach ($proj->getIdComPc() as $c) 
               {
                   
              //  echo 'projet :'.$proj->getNomProj().'====='.$c->getNomCom();
                   $test = search_for($user->getIdComEc(),$c->getIdCom());
                   //echo " competence testée = ".$c->getNomCom();
                   if ($test == 1)
                   {
                    $a = sizeof( $matrice[$c->getNomCom()]);
                    $matrice[$c->getNomCom()][$a+1]=$proj;
                   // echo 'competence : '.$c->getNomCom().'=====>'.$proj->getNomProj();
                   }

                }
            }
        }
        else
        {
           return $this->render('InsariseBundle:Default:index.html.twig'); 
        }
        return $this->render('InsariseBundle:Default:getsome.html.twig',array('matrice' => $matrice ));
      }
       
    }
   
    public function registerAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $username = $request->get('login');
            $password=$request->get('password');
            $password1=$request->get('password1');
            $firstname = $request->get('nom');
            $lastname = $request->get('prenom');
            $email = $request->get('email');
            $phone = $request->get('tel');
            $adr = $request->get('adresse');
            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('InsariseBundle:Candidat');
            $user = $repository->findOneBy(array('loginCand' => $username));
            if ($user)
            {
               return $this->render('InsariseBundle:Default:index.html.twig');
            }
            else
            {
             if ($password == $password1)
             {
               $etud = new Candidat();
            $etud->setLoginCand($username);
            $etud->setPasswordCand($password);
            $etud->setNomCand($firstname);
            $etud->setPrenomCand($lastname);
            $etud->setEmailCand($email);
            $etud->setTelephoneCand($phone);
            $etud->setAdresseCand($adr);
            $etud->setTypeCand('indiv');

            $em->persist($etud);
            $em->flush();
            $session = new Session();
            if(! $session)
            {
              $session->start();
            }
            $session->set('login',$username);
            return $this->render('InsariseBundle:Default:welcome.html.twig', array('login'=>$username,'nom' => $firstname,'prenom'=> $lastname));  
             }
             else
             {
              return $this->render('InsariseBundle:Default:error.html.twig');
             }
            
            }
            
        }
        return $this->render('InsariseBundle:Default:index.html.twig');
    }
    public function listAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('InsariseBundle:Entreprise');
        //$projets = $repository->findOneBy(array('idEtudProj' => 0));
        $ent=$repository->findAll();
        return $this->render('InsariseBundle:Entreprise:liste.html.twig',array('entreprises' =>$ent));
    }

    public function getmoreAction(Request $request)
    {
       $session= new Session();
       if(! $session)
       {
         return $this->render('InsariseBundle:Default:index.html.twig');
       }
       else
       {
         $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('InsariseBundle:Candidat');
        $user = $repository->findOneBy(array('loginCand' => $session->get('login')));
        $rep = $em->getRepository('InsariseBundle:Projet');
        $proj = $rep->findOneBy(array('idProj'=>$request->get('idproj')));
        $rep = $em->getRepository('InsariseBundle:Entreprise');
        $ent = $rep->findOneBy(array('nomEnt'=>$request->get('nameent')));
         return $this->render('InsariseBundle:Default:getmore.html.twig',array('etud'=>$user,'proj'=>$proj,'ent'=>$ent));      
       }
       
    }
       public function getmoreSAction(Request $request)
    {
        $session = new Session();
        if (! $session)
        {
          $this->render('InsariseBundle:Default:index.html.twig');
        }
        else
        {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('InsariseBundle:Candidat');
        $user = $repository->findOneBy(array('loginCand' => $session->get('login')));
        $rep = $em->getRepository('InsariseBundle:Projet');
        $proj = $rep->findOneBy(array('idProj'=>$request->get('idproj')));
        $r = $em ->getRepository('InsariseBundle:Entreprise');
        $ent = $r->findOneBy(array('idEnt'=> $proj->getIdEntProj()));
        
         return $this->render('InsariseBundle:Default:getmore.html.twig',array('etud'=>$user,'proj'=>$proj,'ent'=>$ent));      
        }
       
    }

    public function confirmAction(Request $request)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $repository = $em->getRepository('InsariseBundle:Candidature');
      $login = $request->get('login_cand');
      $tuple = $repository->findOneBy(array('idCandCandid' => $request->get('id_cand'),'idProjCandid'=>$request->get('idproj')));
            if ($tuple)
            {
               return $this->render('InsariseBundle:Default:welcome.html.twig', array('login'=>$login,'alert' => '1','msg' =>'you have already applied for this project'));          
            }
            else
            {
              $c = new Candidature();
              $c->setIdCandCandid($request->get('id_cand'));
              $c->setIdProjCandid($request->get('idproj'));
              $em->persist($c);
            $em->flush();
           return $this->render('InsariseBundle:Default:welcome.html.twig', array('login'=>$login,'alert' => '2','msg' =>'Your request has been taken into account'));          
            }
    
    }   

    public function moderatorAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('InsariseBundle:Entreprise');
            $ents = $repository->findAll();
       
            $matrice = array();
            foreach ($ents as $ent) {
                $matrice[$ent->getNomEnt()]=array();
            }
             $query = $em->createQuery(
                'SELECT p FROM InsariseBundle:Projet p WHERE p.idCandProj = 0 AND p.statutProj = :statut'
  )->setParameter('statut', 'non_classé');
  $projets = $query->getResult();
 
                
  $projets = $query->getResult();

             foreach ($projets as $proj) 
            {
              $e= $proj->getIdEntProj()->getNomEnt();
              $a = sizeof( $matrice[$e]);
              $matrice[$e][$a+1]=$proj;
                 
                
            }
     
        return $this->render('InsariseBundle:Default:getApp.html.twig',array('matrice' => $matrice  ));
    }

    public function approveAction(Request $request)
    {
      $id = $request->get('idp');
     $em = $this->getDoctrine()->getEntityManager();
      $repository = $em->getRepository('InsariseBundle:Projet');
      $proj = $repository->findOneBy(array('idProj'=> $id));
      if ($request->get('ind') == '1')
      {
        $proj->setStatutProj('approuvé');
        $ch = 'approuvé'.$id;
      }
      else
      {
        $proj->setStatutProj('désapprouvé');
        $ch='desapprouvé'.$id;
      }
      $em->flush();
      return new Response($ch);
    }

public function mineAction()
{
  $session = new Session();
  if (! $session)
  {
     $this->render('InsariseBundle:Default:index.html.twig');
  }
  else
   {
    $em = $this->getDoctrine()->getEntityManager();
      $repository = $em->getRepository('InsariseBundle:Candidat');
      $e = $repository->findOneBy(array('loginCand'=> $session->get('login')));
       $query = $em->createQuery(
                'SELECT p FROM InsariseBundle:Projet p WHERE p.idCandProj = :id '
  )->setParameter('id', $e->getIdCand());
  $projets = $query->getResult();
 return $this->render('InsariseBundle:Default:Mineprojects.html.twig',array('projets'=>$projets));
}
}

public function setEtAction(Request $request)
{
   $session = new Session();
  if (! $session)
  {
     $this->render('InsariseBundle:Default:index.html.twig');
  }
  else
   {
    $em = $this->getDoctrine()->getEntityManager();
   $repository = $em->getRepository('InsariseBundle:Projet');
      $p = $repository->findOneBy(array('idProj'=> $request->get('idp')));  
    $query = $em->createQuery('SELECT et FROM InsariseBundle:Etape et WHERE et.idProjEt = :id ')->setParameter('id', $p->getIdProj());
    $etapes=$query->getResult();
  return $this->render('InsariseBundle:Default:myprojects.html.twig',array('etapes'=>$etapes,'nomp'=>$p->getNomProj()));
   }

}

public function taskAction(Request $request)
{
  $idet = $request->get('id');
  $datetime = date("Y-m-d");
  $em = $this->getDoctrine()->getEntityManager();
  $repository = $em->getRepository('InsariseBundle:Etape');
  $et = $repository->findOneBy(array('idEt'=> $idet));
 $et->setDateAchevementEt(new \DateTime($datetime));
  $em->flush();
  return new Response("etape".$et->getNomEt().$datetime);
  //return new Response('Task'.$idet.'=>'.$datetime);
}

public function setPAction()
{
  $session = new Session();
  if (! $session)
  $this->render('InsariseBundle:Default:index.html.twig');
  $login = $session->get('login');
  $type=$session->get('type');
  $em = $this->getDoctrine()->getEntityManager();
  if ($type=='Candidat')
  {
  
  return $this->render('InsariseBundle:Default:setP.html.twig'); 
  }
  else
  {
   return $this->render('InsariseBundle:Entreprise:setP1.html.twig'); 
  }
 
}

public function submitAction(Request $request)
{
  $session = new Session();
  if (! $session)
      $this->render('InsariseBundle:Default:index.html.twig');
  $login = $request->get('login');
  $pwd = $request->get('password');
  $type = $session->get('type');
   $em = $this->getDoctrine()->getEntityManager();
  if ($type=='Candidat')
  {
    $repository = $em->getRepository('InsariseBundle:Candidat');
    $user = $repository->findOneBy(array('loginCand' => $session->get('login')));
    if ($login != "")
    {
        $user->setLoginCand($login);
        $em->flush();
        $session->set('login',$login);
    }
    if ($pwd != "")
    { 
      $user->setPasswordCand($pwd);
      $em->flush();
    }
    return $this->render('InsariseBundle:Default:welcome.html.twig', array('login'=>$login,'alert' => '2','msg' =>'your profile was updated successfully'));          
  }
  else
  {
     $repository = $em->getRepository('InsariseBundle:Entreprise');
    $user = $repository->findOneBy(array('loginEnt' => $session->get('login')));
    if ($login != "")
    {
        $user->setLoginEnt($login);
        $em->flush();
         $session->set('login',$login);
    }
    if ($pwd != "")
    { 
      $user->setPasswordEnt($pwd);
      $em->flush();
    }
    return $this->render('InsariseBundle:Entreprise:welcomeEntr.html.twig', array('login'=>$login,'alert' => '2','msg' =>'your profile was updated successfully'));
  }

  }

}
