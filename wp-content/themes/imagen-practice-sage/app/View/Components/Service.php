<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Service extends Component
{
    public $title;
    public $description;
    public $imageURL;
    public $webp;
    public $span;
    public $postID;
    public $post;
    public $invert;
    public $link;

    public function __construct(
        $span = 1,
        $postID = '',
        $invert = false
    ){
        // content is passed in if outside the loop
        $this->postID = $postID;
        $this->post = get_post($postID);
        $this->title = get_the_title($postID);
        $this->description = $this->post->post_excerpt;
        $this->span = $span;
        $this->imageURL = get_the_post_thumbnail_url($postID);
        $this->webp = str_replace("uploads", "uploads-webpc/uploads", $this->imageURL) . ".webp";
        $this->invert = $invert;
        $this->link = get_the_permalink($postID);
    }

    public function render()
    {
        return $this->view('components.service');
    }
}
