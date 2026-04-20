<?php

namespace App\router;

require dirname(__DIR__) . '/config/routes.php';

class Router
{

	private $routes;
	private $available_paths;
	private $requested_path;

	public function __construct()
	{
		//récupération des routes déclaré dans /config/routes.php.
		$this->routes = ROUTES;

		//récup des clefs de la constante ROUTES (tableau).
		$this->available_paths = array_keys($this->routes);

		//récup de la valeur du paramètre $_GET['route'], ou '/accueil' si le paramètre n'existe pas.
		$this->requested_path = isset($_GET['path']) ? $_GET['path'] : 'accueil';

		//appel de la methode d'analyse des routes
		$this->parse_routes();
	}

	private function parse_routes(): void
	{
		$exploded_requested_path = $this->explode_path($this->requested_path);
		$params = [];

		foreach ($this->available_paths as $candidate_path) {

			$found_match = true;
			$exploded_candidate_path = $this->explode_path($candidate_path);

			if (count($exploded_candidate_path) == count($exploded_requested_path)) {
				foreach ($exploded_requested_path as $key => $requested_path_part) {
					$candidate_path_part = $exploded_candidate_path[$key];

					if ($this->isParam($candidate_path_part)) {
						$params[substr($candidate_path_part, 1, -1)] = $requested_path_part;
					} else if ($candidate_path_part !== $requested_path_part) {
						$found_match = false;
						break;
					}
				}

				if ($found_match) {
					$route = $this->routes[$candidate_path];
					break;
				}
			}
		}

		if (isset($route)) {
			$controller = new $route['controller'];

			if (method_exists($controller, 'setBreadcrumb')) {
				$controller->setBreadcrumb($route['breadcrumb'] ?? []);
			}
			
			$controller->{$route['method']}(...$params);
		}
	}

	//fonction de transformation de la variable $path en tableau( /truc/machin => [truc, machin])
	private function explode_path(string $path): array
	{
		//rtrim: supprime le caractere /(en 2eme parametre) en fin de chaine
		//ltrim: supprime le caractere /(en 2eme parametre) en debut de chaine
		return explode("/", rtrim(ltrim($path, '/'), '/'));
	}

	//retourne true si $candidate_path_part contient '{' et '}'
	private function isParam(string $candidate_path_part): bool
	{
		return str_contains($candidate_path_part, '{') && str_contains($candidate_path_part, '}');
	}
}
