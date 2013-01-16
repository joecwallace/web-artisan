# Web Artisan - a package for Laravel 4

## Description

This bundle exposes Laravel's Artisan CLI to the web. As such, it probably should not be used in a production environment.

## Installation

Add the following to your app's composer.json:

```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/joecwallace/web-artisan"
        }
    ],
    "require": {
        ...
        "joecwallace/artisan": "dev-master"
    }
}
```

Run ``` php composer.phar update ```

Add ``` 'Joecwallace\Artisan\ArtisanWebServiceProvider', ``` to the ``` 'providers' ``` array in ``` app/config/app.php ```

### Optional configuration

Run ``` php artisan config:publish joecwallace/artisan ```

Edit the ``` 'handles' ``` option. This sets the URI that Web Artisan should respond to, so ``` 'handles' => 'admin' ``` would set the package to respond to ``` http://my.awesome.app/admin ```, ``` http://my.awesome.app/admin/help+migrate ```, etc.

## Usage

1. Take an artisan task: ``` php artisan config:publish joecwallace/artisan ```
1. Replace ``` php artisan ``` with a URL similar to this: ``` http://my.awesome.app/artisan/ ```
1. Replace remaining spaces with ``` + ``` to yield: ```http://my.awesome.app/artisan/config:publish+joecwallace/artisan ```

## Enjoy

I hope someone else finds this useful at some point.

## License

MIT license - [http://www.opensource.org/licenses/mit-license.php](http://www.opensource.org/licenses/mit-license.php)
