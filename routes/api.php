<?php

use App\Http\Controllers\Teste;
use App\Kernel\Routing\Router;

$router = new Router();

$router->get('/chamados', Teste::class, 'index');

return $router;