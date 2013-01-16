<?php

use Joecwallace\Artisan\ArtisanRunner as Runner;
use Joecwallace\Artisan\HtmlOutput;

Route::get(Config::get('artisan::handles').'{uri}', function($uri = '')
{
    $args = array();

    if ( ! empty($uri)) {
        $args = explode('+', trim($uri, '/'));
    }

    Runner::run($args);
})->where('uri', '^($|\/.*)');