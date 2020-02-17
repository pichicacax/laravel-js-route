<?php

namespace Pichicacax\LaravelJsRoute;

use Illuminate\Support\Facades\Route;
use Illuminate\Filesystem\Filesystem as File;

class Generator 
{
    protected $file = '';

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * Create JS file for routes json and helper
     * 
     * @param  string $target 
     * @return boolean         
     */
    public function run($target)
    {
        $routes = [];

        foreach (Route::getRoutes() as $route) {
            $routes[$route->getName()] = $route->uri();
        }

        $template = $this->file->get(__DIR__ . '/routes.js');
        $template = str_replace('\'{ routes }\'', json_encode($routes, JSON_PRETTY_PRINT), $template);

        return $this->file->put($target, $template);
    }        
}