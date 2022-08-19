<?php

namespace App\Kernel\Routing\Traits;

use App\Kernel\Routing\Route;

trait ActionsRequets
{
	public function get(string $uri, string $class, string $method, ?string $name=null): void
	{
		$route = new Route(
			uri:$uri,
			name:$name,
			method:$method,
			class:$class
		);

		$this->add($uri, 'GET', $route);
	}

	public function post(string $uri, string $class, string $method, ?string $name=null): void
	{
		$route = new Route(
			uri:$uri,
			name:$name,
			method:$method,
			class:$class
		);

		$this->add($uri, 'POST', $route);
	}
}