<?php

namespace App\Kernel\Providers;

use App\Kernel\Routing\Router;

class RouterProvider
{
	public static function boot(): Router
	{
		$router = require_once APP_PATH . '\\routes\\api.php';

		return $router;
	}
}