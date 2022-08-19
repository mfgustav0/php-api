<?php

namespace App\Kernel\Routing;

class Request
{
	private array $request;

	public function __construct()
	{
		$this->request = $_SERVER;
	}

	public function uri(): string
	{
		return $this->request['REQUEST_URI'] ?? '';
	}

	public function method(): string
	{
		return $this->request['REQUEST_METHOD'] ?? 'GET';
	}
}