<?php 

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\User;
use App\Entity\Service;
use App\Entity\Horaire;
use App\Entity\Habitat;
use App\Entity\CompteRendu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Controller\Admin\UserCrudController;
use App\Controller\Admin\AnimalCrudController;
use App\Controller\Admin\ServiceCrudController;
use App\Controller\Admin\HoraireCrudController;
use App\Controller\Admin\HabitatCrudController;
use App\Controller\Admin\CompteRenduCrudController;

class DashboardController extends AbstractDashboardController
{
    private AdminUrlGenerator $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    #[Route('/admin', name: 'admin_dashboard')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(AnimalCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Zoo Arcadia - Administration');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('Animaux', 'fas fa-paw', Animal::class),
            MenuItem::linkToCrud('Habitats', 'fas fa-tree', Habitat::class),
            MenuItem::linkToCrud('Horaires', 'fas fa-clock', Horaire::class),
            MenuItem::linkToCrud('Services', 'fas fa-concierge-bell', Service::class),
            MenuItem::linkToCrud('Comptes Rendus', 'fas fa-notes-medical', CompteRendu::class),
            MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class),
            MenuItem::linkToRoute('Statistiques Animaux', 'fas fa-chart-bar', 'admin_statistiques'),

        ];
    }

    #[Route('/admin/statistiques', name: 'admin_statistiques')]
    public function statistiques(): Response
    {
        return $this->render('admin/statistiques.html.twig');
    }
}
