<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }
    #[Route('/', name: 'default')]
    public function index(ProductRepository $pr): Response
    {
        $products = $this->productRepository->findAll();

        return $this->render('default/index.html.twig', [
            'products' => $products
        ]);

    }

/*    #[Route('/page/{currentPage}/{nbResult}', name: 'page')]
    public function pagination(ProductRepository $pr, $currentPage, $nbResult): Response
    {
        $nbProduct = $pr->count([]);
        //nb de page pleine
        $nbPage = $nbProduct/$nbResult;

        //si il y a un modulo
        if($nbPage%$nbResult != 0) {
            $nbPage = (int)($nbProduct/$nbResult) +1;
        }
        $products = $this->productRepository->findByPagination($currentPage, $nbResult);

        return $this->render('default/pagination.html.twig', [
            'products' => $products,
            'nbPage' => $nbPage,
            'currentPage' => $currentPage,
            'nbResult' => $nbResult
        ]);
    }*/

    #[Route('/detail/{id}', name: "detail")]
    public function getOne(Product $product){
        return $this->render('default/product.html.twig', [
            'product' => $product
        ]);
    }

    #[Route('/boutique', name: "boutique")]
    public function boutique(ProductRepository $pr): Response
    {
        $products = $this->productRepository->findAll();

        return $this->render('default/boutique.html.twig', [
            'products' => $products
        ]);

    }
    #[Route('/prestations', name: "prestations")]
    public function prestations(): Response{

        return $this->render('default/prestations.html.twig');

    }


}
