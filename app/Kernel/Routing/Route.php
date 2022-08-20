<?php

namespace App\Kernel\Routing;

use App\Kernel\Routing\Exceptions\ClassControllerNotExists;
use App\Kernel\Routing\Exceptions\MethodClassControllerNotExists;
use App\Kernel\Routing\Traits\ExecuteRoute;

class Route
{
	use ExecuteRoute;

	public function __construct(
		private string $class,
		private string $method, 
		private string $uri, 
		private ?string $name=null
	) {	}

	public function getClass(): mixed
	{
		if(!method_exists($this->class, $this->method)) {
			return $this->exectuce($this->class, '__construct');
		}

		return new $this->class;
	}

	public function getUri(): string
	{
		return $this->uri;
	}

	public function handle(): void
	{
		if(!class_exists($this->class)) {
			throw new ClassControllerNotExists();
		}

		$class = $this->getClass();
		if(!method_exists($class, $this->method)) {
			throw new MethodClassControllerNotExists();
		}

		$this->exectuce($class, $this->method);
	}
}