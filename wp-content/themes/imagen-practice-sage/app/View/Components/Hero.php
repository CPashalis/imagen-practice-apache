<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Hero extends Component
{
    public $title;
    public $sub;
    public $description;
    public $image;
    public $webp;
    public $icon;
    public $videoURL;
    public $buttons;
    public $layout;
    public $align;

    public function __construct(){
        $this->title = get_sub_field('title');
        $this->sub = get_sub_field('sub_title');
        $this->description = get_sub_field('description');
        $this->image = get_sub_field('background_image');
        // use the webp image - requires plugin enabled, currently not working automatically
        $this->webp = str_replace("uploads", "uploads-webpc/uploads", $this->image['url']) . ".webp";
        $this->icon = get_sub_field('icon');
        $this->buttons = get_sub_field('buttons');
        $this->align = get_sub_field('layout');
        if($this->align == "Left") {
            $this->align = "flex-row";
        }
        if($this->align == "Center") {
            $this->align = "justify-center";
        }
        if($this->align == "Right") {
            $this->align = "flex-row-reverse";
        }
        $this->videoURL = '';
    }

    public function render()
    {
        return $this->view('components.hero');
    }
}
