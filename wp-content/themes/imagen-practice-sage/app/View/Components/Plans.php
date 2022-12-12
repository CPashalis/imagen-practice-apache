<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Plans extends Component
{
    public $title;
    public $description;
    public $ID;
    public $plans;
    public $choices;

    public function __construct(){
        $this->title = get_sub_field('title');
        $this->description = get_sub_field('description');
        $this->ID = get_sub_field('id');
        $this->plans = get_sub_field('plans');

        while( have_rows('plans')) {
            $this->choices = get_sub_field_object('benefits')['choices'];
            return;
        }
    }

    public function render()
    {
        return $this->view('components.plans');
    }
}
