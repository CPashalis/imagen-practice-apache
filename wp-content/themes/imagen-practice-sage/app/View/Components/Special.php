<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Special extends Component
{
    public $title;
    public $image;
    public $description;

    public function __construct(){
        $this->title = get_sub_field('title');
        $this->description = get_sub_field('description');
        $this->image = get_sub_field('image');
    }

    public function render()
    {
        return $this->view('components.special');
    }
}
