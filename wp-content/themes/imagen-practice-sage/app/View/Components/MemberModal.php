<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class MemberModal extends Component
{
    public $title;
    public $description;
    public $content;
    public $image;
    public $job;

    public function __construct(){

        $this->image = get_sub_field('image');
        $this->title = get_sub_field('title');
        $this->job = get_sub_field('job_title');
        $this->description = get_sub_field('description');
        $this->content = get_sub_field('modal_content');
    }

    public function render()
    {
        return $this->view('components.member-modal');
    }
}
