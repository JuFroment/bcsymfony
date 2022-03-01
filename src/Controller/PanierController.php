<?php

namespace App\Controller;

use App\Entity\ProductOrder;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier', name: 'panier_')]
class PanierController extends AbstractController
{
    #[Route('/{id}', name: 'add', requirements: ['id'=>'\d+'])]
    public function addToCart(Product $product, Request $request){
        // je créé un nouvel object product order
        // associe 1 produit à sa quantité
        $productOrder = new ProductOrder();
        $productOrder->setProduct($product);
        $productOrder->setQuantity(1);

        //je récupère ma session depuis l'object request
        $session = $request->getSession();

        //je créé un tableau vide qui représente le panier
        $cart = [];
        //si le panier existe déjà je le récupère
        if($session->has("cart")){
            $cart = $session->get('cart');
        }
        $exists = false;
        //vérifier si on a déjà le produit
        foreach($cart as $productOrderItem){
            if($productOrderItem->getProduct() == $product){
                $exists = true;
                $productOrderItem->setQuantity($productOrderItem->getQuantity() + 1);
            }
        }
        if(!$exists){
            $cart[] = $productOrder;
        }
        //si c'est le cas, ++
        //j'ajoute l'élément dans mon tableau

        //je mets à jour la session avec le nouveau panier
        $session->set("cart", $cart);

        //redirection sur la page panier
        return $this->redirectToRoute('panier_display');
    }
    #[Route('/remove-product/{id}', name: "remove_product")]
    public function removeProduct(Product $product, Request $request){
        $session = $request->getSession();
        $cart = $session->get('cart');

        $delete = null;
        foreach($cart as $key=>$productOrder){
            if($product = $productOrder->getProduct()){
                $delete = $key;
            }
        }

        unset($cart[$delete]);

        $session->set('cart', $cart);

        return $this->redirectToRoute('panier_display');
    }

    #[Route('/{operator}/{id}', name: 'addRemoveOne'  )]
    public function addOneToCart(Product $product, Request $request, $operator){

        $session = $request->getSession();
        $cart = $session->get('cart');

        foreach ($cart as $po){
            if($po->getProduct() == $product){
                if($operator == 'plus'){
                    $po->setQuantity($po->getQuantity() +1);
                } elseif ($operator == 'minus'){
                    $po->setQuantity($po->getQuantity() -1);
                }
            }
        }

        $session->set('cart', $cart);

        return $this->redirectToRoute('panier_display');

    }


    #[Route('/', name: 'display')]
    public function index(Request $request): Response
    {
        //récup la session
        $cart = $request->getSession()->get('cart');

        //calculer prix total
        $price = 0;
        foreach($cart as $po){
            $price += $po->getProduct()->getPrice() * $po->getQuantity();
        }
        //afficher le panier

        return $this->render('panier/index.html.twig', [
            'cart' => $cart,
            'price' => $price
        ]);
    }
}
