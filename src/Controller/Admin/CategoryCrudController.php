<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    // Configuration des champs de formulaire à afficher
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            DateTimeField::new('dateCreation'),
            DateTimeField::new('dateModification'),
        ];
    }

    //Comportement a suivre lors de la création d'un produit
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Category) return;

        $entityInstance->setDateCreation(new \DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }
    //Comportement a suivre lors de la modif d'un produit

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance):void
    {
        if (!$entityInstance instanceof Category) return;

        $entityInstance->setDateModification(new \DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }
}