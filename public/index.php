<?php

require_once __DIR__ . '\\..\\vendor\\autoload.php';

$app = require_once __DIR__ . '\\..\\bootstrap\\app.php';

$app->handle(
	new App\Kernel\Routing\Request()
);