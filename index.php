<?php
declare(strict_types=1);
ini_set('display_errors', '1');
require_once './core/Router.php';
require_once './core/Controller.php';

use HH\Router;


        
$router = Router::fromGlobals();
$router->add('/index.php', function () {
    echo 'Service SYNOPTC ready!';
});

$router->add('/proctype', function () {
   
});

$router->add([
   $router->getRequestPath().'/first'       => 'Controller@actMin',
   $router->getRequestPath().'/second/:any'  => 'Controller@actMin',
]);


// Start route processing
if ($router->isFound()) {
    $router->executeHandler(
        $router->getRequestHandler(),
        $router->getParams()
    );
} 
else {
    // Simple "Not found" handler
    $router->executeHandler(function () {
        http_response_code(404);
        echo '404 Not found';
    });
}








