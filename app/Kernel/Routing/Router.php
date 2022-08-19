<?php

namespace App\Kernel\Routing;

use App\Kernel\Routing\Exceptions\RouteAlreadyExistsException;
use App\Kernel\Routing\Exceptions\RouteNotFoundException;
use App\Kernel\Routing\Request;
use App\Kernel\Routing\Traits\ActionsRequets;

class Router
{
	use ActionsRequets;

	protected $routes = [];

	public function dispach(Request $request): void
	{
		try {
			$route = $this->getRoute($request->uri(), $request->method());

			$route->handle();
		} catch(RouteNotFoundException $e) {
			echo response()->json([], 404);
		}
	}

	private function add(string $uri, string $method, Route $route): void
	{
		$uri = $route->getUri();
		if(isset($this->routes[$method][$uri])) {
			throw new RouteAlreadyExistsException();
		}

		$this->routes[$method][$uri] = $route;
	}

	private function getRoute(string $uri, string $method): Route
	{
		if(!isset($this->routes[$method][$uri])) {
			throw new RouteNotFoundException();
		}

		return $this->routes[$method][$uri];
	}
}