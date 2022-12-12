<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Technology extends Component
{
    public $title;
    public $description;
    public $cards;
    public $ID;

    public function __construct(){
        $this->title = get_sub_field('title');
        $this->description = get_sub_field('description');
        $this->cards = get_sub_field('cards');
        $this->ID = get_sub_field('id');
    }

    public function render()
    {
        return $this->view('components.technology');
    }
}
