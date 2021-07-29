<?php

namespace App\Controller\Admin;

use App\Entity\Aliments;
use App\Form\AlimentsType;
use App\Repository\AlimentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/aliment", name="admin_aliment")
     */
    public function index(AlimentsRepository $repository): Response
    {
        $aliments=$repository->findAll();
        return $this->render('admin/admin_aliment/adminAliment.html.twig',[
            "aliments"=>$aliments
        ]);
    }
    /**
     * @Route("/admin/aliment/creation", name="admin_aliment_creation")
     * @Route("/admin/aliment/{id}", name="admin_aliment_modification",methods="GET|POST")
     */
    public function modifierAjoutter(Aliments $aliment = null, Request $request, EntityManagerInterface $manager): Response
    {
        $isCreated=false;
        $isModified =true;
        if(!$aliment)
        {
            $aliment = new Aliments();
            $isCreated=true;
            $isModified=false;
        }
        

        $form = $this->createForm(AlimentsType::class,$aliment);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($aliment);
            $manager->flush();
            return $this->redirectToRoute("admin_aliment");
        }
        return $this->render('admin/admin_aliment/modifEtAjoutAliment.html.twig',[
            "aliment" => $aliment,
            "form" => $form->createView(),
            "isCreated"=>$isCreated,
            "isModified"=>$isModified
        ]);
    }
    /**
     * 
     * @Route("/admin/aliment/{id}", name="admin_aliment_suppression", methods="SUP")
     */
    public function Supprimer(Aliments $aliment, Request $request, EntityManagerInterface $manager): Response
    {
        if($this->isCsrfTokenValid("SUP".$aliment->getId(),$request->get('_token')))
        {
            $manager->remove($aliment);
            $manager->flush();
            return $this->redirectToRoute("admin_aliment");
        }
        
    }
}
