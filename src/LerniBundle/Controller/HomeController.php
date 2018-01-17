<?php

namespace LerniBundle\Controller;

use LerniBundle\Entity\Category;
use LerniBundle\Entity\Countries;
use LerniBundle\Entity\Facts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class HomeController extends Controller
{
    /**
     * @Route("/home", name="home_list")
     */
    public function ListeAction()
    {

        $list = $this->getDoctrine()->getRepository(Countries::class)
            ->findAll();
        dump($list[0]);
//        die();
        return $this->render('default/index.html.twig',[
        ]);
    }


    /**
     * @Route("/ajax", name="ajax")
     */
    public function AjaxAction()
    {
        $list = $this->getDoctrine()->getRepository(Countries::class)
            ->findAll();

        $cat = $this->getDoctrine()->getRepository(Category::class)
            ->findAll();

        $fact = $this->getDoctrine()->getRepository(Facts::class)
            ->findAll();

        $tab = [
            "country" => [],
            "cat"     => [],
            "fact"    => []
        ];

        foreach ($list as $listes){
            array_push($tab["country"],
                [
                    "id"    => $listes->getId(),
                    "name"  => $listes->getName(),
                ]
            );
        }

        foreach ($cat as $cate){
            array_push($tab["cat"],
                [
                    "id"   => $cate->getId(),
                    "name" => $cate->getName(),
                    "color" => $cate->getColor()
                ]
            );
        }

        foreach ($fact as $facts){
            array_push($tab["fact"],
                [
                    "id"          => $facts->getId(),
                    "country_id"  => $facts->getCountry(),
                    "description" => $facts->getDescription(),
                    "interest"    => $facts->getInterest()
                ]
            );
        }

        $response = new JsonResponse(json_encode($tab));


        return $response ;
    }
}
