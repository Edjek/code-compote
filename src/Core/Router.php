<?php

namespace App\Core;

use App\Controller\Front\HomeController;
use App\Controller\Front\TopicController;

class Router
{
    private array $routes; // Tableau associatif pour stocker les routes et les fonction associés
    private $currentController; // Stock le contrôleur actuel pour l'action demandé

    public function __construct()
    {
        $this->add_route('/code-et-compote/', function () {
            $this->currentController = new HomeController(); // Créé une instance du contrôleur d'accueil
            $this->currentController->showHomePage(); // Appelle la méthode index du contrôleur d'accueil
        });

        $this->add_route('/code-et-compote/topic/{id}', function ($params) {
            $this->currentController = new TopicController(); // Créé une instance du contrôleur d'accueil
            $this->currentController->show($params); // Appelle la méthode showTopic du contrôleur d'accueil avec l'id du topic en paramètre
        });
    }

    private function add_route(string $route, callable $closure): void
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
        // $finalPath = str_replace('/car-location', '', $requestUri); // Supprime le dossier racine pour obtenir le chemin final

        foreach ($this->routes as $key => $closure) {
            if (preg_match($key, $requestUri, $matches)) {
                array_shift($matches);
                $closure($matches); // Appelle la fonction associée à la route avec les éventuels paramètres capturés
                return;
            }
        }
        require_once '../templates/error-404.php';
    }
}
