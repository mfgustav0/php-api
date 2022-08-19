<?php

namespace App\Kernel;

use App\Kernel\Container\Container;
use App\Kernel\Providers\AppServiceProvider;
use App\Kernel\Routing\Request;
use App\Kernel\Routing\Router;

class App
{
	protected Container $container;
	protected AppServiceProvider $providers;

	public function __construct()
	{
		$this->container = new Container;
		$this->loadProviders();
	}

	private function loadProviders(): void
	{
		$this->providers = new AppServiceProvider;

		$this->providers->boot($this->container);
	}

	public function handle(Request $request): void
	{
		$router = $this->container->make(Router::class);

		$router->dispach($request);
	}
}