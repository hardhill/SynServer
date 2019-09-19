<?php
declare(strict_types=1);
ini_set('display_errors', '1');
require_once './core/router.php';
use HH\Router;


        
$router = Router::fromGlobals();
$router->add('/test/synserver/index.php', function () {
    echo 'Hello from Litero!';
});


$router->add([
    '/first'       => 'ExampleController@actMin',
    '/second/:any'  => 'core\controller@actMin',
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








