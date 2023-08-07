<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/Home', name: 'app_product')]
    public function index(  ProductRepository $productRepository,
                            PaginatorInterface $paginator,
                            request $request): Response
    {

        //recuperation des 4 produits suivants
        $fourProduct = $productRepository->findBy([], ['dateCreation' => 'DESC'], 4);
        //recuperation du reste des produits
        $products = $productRepository->findBy([], ['dateCreation' => 'DESC']);
        $products = array_slice($products, 5);
        $products =  $paginator->paginate($products, $request->query->getInt('page', 1), 3);



        return $this->render('Home/index.html.twig', [
            'controller_name' => 'ProductController',
            'fourProduct' =>$fourProduct,
            'products' =>$products

        ]);
    }

   /* #[Route('/Menu', name: 'app_menu')]
    public function redirectToMenu(ProductRepository $productRepository, Request $request): Response
    {
        $fourProduct = $productRepository->findBy([], ['dateCreation' => 'DESC'], 4);
        $products = $productRepository->findBy([], ['dateCreation' => 'DESC']);

        foreach ($products as $product) {
            $description = $product->getDescription();        }

       if ($description === 'discussion') {
                return $this->render('SousMenu/discussion.html.twig', [
                    'controller_name' => 'ProductController',
                    'products' => $products,
                    'fourProduct' => $fourProduct
                ]);
            } elseif ($description === 'jeux') {
                return $this->render('SousMenu/jeux.html.twig', [
                    'controller_name' => 'ProductController',
                    'products' => $products,
                    'fourProduct' => $fourProduct
                ]);
            } elseif ($description === 'cours') {
                return $this->render('SousMenu/cours.html.twig', [
                    'controller_name' => 'ProductController',
                    'products' => $products,
                    'fourProduct' => $fourProduct
                ]);
            } elseif ($description === 'agenda') {
                return $this->render('SousMenu/agenda.html.twig', [
                    'controller_name' => 'ProductController',
                    'products' => $products,
                    'fourProduct' => $fourProduct
                ]);
            }

        return $this->render('Home/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products,
            'fourProduct' => $fourProduct
        ]);
    }*/



    #[Route('/Menu/{description}', name: 'app_menu')]
    public function redirectToMenu(ProductRepository $productRepository, Request $request, string $description): Response
    {
        $fourProduct = $productRepository->findBy([], ['dateCreation' => 'DESC'], 4);
        $products = $productRepository->findBy([], ['dateCreation' => 'DESC']);

        // Votre logique pour trouver l'élément correspondant à la description dans les $products

        if ($description === 'discussion') {
            return $this->render('SousMenu/discussion.html.twig', [
                'controller_name' => 'ProductController',
                'products' => $products,
                'fourProduct' => $fourProduct
            ]);
        } elseif ($description === 'jeux') {
            return $this->render('SousMenu/jeux.html.twig', [
                'controller_name' => 'ProductController',
                'products' => $products,
                'fourProduct' => $fourProduct
            ]);
        } elseif ($description === 'cours') {
            return $this->render('SousMenu/cours.html.twig', [
                'controller_name' => 'ProductController',
                'products' => $products,
                'fourProduct' => $fourProduct
            ]);
        } elseif ($description === 'agenda') {
            return $this->render('SousMenu/agenda.html.twig', [
                'controller_name' => 'ProductController',
                'products' => $products,
                'fourProduct' => $fourProduct
            ]);
        }

        return $this->render('Home/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products,
            'fourProduct' => $fourProduct
        ]);
    }



}
