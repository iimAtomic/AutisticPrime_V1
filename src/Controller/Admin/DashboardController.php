<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Category;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct( private readonly AdminUrlGenerator $adminUrlGenerator)
    {
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //genration d'url vers la page d'administration
        $url = $this->adminUrlGenerator->
        setController(ProductCrudController::class)->generateUrl();

        return $this->redirect($url);

    }
    public function configureDashboard(): Dashboard
    {
        // les infos concernant le dashboard :)
        return Dashboard::new()
            ->setTitle('<h2 class="mt-3 fw-bold text-white text-center">AUTISTIC PRIME</h2>')
            ->renderContentMaximized();
    }

    // les champs à afficher pour permettre d'administrer le site

    public function configureMenuItems(): iterable
    {   yield MenuItem::linkToRoute('Retour au Site' ,'fa fa-reply ' ,'app_product');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Produits');
        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Create Product', 'fas fa-plus-circle', Product::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Product', 'fas fa-eye', Product::class),]);

        yield MenuItem::section('Category');
        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Create Category', 'fas fa-plus-circle', Category::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Category', 'fas fa-eye', Category::class),]);


    }}
