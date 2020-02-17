<?php

namespace Pichicacax\LaravelJsRoute;

use Illuminate\Console\Command as BaseCommand;
use Pichicacax\LaravelJsRoute\Generator as JsRouteGenerator;

use Illuminate\Support\Str;

class Command extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:js {target?} {--j|json : Get the routes as a JSON file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate JSON file and helper for all named routes';

    protected $generator = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(JsRouteGenerator $generator)
    {
        $target = $this->argument('target');

        if (empty($target)) {
            $target = 'resources/assets/js/routes.js';
        }

        $jsonOnly = $this->option('json');

        if ($jsonOnly) {
            $target = Str::replaceLast('.js', '.json', $target);
        }

        if ($generator->run($target, $jsonOnly)) {
            return $this->info("Created: {$target}");
        }

        $this->error("Could not create: {$target}");
    }
}
