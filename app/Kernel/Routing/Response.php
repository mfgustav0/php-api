<?php

namespace App\Kernel\Routing;

class Response
{
	protected array $headers = [];
	protected string $content = '';
	protected int $code = 200;

	public function __construct(array $headers=[])
	{
		$this->headers = $headers;
	}

	private function setHeaders(): Response
	{
		foreach($this->headers as $header) {
			header($header);
		}

		return $this;
	}

	public function json(mixed $content, int $code=200): Response
	{
		$this->headers[] = 'Content-Type: application/json; charset=utf-8';
		if($content) {
			$this->content = json_encode($content);
		}
		$this->code = $code;

		return $this;
	}

	public function __toString(): string
	{
		$this->setHeaders();

		http_response_code($this->code);
		return $this->content;
	}
}