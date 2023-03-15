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
        return array_merge(config('filament-calendar.config'), $this->fullCalendarConfig);
    }

    public function config($key, $default = null)
    {
        return $this->getConfig()[$key] ?? $default;
    }
     public function getConfigString():string
     {
         return substr(json_encode($this->getConfig(), JSON_PRETTY_PRINT), 0, -1) . ", 
                customButtons: 
                    {filter: 
                        {
                            text: 'Filter',
                            click: function() {
                                    Livewire.emit('openFilterModal')
                                },
                        }
                    }
                } ";
     }
}
