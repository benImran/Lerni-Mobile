<?php

namespace LerniBundle\Controller;

use LerniBundle\Entity\Countries;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="home_list")
     */
    public function ListeAction()
    {
        $list = $this->getDoctrine()->getRepository(Countries::class)
            ->findAll();

        return $this->render('default/index.html.twig',[
            "list" => $list
        ]);
    }
}
