<?php

namespace App\Controller;

use App\Entity\Employers;
use App\Form\InfosClientsType;
use App\Repository\CategorieProduitsRepository;
use App\Repository\EmployersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="app_profile")
     */
    public function index(CategorieProduitsRepository $CategorieProduits): Response
    {
        if (!$this->getUser()->getVerifInfos()){
            return $this->redirectToRoute('app_infos');
        }
        //$this->getUser()->getEmployer()->getPrenomEmp();
        //$user = $this->getUser();

        return $this->render('profile/index.html.twig',[
            'CategorieProduits' => $CategorieProduits->findAll(),
        ]);
    }

    /**
     * @Route("/profile/infos", name="app_infos")
     */
    public function infos(CategorieProduitsRepository $CategorieProduits ,Request $request ,EmployersRepository $emp):Response
    {
        //Variable utilisateur courant
        $user = $this->getUser();
        //Checking if the profile has filled in its information
        if (!$user->getVerifInfos()) {
            $form = $this->createForm(InfosClientsType::class, $user);
            $form->handleRequest($request);

            //check if the form is valid is sent
            if ($form->isSubmitted() && $form->isValid()) {
                //$employers = new Employers();
                $id = $emp->find(1);
                //$user->setVerifInfos(true);
                //$user->setNom('Alexandre');
                $user->setEmployer($id);


                $em = $this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirectToRoute('app_profile');
            }
            return $this->render('profile/infos.html.twig', [
                'user' => $user,
                'form' => $form->createView(),
                'CategorieProduits' => $CategorieProduits->findAll(),
            ]);
        }else{
            return $this->redirectToRoute('app_profile');
        }
    }

}
