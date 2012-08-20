<?php

namespace AltCloud\Instance3BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ACInst3BlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
