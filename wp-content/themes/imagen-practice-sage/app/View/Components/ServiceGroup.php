<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class ServiceGroup extends Component
{
    public $title;
    public $description;
    public $groupID;
    public $services;
    public $slug;
    public $ID;

    public function __construct(){
        $this->groupID = get_sub_field('group');
        $this->ID = get_sub_field('id');
        $this->title = get_the_title($this->groupID);
        $this->slug = get_post_field( 'post_name', $this->groupID );
        $this->description = get_post_field('post_content', $this->groupID);
        $this->services = $this->getServices($this->groupID);
    }

    public function getServices($groupID){
        $args = array(
            'post_type'      => 'services',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'post_parent'    => $groupID,
            'order'          => 'ASC',
            'orderby'        => 'menu_order'
         );
        
        
        return new \WP_Query( $args );
    }

    public function render()
    {
        return $this->view('components.service-group');
    }
}
