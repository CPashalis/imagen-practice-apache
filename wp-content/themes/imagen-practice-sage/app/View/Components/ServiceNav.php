<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class ServiceNav extends Component
{
    public $services;

    public function __construct(){
        $this->services = $this->getServices();
    }

    public function getServices(){
        $args = array(
            'post_type'      => 'services',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'post_parent'    => 0,
            'order'          => 'ASC',
            'orderby'        => 'menu_order'
         );
        
        
        return new \WP_Query( $args );
    }

    public function render()
    {
        return $this->view('components.service-nav');
    }
}
