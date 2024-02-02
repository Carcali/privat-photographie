<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //yield IdField::new('id'),
            yield TextField::new('name'),
            yield TextEditorField::new('description'),
            yield AssociationField::new('category')->autocomplete(),
            yield AssociationField::new('etiquette')->autocomplete(),
            yield ImageField::new('photo1')->setUploadDir('assets/images/'),
            yield ImageField::new('photo2')->setUploadDir('assets/images/'),
            yield ImageField::new('photo3')->setUploadDir('assets/images/'),
        ];
    }
}
