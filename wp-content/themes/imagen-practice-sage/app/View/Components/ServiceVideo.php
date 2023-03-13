<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class ServiceVideo extends Component
{
    public $title;
    public $description;
    public $serviceVideo;

    public function __construct(){
        $this->title = get_sub_field('title');
        $this->description = get_sub_field('description');
        $this->serviceVideo = get_sub_field('service_video');
    }

    public function render()
    {
        return $this->view('components.service-video');
    }
}
