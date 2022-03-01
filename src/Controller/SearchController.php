<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    #[Route('/search/{currentPage}/{nbResult}', name: 'search')]
    public function index(ProductRepository $pr, $currentPage, $nbResult, Request $request): Response
    {

        $searchFilters = $request->getSession();
        $searchFilters->set('filters', []);
        dump($searchFilters->all());

        $nbProduct = $pr->count([]);
        //nb de page pleine
        $nbPage = $nbProduct/$nbResult;

        //si il y a un modulo
        if($nbPage%$nbResult != 0) {
            $nbPage = (int)($nbProduct/$nbResult) +1;
        }
        $products = $this->productRepository->search($searchFilters->get('filters'), $currentPage, $nbResult);
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $filters = $form->getData();
            $products = $pr->search($searchFilters->get('filters'), $currentPage, $nbResult);

            }

        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'products' => $products,
            'nbPage' => $nbPage,
            'currentPage' => $currentPage,
            'nbResult' => $nbResult
        ]);
    }

/*    #[Route('/search/page', name: 'page')]
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
}
