<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WorkshopintegrationController extends AbstractController
{
    #[Route('/workshopintegration', name: 'app_workshopintegration')]
    public function index(): Response
    {
        return $this->render('workshopintegration/index.html.twig', [
            'controller_name' => 'WorkshopintegrationController',
        ]);
    }
    #[Route('/integration', name: 'integration')]
    public function integration(): Response
    {
        return $this->render('workshopintegration/3A25.html.twig', [
            'controller_name' => 'WorkshopintegrationController',
        ]);
    }

    #[Route('/addst', name: 'addst')]
    public function addSt(Request $req,ManagerRegistry $mr): Response
    {
$student=new Student();
$form=$this->createForm(StType::class,$student);
$form->handleRequest($req);
if($form->isSubmitted()&& $form->isValid()){
$em=$mr->getManager();
$em->persist($student);
$em->flush();
}
        return $this->render('workshopintegration/addst.html.twig', [
            'f' => $form->createView(),
        ]);
    }
}
