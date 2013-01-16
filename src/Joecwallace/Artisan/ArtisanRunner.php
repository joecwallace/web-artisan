<?php namespace Joecwallace\Artisan;

use Illuminate\Console\Application;
use Illuminate\Support\Facades\Config;

class ArtisanRunner
{
    public static function run(array $args = array())
    {
        array_unshift($args, 'artisan');

        $app = app();
        $providers = $app->getLoadedProviders();

        foreach (Config::get('app.providers') as $provider)
        {
            if ( ! isset($providers[$provider]))
            {
                $app->register(new $provider($app));
            }
        }

        $_SERVER['argv'] = $args;
        $output = new HtmlOutput;

        Application::start($app)->run(null, $output);
    }
}