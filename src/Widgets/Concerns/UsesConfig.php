<?php

namespace guitanjo\FilamentCalendar\Widgets\Concerns;

trait UsesConfig
{
    /**
     * this allows to have calendar specific config on top of global config
     */
    protected array $fullCalendarConfig = [];

    public function getConfig(): array
    {
        return array_merge(config('FilamentCalendar'), $this->fullCalendarConfig);
    }

    public function config($key, $default = null)
    {
        return $this->getConfig()[$key] ?? $default;
    }
}
