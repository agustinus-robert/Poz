<?php

namespace Poz\Facades;

use Illuminate\Support\Facades\Facade;

class Poz extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'poz';
    }
}
