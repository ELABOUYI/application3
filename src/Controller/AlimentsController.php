<?php

namespace App\Controller;

use App\Entity\Aliments;
use App\Repository\AlimentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlimentsController extends AbstractController
{
    /**
     * @Route("/", name="aliments")
     */
    public function index(AlimentsRepository $repository): Response
    {
        $aliments = $repository->findAll();
        return $this->render('aliments/index.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide'=> false
        ]);
    }
    /**
     * @Route("/aliments/calorie/{calorie}", name="alimentsParCalorie")
     */
    public function alimentsMoinsCaloriques(AlimentsRepository $repository,$calorie)
    {
        $aliments = $repository->getAlimentParPropriete('calorie','<',$calorie);
        return $this->render('aliments/index.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => true,
            'isGlucide' => false
        ]);
    }

    /**
     * @Route("/aliments/glucide/{glucide}", name="alimentsParGlucides")
     */
    public function alimentsAvecMoinsGlucides(AlimentsRepository $repository,$glucide)
    {
        $aliments = $repository->getAlimentParPropriete('glucide','<',$glucide);
        return $this->render('aliments/index.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide' => true
        ]);
    }
}
