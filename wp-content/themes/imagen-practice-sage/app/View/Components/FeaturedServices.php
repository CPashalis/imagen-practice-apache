<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class FeaturedServices extends Component
{
    public $title;
    public $description;
    public $services;

    public function __construct(){
        $this->title = get_sub_field('title');
        $this->description = get_sub_field('description');
        $this->services = get_sub_field('services');
    }

    public function render()
    {
        return $this->view('components.featured-services');
    }
}
