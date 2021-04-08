<?php

namespace App\Controller;

use App\Entity\Employers;
use App\Form\InfosClientsType;
use App\Repository\CategorieClientsRepository;
use App\Repository\CategorieProduitsRepository;
use App\Repository\EmployersRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="app_profile")
     */
    public function index(CategorieProduitsRepository $CategorieProduits, CartService $cartService): Response
    {
        if (!$this->getUser()->getVerifInfos()){
            return $this->redirectToRoute('app_infos');
        }

        return $this->render('profile/index.html.twig',[
            'CategorieProduits' => $CategorieProduits->findAll(),
            // appel de la fonction getTotalQuantity() pour le calcul du nombre total de produit dans le panier
            'total_quantity' => $cartService->getTotalQuantity()
        ]);
    }

    /**
     * @Route("/profile/infos", name="app_infos")
     */
    public function infos(CategorieProduitsRepository $CategorieProduits ,Request $request ,CartService $cartService,EmployersRepository $employer, CategorieClientsRepository $catClient):Response
    {
        //Variable utilisateur courant
        $user = $this->getUser();
        //Checking if the profile has filled in its information
        if (!$user->getVerifInfos()) {
            $form = $this->createForm(InfosClientsType::class, $user);
            $form->handleRequest($request);

            //check if the form is valid is sent
            if ($form->isSubmitted() && $form->isValid()) {
                if ($form->get('CatClient')->getViewData() === "1"){
                    dd($form->get('CatClient')->getViewData());
                    $user->setEmployer($employer->find(1));
                    $user->setTva(19.6);
                }else{
                    $user->setEmployer($employer->find(2));
                    $user->setTva(5.5);
                }
                //$user->setVerifInfos(true);


                $em = $this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirectToRoute('app_profile');
            }
            return $this->render('profile/infos.html.twig', [
                'user' => $user,
                'form' => $form->createView(),
                'CategorieProduits' => $CategorieProduits->findAll(),
                // appel de la fonction getTotalQuantity() pour le calcul du nombre total de produit dans le panier
                'total_quantity' => $cartService->getTotalQuantity()
            ]);
        }else{
            return $this->redirectToRoute('app_profile');
        }
    }

}
