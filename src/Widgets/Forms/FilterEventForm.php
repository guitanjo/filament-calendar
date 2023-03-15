<?php

namespace guitanjo\FilamentCalendar\Widgets\Forms;

use Filament\Forms;

trait FilterEventForm
{
    public $filterEventFormState = [];

    public function onFilterEventSubmit(): void
    {
        $this->filterEvent($this->filterEventForm->getState());

        $this->dispatchBrowserEvent('close-modal', ['id' => 'fullcalendar--filter-event-modal']);
    }

    public function filterEvent(array $data): void
    {
        // Override this function and do whatever you want with $data
    }

    protected static function getFilterEventFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->required(),
            Forms\Components\DateTimePicker::make('start')
                ->required(),
            Forms\Components\DateTimePicker::make('end')
                ->default(null),
        ];
    }

    protected function getFilterEventForm(): array
    {
        return [
            'filterEventForm' => $this->makeForm()
                ->schema(static::getFilterEventFormSchema())
                ->statePath('filterEventFormState'),
        ];
    }

    public function getFilterEventModalTitle(): string
    {
        return $this->filterEventForm->isDisabled()
            ? __('filament::resources/pages/view-record.title', ['label' => $this->getModalLabel()])
            : __('filament::resources/pages/filter-record.title', ['label' => $this->getModalLabel()]);
    }

    public function getFilterEventModalSubmitButtonLabel(): string
    {
        return __('filament::resources/pages/filter-record.form.actions.save.label');
    }

    public function getFilterEventModalCloseButtonLabel(): string
    {
        return $this->filterEventForm->isDisabled()
            ? __('filament-support::actions/view.single.modal.actions.close.label')
            : __('filament::resources/pages/filter-record.form.actions.cancel.label');
    }
}
