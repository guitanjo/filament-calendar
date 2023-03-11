<?php

namespace guitanjo\FilamentCalendar\Widgets;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget;
use Illuminate\View\View;
use guitanjo\FilamentCalendar\Widgets\Concerns\CanFetchEvents;
use guitanjo\FilamentCalendar\Widgets\Concerns\CanManageEvents;
use guitanjo\FilamentCalendar\Widgets\Concerns\CanRefreshEvents;
use guitanjo\FilamentCalendar\Widgets\Concerns\FiresEvents;
use guitanjo\FilamentCalendar\Widgets\Concerns\UsesConfig;

class CalendarWidget extends Widget implements HasForms
{
    use InteractsWithForms, CanManageEvents {
        CanManageEvents::getForms insteadof InteractsWithForms;
    }
    use CanRefreshEvents;
    use CanFetchEvents;
    use FiresEvents;
    use UsesConfig;

    // protected static string $view = 'FilamentCalendar::fullcalendar';
    protected static string $view = 'FilamentCalendar::fullcalendar';

    protected int | string | array $columnSpan = 'full';

    public function mount(): void
    {
        $this->setUpForms();
    }

    public function render(): View
    {
        return view(static::$view)
            ->with([
                'events' => $this->getViewData(),
            ]);
    }

    public function getKey(): string
    {
        return $this->key ?? 'default';
    }
}
