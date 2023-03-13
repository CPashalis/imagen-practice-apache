<?php

// this should be extending Modal

namespace App\View\Components;

use Roots\Acorn\View\Component;

class ScheduleModal extends Component
{
    public $formId;

    public function __construct(){
        $this->id = get_field('schedule_form_id', 'option');
    }

    public function render()
    {
        return $this->view('components.schedule-modal');
    }
}
