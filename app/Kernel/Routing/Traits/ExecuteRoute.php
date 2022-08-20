<?php

namespace App\Kernel\Routing\Traits;

trait ExecuteRoute
{
	private function exectuce(mixed $class, string $method): mixed
	{
		$reflection = new \ReflectionMethod($class, $method);

		$params = $this->getParameters($reflection->getParameters());

		return call_user_func_array([$class, $method], $params);
	}

	private function getParameters(mixed $parameters): mixed
	{
		return array_map(function($param) {
			$name = $param->getType()->getName();

			if(class_exists($name)) {
				if(method_exists($name, '__construct')) {
					return $this->exectuce($name, '__construct');
				}
				return new $name;
			}

			return $name;
		}, $parameters);
	}
}