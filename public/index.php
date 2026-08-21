<?php
declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";

use App\Router\Router;

try {
  $router = new Router();

  require_once __DIR__ .'/../routes/web.php';

  $router->dispatch();

} catch(Exception $e) {

  exit($e->getMessage());

}
