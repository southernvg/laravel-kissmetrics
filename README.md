# laravel-kissmetrics
Kissmetrics Facade for Laravel 5

## Overview
This package provides wrapper for KISSMetrics PHP client.

For more info, please check:
- https://github.com/kissmetrics/kissmetrics-php

## Compatibility
Package is compatible with Laravel 5.0.*.

## Installation

1. Add `tagvenue/laravel-kissmetrics` to your `composer.json`:

   ```json
    {
        "require": {
            "hydreflab/laravel-mailer": "2.*"
        },
       "repositories": [
             {
                 "type": "git",
                 "url":  "https://github.com/TagVenue/laravel-kissmetrics.git"
             }
         ]
    }
   ```


2. Add `TagVenue\Kissmetrics\KissmetricsServiceProvider::class` to your `config/app.php` file.
3. Publish mailer configuration: `php artisan vendor:publish`. This will create `config/kissmetrics.php` file.
4. Mailer configuration is based on `.env` entries:

   ```json
    KISSMETRICS_API_KEY=YOUR_API_KEY
   ```


## Usage

example usage in Laravel
```php
        /** @var \TagVenue\Kissmetrics\Kissmetrics $kiss */
        $km = Kissmetrics::getInstance();
        $km->identify('user_id'); // ex. john.doe@example.com
        $km->record('Event name')
            ->set(['key' => 'value']); //additional attributes array
        $km->submit();
```