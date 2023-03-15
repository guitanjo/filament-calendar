<x-filament::form wire:submit.prevent="onFilterEventSubmit">
    <x-filament::modal id="fullcalendar--filter-event-modal" :width="$this->getModalWidth()">
        <x-slot name="header">
            <x-filament::modal.heading>
                {{ $this->getFilterEventModalTitle() }}
            </x-filament::modal.heading>
        </x-slot>

        @if ($this->isListeningCancelledFilterModal())
            <div
                x-on:close-modal.window="if ($event.detail.id === 'fullcalendar--create-event-modal') Livewire.emit('cancelledFullcalendarFilterEventModal')">
            </div>
        @endif

        {{ $this->filterEventForm }}

        <x-slot name="footer">
            @if (!$this->filterEventForm->isDisabled())
                <x-filament::button type="submit" form="onFilterEventSubmit">
                    Auswählen
                </x-filament::button>
            @endif

            @if ($this->isListeningCancelledFilterModal())
                <x-filament::button color="secondary"
                    x-on:click="isOpen = false; Livewire.emit('cancelledFullcalendarFilterEventModal')">
                    {{ $this->getEditEventModalCloseButtonLabel() }}
                </x-filament::button>
            @else
                <x-filament::button color="secondary" x-on:click="isOpen = false">
                    {{ $this->getEditEventModalCloseButtonLabel() }}
                </x-filament::button>
            @endif
        </x-slot>
    </x-filament::modal>
</x-filament::form>
