<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class EventList extends Component
{
    public $events;

    public function __construct(){
        $this->events = $this->getEvents();
    }

    public function getEvents(){
        $args = array(
            'post_type'      => 'events',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order'          => 'ASC',
            'orderby'        => 'menu_order'
         );
        
        
        return new \WP_Query( $args );
    }

    public function render()
    {
        return $this->view('components.event-list');
    }
}
