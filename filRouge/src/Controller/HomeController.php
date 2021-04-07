<?php


namespace App\Controller;
use App\Entity\SousCat;
use App\Entity\CategorieProduits;
use App\Repository\CategorieProduitsRepository;
use App\Repository\ProduitsRepository;
use App\Repository\SousCatRepository;
use App\Service\Cart\CartService;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/")
* @method render(string $string, array $array)
*/
class HomeController extends AbstractController
{

/**
* @Route("/", name="home")
*/
    public function index(CategorieProduitsRepository $CategorieProduits, CartService $cartService, ProduitsRepository $produitsRepository) :Response
    {
        return $this->render('home/index.html.twig', [
            'CategorieProduits' => $CategorieProduits->findAll(),
            'produits' => $produitsRepository->findAllDESC(),
            // appel de la fonction getTotalQuantity() pour le calcul du nombre total de produit dans le panier
            'total_quantity' => $cartService->getTotalQuantity()
        ]);

    }

}