# laravel-mollie

This is a package to integrate [Mollie](https://github.com/mollie/mollie-api-php) with Laravel.
You can use it to easily manage your configuration, and use the Facade to provide shortcuts to the Mollie Client.

## Install

Via Composer

``` bash
$ composer require eboost/laravel-mollie
```

## Installation

Via Composer

    $ composer require eboost/laravel-mollie

After updating composer, add the LaravelMollieServiceProvider to the providers array in config/app.php

    Eboost\Mollie\LaravelMollieServiceProvider::class,

You need to publish the config for this package. A sample configuration is provided. The defaults will be merged with gateway specific configuration.

    $ php artisan vendor:publish

To use the Facade (`\Mollie::getMethods()` instead of `App::make('mollie')->getMethods()`), add that to the facades array.

     'Mollie' => Eboost\Mollie\Facades\Mollie::class,
    

## Examples
``` php
    // List Methods
    $methods = \Mollie::getMethods()->all();

    foreach ($methods as $method)
    {
        echo '<div style="line-height:40px; vertical-align:top">';
        echo '<img src="' . htmlspecialchars($method->image->normal) . '"> ';
        echo htmlspecialchars($method->description);
        echo ' (' .  htmlspecialchars($method->id). ')';
        echo '</div>';
    }
```
    
## Credits

- [Bert van Hoekelen][https://github.com/BertvanHoekelen]
