<?php

namespace App\Controller\Admin;

use App\Entity\Soutenance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class SoutenanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Soutenance::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // Champ ID (affiché automatiquement, pas besoin de l'ajouter dans le formulaire)
            IdField::new('id')->onlyOnIndex(), // Show only in index (list view)

            // Utilisation d'IntegerField pour numjury
            IntegerField::new('numjury'),

            // Champ pour la date de soutenance
            DateField::new('date_soutenance')->setFormat('yyyy-MM-dd'),

            // Champ pour la note
            IntegerField::new('note'),

            // Association avec l'enseignant (dans le formulaire)
            AssociationField::new('enseignant')
                ->setLabel('Enseignant')
                ->setFormTypeOption('choice_label', function($enseignant) {
                    return $enseignant->getNom() . ' ' . $enseignant->getPrenom(); // Affiche nom et prénom dans le combo
                }),

            // Association avec l'étudiant (dans le formulaire)
            AssociationField::new('etudiant')
                ->setLabel('Étudiant')
                ->setFormTypeOption('choice_label', function($etudiant) {
                    return $etudiant->getNom() . ' ' . $etudiant->getPrenom(); // Affiche nom et prénom dans le combo
                }),

            // // Affichage des enseignants dans l'index
            // AssociationField::new('enseignant')
            //     ->setLabel('Enseignant')
            //     ->formatValue(function ($value) {
            //         return $value ? $value->getNom() . ' ' . $value->getPrenom() : '';
            //     })
            //     ->onlyOnIndex(), // Affichage uniquement dans l'index (list view)

            // // Affichage des étudiants dans l'index
            // AssociationField::new('etudiant')
            //     ->setLabel('Étudiant')
            //     ->formatValue(function ($value) {
            //         return $value ? $value->getNom() . ' ' . $value->getPrenom() : '';
            //     })
            //     ->onlyOnIndex(), // Affichage uniquement dans l'index (list view)
        ];
    }
}
