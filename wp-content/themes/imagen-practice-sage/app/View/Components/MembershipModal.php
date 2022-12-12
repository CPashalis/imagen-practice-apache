<?php

// this should be extending Modal
// redundant. be sure to fix and reuse modal component

namespace App\View\Components;

use Roots\Acorn\View\Component;

class MembershipModal extends Component
{

    public function __construct(){
    }

    public function render()
    {
        return $this->view('components.membership-modal');
    }
}
