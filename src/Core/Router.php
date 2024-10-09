<?php

namespace App\Core;

use App\Controller\Front\ContactController;
use App\Controller\Front\HomeController;
use App\Controller\Front\UserController;
class Router
{
    private array $routes; // Tableau associatif pour stocker les routes et les fonction associés
    private $currentController; // Stock le contrôleur actuel pour l'action demandé

    public function __construct()
    {
        $this->addRoutes('/', function (): void {
            $this->currentController = new HomeController();
            $this->currentController->show();
        });

        $this->addRoutes('/contactez-nous', function (): void {
            $this->currentController = new ContactController();
            $this->currentController->show();
        });

        $this->addRoutes('/inscription', function (): void {
            $this->currentController = new UserController();
            $this->currentController->showSignUpForm();
        });

        $this->addRoutes('/processSignUpForm', function (): void {
            $this->currentController = new UserController();
            $this->currentController->processSignUpForm();
        });

        $this->addRoutes('/connexion', function (): void {
            $this->currentController = new UserController();
            $this->currentController->showSignInForm();
        });

        $this->addRoutes('/processSignInForm', function (): void {
            $this->currentController = new UserController();
            $this->currentController->processSignInForm();
        });

        $this->addRoutes('/deconnexion', function (): void {
            $this->currentController = new UserController();
            $this->currentController->logout();
        });
    }

    private function addRoutes(string $route, callable $closure): void
    {
        // Convertit la route en une expression régulière pour une correspondance flexible en url et paramètre
        $pattern = str_replace('/', '\/', $route); // Échappe les barres obliques pour la regex
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)',  $pattern); // Remplace les parties entre accolade par des groupes de capture (conserve les paramètres)
        $pattern = '/^' . $pattern . '$/'; // Ajoute les délimiteurs de début et de fin de la regex
        $this->routes[$pattern] = $closure; // Stock la regex de la route et la fonction associée dans le tableau des routes
    }

    public function execute(): void
    {
        $requestUri = $_SERVER['REQUEST_URI']; // Récupère l'URL de la requête
        $finalPath = str_replace('/code-et-compote2', '', $requestUri); // Supprime le dossier racine pour obtenir le chemin final

        foreach ($this->routes as $key => $closure) {
            if (preg_match($key, $finalPath, $matches)) {
                array_shift($matches);
                $closure($matches); // Appelle la fonction associée à la route avec les éventuels paramètres capturés
                return;
            }
        }

        header("HTTP/1.1 404 Not Found");
        require_once '../templates/error-404.php';
    }
}
