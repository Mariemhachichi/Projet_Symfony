<?php

namespace App\Controller\Admin;

use App\Entity\Enseignant;
use App\Entity\Etudiant;
use App\Entity\Soutenance;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ProjetSymfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        
        // Ajoutez des liens vers vos entités
        yield MenuItem::linkToCrud('Enseignants', 'fas fa-chalkboard-teacher', Enseignant::class);
        yield MenuItem::linkToCrud('Étudiants', 'fas fa-user-graduate', Etudiant::class);
        yield MenuItem::linkToCrud('Soutenances', 'fas fa-calendar-check', Soutenance::class);
    }
}
