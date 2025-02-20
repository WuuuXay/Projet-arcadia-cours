<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Enclos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'animal',
            ])
            ->add('race', TextType::class, [
                'label' => 'Race de l\'animal',
            ])
            ->add('etat', ChoiceType::class, [
                'label' => 'État de santé',
                'choices' => [
                    'Bonne santé' => 'Bonne santé',
                    'Malade' => 'Malade',
                    'Blessé' => 'Blessé',
                    'En soin intensif' => 'En soin intensif',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
            ])
            ->add('enclos', EntityType::class, [
                'class' => Enclos::class,
                'choice_label' => 'nom',
                'placeholder' => 'Sélectionner un enclos',
                'label' => 'Enclos',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Mettre à jour',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
