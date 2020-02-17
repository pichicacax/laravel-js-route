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
     * @param  boolean $jsonOnly
     * @return boolean         
     */
    public function run(string $target, bool $jsonOnly = false)
    {
        $routes = [];

        foreach (Route::getRoutes() as $route) {
            $routes[$route->getName()] = $route->uri();
        }

        $json = json_encode($routes, JSON_PRETTY_PRINT);

        if ($jsonOnly) {
            return $this->file->put($target, $json);
        }

        $template = $this->file->get(__DIR__ . '/routes.js');
        $template = str_replace('\'{ routes }\'', $json, $template);

        return $this->file->put($target, $template);
    }        
}