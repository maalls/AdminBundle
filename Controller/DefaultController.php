<?php

namespace Maalls\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MaallsAdminBundle:Default:index.html.twig');
    }
}
