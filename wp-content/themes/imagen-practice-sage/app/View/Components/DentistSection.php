<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class DentistSection extends Component
{
    public $title;
    public $description;
    public $content;
    public $image;
    public $webp;
    public $job;
    public $ID;
    public $reverse;

    public function __construct(
        $reverse = false
    ){
        $this->reverse = $reverse;
        $this->image = get_sub_field('image');
        $this->webp = str_replace("uploads", "uploads-webpc/uploads", $this->image['url']) . ".webp";
        $this->title = get_sub_field('title');
        $this->job = get_sub_field('job_title');
        $this->description = get_sub_field('description');
        $this->content = get_sub_field('modal_content');
        $this->ID = get_sub_field('id');
    }

    public function render()
    {
        return $this->view('components.dentist-section');
    }
}
