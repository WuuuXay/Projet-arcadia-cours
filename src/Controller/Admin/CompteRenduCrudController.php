<?php

namespace App\Controller\Admin;

use App\Entity\CompteRendu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompteRenduCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CompteRendu::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('contenu'), // Remplace par tes champs réels
        ];
    }
}
