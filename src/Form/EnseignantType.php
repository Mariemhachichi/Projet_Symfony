<?php

namespace App\Form;

use App\Entity\Enseignant;
use Doctrine\DBAL\Types\IntegerType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnseignantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('matricule', TextType::class, [
            'label' => 'Matricule',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Entrez le matricule',
            ],
        ])
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Entrez le nom',
            ],
        ])
        ->add('prenom', TextType::class, [
            'label' => 'Prénom',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Entrez le prénom',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Enseignant::class,
        ]);
    }
}
