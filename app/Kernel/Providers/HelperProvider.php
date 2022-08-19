<?php

namespace App\Kernel\Providers;

class HelperProvider
{
	public static function boot(): void
	{
		$files = glob(__DIR__ . '\\..\\Helpers\\*');

		foreach($files as $file) {
			include_once $file;
		}
	}
}