<?php

namespace Insarise\MessagingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InsariseMessagingBundle:Default:index.html.twig');
    }
}
