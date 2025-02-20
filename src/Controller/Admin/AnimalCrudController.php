<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('race'),
            AssociationField::new('enclos'),
            IntegerField::new('vues', 'Nombre de vues')->onlyOnIndex(),
        ];
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Animal) {
            return;
        }

        $entityInstance->incrementVues();
        $entityManager->persist($entityInstance);
        $entityManager->flush();

        parent::updateEntity($entityManager, $entityInstance);
    }
}
