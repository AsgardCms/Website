<?php
use Illuminate\Routing\Router;

/** @var Router $router */

$router->get('docs', ['as' => 'doc.index', 'uses' => 'Frontend\DocumentationController@index']);

if (file_exists(storage_path() . "/routes/documentation_routes.php")) {
    include storage_path() . "/routes/documentation_routes.php";
}

//$router->get('docs/{page}', ['as' => 'doc.show', 'uses' => 'Frontend\DocumentationController@show'])->where('page', '.*');

$router->post('update/docs', [
    'uses' => 'Frontend\DocumentationController@update',
]);
