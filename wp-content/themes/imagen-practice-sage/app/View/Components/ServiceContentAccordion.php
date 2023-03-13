<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class ServiceContentAccordion extends Component
{
    public $title;
    public $content;
    public $i;
    
    public function __construct(
        $i = 0
    ){
        $this->title = get_sub_field('title');
        $this->content = get_sub_field('content');
        $this->i = $i;
    }

    public function render()
    {
        return $this->view('components.service-content-accordion');
    }
}
