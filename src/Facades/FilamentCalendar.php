<?php

namespace guitanjo\FilamentCalendar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \guitanjo\FilamentCalendar\FilamentCalendar
 */
class FilamentCalendar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-fullcalendar';
    }
}
