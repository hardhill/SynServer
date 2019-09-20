<?php
declare(strict_types=1);
ini_set('display_errors', '1');
require_once './Router.php';






        
$router = Router::fromGlobals();

//$router->add('/index.php', function () {
//    echo 'Service SYNOPTIC ready!';
//});


$router->add([
   $router->getRequestPath().'/first'       => 'Controller@actMin',
   $router->getRequestPath().'/second/:any'  => 'Controller@actMax',
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








