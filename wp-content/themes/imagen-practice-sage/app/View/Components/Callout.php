<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Callout extends Component
{
    public $title;
    public $description;
    public $buttons;
    public $layout;
    public $align;
    public $icon;
    public $ID;

    public function __construct(){
        $this->icon = get_sub_field('icon');
        $this->title = get_sub_field('title');
        $this->description = get_sub_field('description');
        $this->buttons = get_sub_field('buttons');
        $this->ID = get_sub_field('id');
    }

    public function render()
    {
        return $this->view('components.callout');
    }
}
