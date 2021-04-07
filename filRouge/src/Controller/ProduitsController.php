<?php

namespace App\Controller;

use App\Entity\Fournisseurs;
use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Repository\CategorieProduitsRepository;
use App\Repository\FournisseursRepository;
use App\Repository\ProduitsRepository;
use App\Repository\SousCatRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/produits")
 */
class ProduitsController extends AbstractController
{
    /**
     * @Route("/{id}", name="produits_index", methods={"GET"})
     */
    //Liste des paramètres
    public function index(CategorieProduitsRepository $CategorieProduits ,$id, ProduitsRepository $produitsRepository, PaginatorInterface $paginator, CartService $cartService, Request $request): Response
    {
//        affiche les produits par l'id de sous catégorie

        $produit = $produitsRepository->findBySousCat($id); //récupère les produits par sous catégories

//récupère les produits pour créer les pages
        $produit = $paginator->paginate(
            $produit, /* query NOT result */
            $request->query->getInt('page', 1), /*numéro de page par defaut*/
            6 /*limite d'article par page*/
        );
//rendu
        return $this->render('produits/index.html.twig', [

            'SousCategories' => $produit,
            'CategorieProduits' => $CategorieProduits->findAll(),
            // appel de la fonction getTotalQuantity() pour le calcul du nombre total de produit dans le panier
            'total_quantity' => $cartService->getTotalQuantity()
        ]);
    }

    /**
     * @Route("/new", name="produits_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produit = new Produits();
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('produits_index');
        }

        return $this->render('produits/new.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="produits_show", methods={"GET"})
     */
    public function show(CategorieProduitsRepository $CategorieProduits, CartService $cartService, $id, Produits $produit): Response
    {

// variable FournisseursName récupère l'ID du fournisseur qui récupère elle même et le nom de la société
        $FournisseurName = $produit ->getIdFournisseur($id);
        dump($FournisseurName);
        dump($produit);
        return $this->render('produits/show.html.twig', [
            //Rend produit sur la vue "Show"
            'produit' => $produit,
            'CategorieProduits' => $CategorieProduits->findAll(),
            // appel de la fonction getTotalQuantity() pour le calcul du nombre total de produit dans le panier
            'total_quantity' => $cartService->getTotalQuantity()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produits_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produits $produit): Response
    {
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produits_index');
        }

        return $this->render('produits/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produits_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produits $produit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produits_index');
    }
}
