<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProductionBundle:Default:index.html.twig', array('name' => $name));
    }
}
