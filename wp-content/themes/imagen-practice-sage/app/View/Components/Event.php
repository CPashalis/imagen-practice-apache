<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Event extends Component
{
    public $title;
    public $description;
    public $span;
    public $post;
    public $btnURL;
    public $date;

    public function __construct(
        $span = 1
    ){
        // content is passed in if outside the loop
        $this->post = get_post();
        $this->title = get_the_title();
        $this->description = $this->post->post_content;
        $this->span = $span;
        $this->btnURL = get_field('event_external_url', $this->post->ID);
        $this->date = get_field('event_date_time', $this->post->ID);
    }

    public function render()
    {
        return $this->view('components.event');
    }
}
