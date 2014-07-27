<?php

use Joecwallace\Artisan\ArtisanRunner as Runner;

Route::get(Config::get('artisan::handles') . '{uri}', array(
    'before' => Config::get('artisan::filter'),
    function($uri = '') {
        $args = array();

        if ( ! empty($uri)) {
            $args = explode('+', trim($uri, '/'));
        }

        Runner::run($args);
    }
))->where('uri', '^($|\/.*)');
