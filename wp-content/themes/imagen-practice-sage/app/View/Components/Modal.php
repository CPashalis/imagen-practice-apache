<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Modal extends Component
{
    public $message;
    public $id;
    public $content;

    public function __construct(
        $message = 'test modal',
        $id = "1",
        $content = ''
    ){
        $this->message = $message;
        $this->id = $id;
        $this->content = $content;
    }

    public function render()
    {
        return $this->view('components.modal');
    }
}
