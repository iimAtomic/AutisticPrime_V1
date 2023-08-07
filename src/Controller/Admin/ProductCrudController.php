<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    // Configuration des champs de formulaire à afficher
    public function configureFields(string $pageName): iteRABLE
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')->setLabel(''),
            MoneyField::new('price')->setCurrency('EUR'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(), // Champ de fichier d'image pour l'upload avec VichUploader
            ImageField::new('image')->setBasePath('/images/products')->onlyOnIndex(),
            TextField::new('description'),
            DateTimeField::new('dateCreation'),
            DateTimeField::new('dateModification'),
            AssociationField::new('category'), // Champ d'association à une catégorie
        ];
    }

   //Comportement a suivre lors de la création d'un produit
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Product) return;

        $entityInstance->setDateCreation(new \DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }

    //  lors de la modification d'un produit
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance):void
    {
        if (!$entityInstance instanceof Product) return;

        $entityInstance->setDateModification(new \DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }
}
