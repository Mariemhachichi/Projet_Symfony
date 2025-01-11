<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\Soutenance;


use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nce', IntegerType::class, [
            'label' => 'Numéro d\'inscription',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Entrez le numéro d\'inscription',
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
        ])
        ->add('soutenance', EntityType::class, [
            'class' => Soutenance::class,
            'choice_label' => 'id', 
            'label' => 'Soutenance', 
            'attr' => [
                'class' => 'form-control',
            ],
        ]);
    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
