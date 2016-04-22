<?php
namespace TagVenue\Kissmetrics\Facades;
use Illuminate\Support\Facades\Facade;

class Kissmetrics extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'kissmetrics';
    }
}