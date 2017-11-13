<?php
namespace Insarise\MessagingBundle\Controller;

use Insarise\MessagingBundle\Entity\Message;
use Insarise\MessagingBundle\Entity\Candidat;
use Insarise\MessagingBundle\Entity\Entreprise;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Insarise\MessagingBundle\ViewModels\MsgInfo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use \DateTime;

class MessagingController extends Controller
{

//This method serves to display one's messages !!
	public function display_messagesAction(Request $request){

/*Session initialization ** TO REMOVE WHEN LOG IN MODULE IS INTEGRATED** */
			$session = new Session();
			if (! $session)
			return $this->render('InsariseBundle:Default:index.html.twig');

		$repository_Msg = $this

  ->getDoctrine()

  ->getManager()

  ->getRepository('InsariseMessagingBundle:Message');
$login_co = $session->get('login');
$type_membre = $session->get('type');
if ($type_membre == 'Candidat'){


	$repository_login_co = $this

	  ->getDoctrine()

	  ->getManager()

	  ->getRepository('InsariseMessagingBundle:Candidat');
	  	$membre = $repository_login_co->findOneBy(array('loginCand'=>$login_co));
	  $id_co = $membre->getIdCand();
	}
else
	{
		
		$repository_login_co = $this

	  ->getDoctrine()

	  ->getManager()

	  ->getRepository('InsariseMessagingBundle:Entreprise');
	  $membre = $repository_login_co->findOneBy(array('loginEnt'=>$login_co));
	  $id_co = $membre->getIdEnt();

	}

$listeMsgs_to_View= array();
 $em = $this->getDoctrine()->getEntityManager();
$query = $em->createQuery(
                'SELECT m FROM InsariseMessagingBundle:Message m WHERE m.idDestinataireMes = :id'
  )->setParameter('id', $id_co);
  $msgs = $query->getResult();
  $i=0;
  foreach ($msgs as $m ) {
  	$id_em = $m->getIdEmetteurMes();
  	if ($type_membre == 'Candidat')
  	{
  		$repository = $em->getRepository('InsariseMessagingBundle:Entreprise');
  		$user = $repository->findOneBy(array('idEnt'=>$id_em));
  		$listeMsgs_to_View[$i]=array();
  		$listeMsgs_to_View[$i]['nom']=$user->getNomEnt();
  		$listeMsgs_to_View[$i]['msg']=$m;
  		$i++;
  	}
  	else
  	{
  		$repository = $em->getRepository('InsariseMessagingBundle:Candidat');
  		$user = $repository->findOneBy(array('idCand'=>$id_em));
  		$ch = $user->getNomCand()."  ";
  		$ch=$ch.$user->getPrenomCand();
  		$listeMsgs_to_View[$i]=array();
  		$listeMsgs_to_View[$i]['nom']=$ch;
  		$listeMsgs_to_View[$i]['msg']=$m;
  		$i++;
  	}
  	}

    
 /* }
$listMessages = $this->getDoctrine()
               ->getRepository('InsariseMessagingBundle:Message')
               ->createQueryBuilder('e')
               ->where('e.idDestinataireMes = :id_co' )
               ->orderBy('e.dateenvoiMes', 'DESC')
               ->setParameter('id_co', $id_co)
               ->select('e')
               ->getQuery()
               ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
$listeMsgs_to_View = array();


foreach ($listMessages as $message) {

	$typeEmett = $message['typeEmetteurMes'];
	if ($typeEmett == 'Candidat')
	 {
	$repository_etud = $this

  ->getDoctrine()

  ->getManager()

  ->getRepository('InsariseMessagingBundle:Candidat');
  if ($type_membre == 'entreprise'){
  $etud = $repository_etud->find($message['idEmetteurMes']);
  $msg_info = new MsgInfo();
  $msg_info->setTitre($message['titreMes']);
  $msg_info->setContenu($message['contenuMes']);
  $msg_info->setEmetteur($etud->getNomCand() . " " . $etud->getPrenomCand());
  $msg_info->setDate_envoi($message['dateenvoiMes']);
  $msg_info->setDate_lec($message['datelectureMes']);

  $listeMsgs_to_View[]=$msg_info;
}
	 }
	 else
	 {

	 	$repository_ent = $this

  ->getDoctrine()

  ->getManager()

  ->getRepository('InsariseMessagingBundle:Entreprise');
if ($type_membre == 'Candidat'){
  $ent = $repository_ent->find($message['idEmetteurMes']);
  $msg_info = new MsgInfo();
  $msg_info->setTitre($message['titreMes']);
  $msg_info->setContenu($message['contenuMes']);
  $msg_info->setEmetteur($ent->getNomEnt() . " " );
  $msg_info->setDate_envoi($message['dateenvoiMes']);
  $msg_info->setDate_lec($message['datelectureMes']);


  $listeMsgs_to_View[]=$msg_info;

}
	 }
}

*/
if ($type_membre == 'Candidat')
{
  return $this->render('InsariseMessagingBundle:Default:messages.html.twig', 
        array(
            "listeMsgs_to_View" => $listeMsgs_to_View));
}
else
{
  return $this->render('InsariseMessagingBundle:Default:messages1.html.twig', 
        array(
            "listeMsgs_to_View" => $listeMsgs_to_View));
}

return $this->render('InsariseMessagingBundle:Default:messages.html.twig', 
        array(
            "listeMsgs_to_View" => $listeMsgs_to_View));
}
 public function sendAction(Request $request)
 {
  $session = new Session();
  if (! $session)
    return $this->render('InsariseBundle:Default:index.html.twig');
  $destinataire = $request->get('destinataire');
  $titre = $request->get('titre');
  $contenu = $request->get('contenu');
  $login = $session->get('login');
  $type_log= $session->get('type');
  $em = $this->getDoctrine()->getEntityManager();
  $date_envoi = new \DateTime("now");
  //return new Response('emet = '$login.' recep = '.$destinataire.' titre = '.$titre.'contenu = '.$contenu.'date = '.$date_envoi);
  if ($type_log=='Candidat')
  {
            $repository = $em->getRepository('InsariseMessagingBundle:Candidat');
            $emet = $repository->findOneBy(array('loginCand'=>$login));
            $id_emet = $emet->getIdCand();
            $rep = $em->getRepository('InsariseMessagingBundle:Entreprise');
            $recep = $rep->findOneBy(array('loginEnt'=>$destinataire));
            $id_recep = $recep->getIdEnt();
              $repo = $em->getRepository('InsariseMessagingBundle:Message');
              $msg = new Message();
              $msg->setIdEmetteurMes($id_emet);
              $msg->setTypeEmetteurMes('Candidat');
              $msg->setIdDestinataireMes($id_recep);
              $msg->setTypeDestinataireMes('entreprise');
              $msg->setTitreMes($titre);
              $msg->setContenuMes($contenu);
              $msg->setDateenvoiMes($date_envoi);
               $em->persist($msg);
            $em->flush();
 return $this->render('InsariseBundle:Default:welcome.html.twig', array('login'=>$login,'alert' => '2','msg' =>'your message has been successfully sent'));          

  }
  else
  {
            $repository = $em->getRepository('InsariseMessagingBundle:Candidat');
            $recep = $repository->findOneBy(array('loginCand'=>$destinataire));
            $id_recep = $recep->getIdCand();
            $rep = $em->getRepository('InsariseMessagingBundle:Entreprise');
            $emet = $rep->findOneBy(array('loginEnt'=>$login));
            $id_emet = $emet->getIdEnt();
                  $repo = $em->getRepository('InsariseMessagingBundle:Message');
              $msg = new Message();
              $msg->setIdEmetteurMes($id_emet);
              $msg->setTypeEmetteurMes('entreprise');
              $msg->setIdDestinataireMes($id_recep);
              $msg->setTypeDestinataireMes('Candidat');
              $msg->setTitreMes($titre);
              $msg->setContenuMes($contenu);
              $msg->setDateenvoiMes($date_envoi);
               $em->persist($msg);
            $em->flush();
 return $this->render('InsariseBundle:Entreprise:welcomeEntr.html.twig', array('login'=>$login,'alert' => '2','msg' =>'your message has been successfully sent'));          
  }
  

 }

//this method is used to send a message
public function send_messageAction(Request $request){
  $session = new Session();
  if (! $session)
        return $this->render('InsariseBundle:Default:index.html.twig');
$type_log=$session->get('type');
 $em = $this->getDoctrine()->getEntityManager();
 if ($type_log=="Candidat")
 {
    $repository = $em->getRepository('InsariseMessagingBundle:Entreprise');
    $users=$repository->findAll();
     return $this->render('InsariseMessagingBundle:Default:writeMsg.html.twig',array('liste'=>$users,'ind'=>'ent'));
 }
 else
 {

  $repository = $em->getRepository('InsariseMessagingBundle:Candidat');
    $users=$repository->findAll();
 return $this->render('InsariseMessagingBundle:Default:writeMsg1.html.twig',array('liste'=>$users,'ind'=>'cand'));
 }
 
/*Session initialization ** TO REMOVE WHEN LOG IN MODULE IS INTEGRATED** */
     	/*	$session = new Session();
			if (! $session)
			return $this->render('InsariseBundle:Default:index.html.twig');
/*end of sessions initialization */

	/*$message_info = new MsgInfo();
	$date_envoi = new \DateTime("now");
	$formBuilder = $this->createFormBuilder($message_info);
	$formBuilder
			->add('destinataire','text')
			->add('titre','text')
			->add('contenu','textarea')
		    ->add('save','submit');


    $form = $formBuilder->getForm();
    if ($request->getMethod() == 'POST' ) {
    	  $form->bind($request); 
	      $validator = $this->get('validator');
		  $listErrors = $validator->validate($message_info);
    	  if(count($listErrors) == 0) {
			  $em = $this->getDoctrine()->getManager();
			  $message = new Message();
			  $message ->setTitreMes($message_info->getTitre());
			  $message->setContenuMes($message_info->getContenu());
			  $message->setDateenvoiMes($date_envoi);
				$login_co = $session->get('login');
				$type_membre = $session->get('type');
	if ($type_membre == 'Candidat')
	 {
	$repository_login_co = $this

  ->getDoctrine()

  ->getManager()

  ->getRepository('InsariseMessagingBundle:Candidat');

  $repository_login_dst = $this

  ->getDoctrine()

  ->getManager()

  ->getRepository('InsariseMessagingBundle:Entreprise');

  	  $login_dst = $message_info->getDestinataire();
  	  $dst = $repository_login_dst->findOneBy(array('loginEnt'=>$login_dst));
	  $membre = $repository_login_co->findOneBy(array('loginCand'=>$login_co));
	  $id_co = $membre->getIdCand();
	  $id_dst = $dst->getIdEnt();
	  $type_dst = 'entreprise';
 
 
	 }
	 else
	 {
	 	$repository_login_co = $this

  ->getDoctrine()

  ->getManager()

  ->getRepository('InsariseMessagingBundle:Entreprise');
  $repository_login_dst = $this

  ->getDoctrine()

  ->getManager()

  ->getRepository('InsariseMessagingBundle:Candidat');

  	  $login_dst = $message_info->getDestinataire();
  	  $dst = $repository_login_dst->findOneBy(array('loginCand'=>$login_dst));
      $membre = $repository_login_co->findOneBy(array('loginEnt'=>$login_co));
	  $id_co = $membre->getIdEnt();
	  $id_dst = $dst->getIdCand();
	  $type_dst = 'Candidat';

 
	 }

	 $message->setIdEmetteurMes($id_co);
	 $message->setIdDestinataireMes($id_dst);
	 $message->setTypeDestinataireMes($type_dst);
	 $message->setTypeEmetteurMes($type_membre);

			  $em = $this->getDoctrine()->getManager();
			  $em->persist($message);
			  $em->flush();
}

}
			 return $this->render('InsariseMessagingBundle::writeMsg.html.twig', array(
		      'form' => $form->createView()));*/


	
}



// This method serves to make the difference between read and unread messages !!! 
public function set_date_lectureAction(array $listMessages)
{
	$session = new Session();
			if (! $session)
		return $this->render('InsariseBundle:Default:index.html.twig');

	$login_co = $session->get('login');
$type_membre = $session->get('type');
if ($type_membre == 'Candidat')
    {
	$repository_login_co = $this

	  ->getDoctrine()

	  ->getManager()

	  ->getRepository('InsariseMessagingBundle:Candidat');
	  	$membre = $repository_login_co->findOneBy(array('loginCand'=>$login_co));
	  $id_co = $membre->getIdCand();
	}
else
	{
		$repository_login_co = $this

	  ->getDoctrine()

	  ->getManager()

	  ->getRepository('InsariseMessagingBundle:Entreprise');
	  $membre = $repository_login_co->findOneBy(array('loginEnt'=>$login_co));
	  $id_co = $membre->getIdEnt();

	}

	$date_lec = new \DateTime("now");
    $date_lecture=$date_lec->format('Y-m-d');
	foreach ($listMessages as $message) {

    $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
    $q = $qb->update('InsariseMessagingBundle:Message', 'e')
        ->set('e.datelectureMes', $qb->expr()->literal($date_lecture))
        ->where('e.idDestinataireMes = :id_co' )
        ->setParameter('id_co', $id_co)
        ->getQuery();
    $p = $q->execute();
}
return new Response(' ');
}



public function inscription_EtudiantAction(Request $request){

      $etud = new Candidat();
      $etud->setLoginCand($request->get('login'));
      $etud->setPasswordCand($request->get('password'));
      $etud->setNomCand($request->get('last'));
      $etud->setPrenomCand($request->get('first'));
      $etud->setEmailCand($request->get('mail'));
      $etud->setTelephoneCand($request->get('tel'));
      $etud->setAdresseCand($request->get('adress'));
      $etud->setTypeCand('indiv');
        $em = $this->getDoctrine()->getManager();
                $em->persist($etud);
                $em->flush();
      $session = new Session();
      $session->set('login',$request->get('login'));
      $session->set('type','Candidat');
       $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('InsariseBundle:Competence');
            $comp = $repository->findAll();
      return $this->render('InsariseBundle:Default:AddComp.html.twig', array('login'=>$request->get('login'),'alert' => '2','msg' =>'Welcome ! Would you like to add your skills','skills'=>$comp));          
     

  }

  public function inscription_ClubAction(Request $request){

        $etud = new Candidat();
      $etud->setLoginCand($request->get('login'));
      $etud->setPasswordCand($request->get('password'));
      $etud->setNomCand($request->get('last'));
      $etud->setPrenomCand($request->get('first'));
      $etud->setEmailCand($request->get('mail'));
      $etud->setTelephoneCand($request->get('tel'));
      $etud->setAdresseCand($request->get('adress'));
      $etud->setTypeCand('club');
        $em = $this->getDoctrine()->getManager();
                $em->persist($etud);
                $em->flush();
      $session = new Session();
      $session->set('login',$request->get('login'));
      $session->set('type','Candidat');
       $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('InsariseBundle:Competence');
            $comp = $repository->findAll();
 return $this->render('InsariseBundle:Default:AddComp.html.twig', array('login'=>$request->get('login'),'alert' => '2','msg' =>'Welcome ! Your best skills Are :','skills'=>$comp));          

            

}
   
  public function inscription_ChoiceAction(Request $request){

  return $this->render('InsariseMessagingBundle:Default:InscripChoice.html.twig');

   }

  public function inscription_EntrepriseAction(Request $request){

     $etud = new Entreprise();
      $etud->setLoginEnt($request->get('login'));
      $etud->setPasswordEnt($request->get('password'));
      $etud->setNomEnt($request->get('full'));
      $etud->setNomResponsableEnt($request->get('manager'));
      $etud->setEmailEnt($request->get('mail'));
      $etud->setAdresseEnt($request->get('adress'));
      $etud->setDescriptionEnt($request->get('desc'));
        $em = $this->getDoctrine()->getManager();
                $em->persist($etud);
                $em->flush();
      $session = new Session();
      $session->set('login',$request->get('login'));
      $session->set('type','entreprise');
      $em->flush();
      return $this->render('InsariseBundle:Entreprise:welcomeEntr.html.twig', array('alert'=>'2','msg'=>'Welcome !'));  
            
}

public function addCoAction(Request $request)
{
   $session = new Session();
        if (! $session)
        {
          return $this->render('InsariseBundle:Default:index.html.twig');
        }
        else
        {
         $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('InsariseBundle:Candidat');
        $c = $repository->findOneBy(array('loginCand'=>$session->get('login')));
        
        $em = $this->getDoctrine()->getEntityManager();
         $r= $em->getRepository('InsariseBundle:Competence');
      
        foreach ($request->get('comp') as $key ) 
        {
            $com = $r->findOneBy(array('idCom'=>$key));
            $c->addIdComEc($com);
            
            $com->addIdCandEc($c);
           
        }
        $em->flush();
        return $this->render('InsariseBundle:Default:welcome.html.twig',array('alert'=>'2','msg'=>'You can now see projects related to your skills '));
        
      
        }
}

}