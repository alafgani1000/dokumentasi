<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Facade;

class ToolFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tool';
    }
}
