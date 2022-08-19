<?php

namespace App\Kernel\Routing;

use App\Kernel\Routing\Exceptions\ClassControllerNotExists;
use App\Kernel\Routing\Exceptions\MethodClassControllerNotExists;

class Route
{
	public function __construct(
		private string $class,
		private string $method, 
		private string $uri, 
		private ?string $name=null
	) {	}

	public function handle()
	{
		if(!class_exists($this->class)) {
			throw new ClassControllerNotExists();
		}

		$class = new $this->class();
		if(!method_exists($class, $this->method)) {
			throw new MethodClassControllerNotExists();
		}

		$class->{$this->method}();
	}

	public function getUri(): string
	{
		return $this->uri;
	}
}