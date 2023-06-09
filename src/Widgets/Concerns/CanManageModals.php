<?php

namespace guitanjo\FilamentCalendar\Widgets\Concerns;

trait CanManageModals
{
    protected string $modalLabel = 'Event';

    protected string $modalWidth = 'sm';

    protected function getModalLabel(): string
    {
        return $this->modalLabel;
    }

    protected function getModalWidth(): string
    {
        return $this->modalWidth;
    }

    public function isListeningCancelledEditModal(): bool
    {
        return in_array('cancelledFullcalendarEditEventModal', $this->getEventsBeingListenedFor());
    }

    public function isListeningCancelledCreateModal(): bool
    {
        return in_array('cancelledFullcalendarCreateEventModal', $this->getEventsBeingListenedFor());
    }

     public function isListeningCancelledFilterModal(): bool
     {
         return in_array('cancelledFullcalendarFilterEventModal', $this->getEventsBeingListenedFor());
     }
}
