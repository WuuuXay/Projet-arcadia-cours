<?php

namespace App\Controller\Admin;

use App\Entity\Horaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Fields\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class HoraireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaire::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInPlural('Horaires')
                    ->setEntityLabelInSingular('Horaire');
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('jour', 'Jour'),

            TimeField::new('heureOuverture', 'Heure d\'ouverture')
                ->setRequired(false),
                
            TimeField::new('heureFermeture', 'Heure de fermeture')
                ->setRequired(false),
        ];
    }
}



