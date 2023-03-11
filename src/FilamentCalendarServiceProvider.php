<?php

namespace guitanjo\FilamentCalendar;

use Filament\PluginServiceProvider;
use guitanjo\FilamentCalendar\Commands\UpgradeFilamentCalendarCommand;
use Spatie\LaravelPackageTools\Package;

class FilamentCalendarServiceProvider extends PluginServiceProvider
{
    public static string $name = 'FilamentCalendar';



    protected array $beforeCoreScripts = [
        'filament-fullcalendar-scripts' => __DIR__ . '/../dist/filament-fullcalendar.js',
    ];

    protected array $styles = [
        'filament-fullcalendar-styles' => __DIR__ . '/../dist/filament-fullcalendar.css',
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name(self::$name)
            ->hasConfigFile()
            ->hasViews(self::$name)
            ->hasCommand(UpgradeFilamentCalendarCommand::class);
    }
}
