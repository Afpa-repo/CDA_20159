<?php


namespace App\Controller;
use App\Entity\SousCat;
use App\Entity\CategorieProduits;
use App\Repository\CategorieProduitsRepository;
use App\Repository\ProduitsRepository;
use App\Repository\SousCatRepository;
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
//    public $cat;
//    public function __construct(CategorieProduitsRepository $categorieProduits)
//    {
//        $cat = $categorieProduits->findAll();
//    }
    /**
     * @Route("/", name="home")
     */
    public function index(CategorieProduitsRepository $CategorieProduits, ProduitsRepository $produitsRepository) :Response
    {
        return $this->render('home/index.html.twig', [
            'CategorieProduits' => $CategorieProduits->findAll(),
            'produits' => $produitsRepository->findAllDESC()


        ]);

    }

}