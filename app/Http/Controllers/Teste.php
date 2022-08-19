<?php

namespace App\Http\Controllers;

class Teste
{
	public function index(): void
	{
		$branches = [
			[
				'id' => 'yu-sdds-2390-scd',
				'name' => '1235'
			],
			[
				'id' => 'yu-weds-2ssd-pof',
				'name' => '1234'
			]
		];

		echo response()->json(compact('branches'), 200);
	}
}