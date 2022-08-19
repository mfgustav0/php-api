<?php

namespace App\Kernel\Providers;

use App\Kernel\Container\Container;
use App\Kernel\Environment;
use App\Kernel\Providers\HelperProvider;
use App\Kernel\Providers\RouterProvider;
use App\Kernel\Routing\Router;

class AppServiceProvider
{
	public function boot(Container &$container): void
	{
		$this->loadEnvironment();

		$container->bind(Router::class, RouterProvider::boot());
		
		HelperProvider::boot();
	}

	private function loadEnvironment(): void
	{
		$file = APP_PATH . '/.env';
		if(!file_exists($file)) {
			return;
		}

		$lines = file($file);
		foreach($lines as $line) {
			$lineClear = trim($line);
			if(preg_match('/#/', $lineClear) || $lineClear === '') continue;
			
			putenv($lineClear);
		}
	}
}