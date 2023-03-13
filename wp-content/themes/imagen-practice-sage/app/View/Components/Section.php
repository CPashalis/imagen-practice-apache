<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Section extends Component
{
    public $title;
    public $description;
    public $media;
    public $image;
    public $webp;
    public $images;
    public $videoID;
    public $embedCode;
    public $spear;
    public $buttons;
    public $layout;
    public $reverse;
    public $column1;
    public $column2;
    public $bg;
    public $align;
    public $ID;
    public $columnLayout;
    public $columnOrder;

    public function __construct(
        $reverse = false,
        $columns = 1,
        $bg = '',
        $align = 'md:text-left text-center'
    ){
        // settings:
        $this->reverse = $reverse;
        $this->column1 = ($columns == 1) ? 3 : 1;
        $this->column2 = ($columns == 1) ? 3 : 2;
        $this->bg = ($bg) ? 'bg-light' : '';
        $this->align = ($columns == 1) ? 'text-center' : $align;
        // content
        if( have_rows('media') ):
            $this->columnLayout = get_sub_field('column_layout');
            while ( have_rows('media') ) : the_row();
                
                if( get_row_layout() == 'image' ):
                    $this->image = get_sub_field('image');
                    // use the webp image - requires plugin enabled, currently not working automatically
                    $this->webp = str_replace("uploads", "uploads-webpc/uploads", $this->image['url']) . ".webp";
                endif;
                if( get_row_layout() == 'carousel' ):
                    // todo: create webp array
                    $this->images = get_sub_field('images');
                endif;
                if( get_row_layout() == 'video' ):
                    $this->videoID = get_sub_field('video_id');
                endif;
                if( get_row_layout() == 'wistia' ):
                $this->embedCode = get_sub_field('embed_code');
                endif;
                if( get_row_layout() == 'spear_video' ):
                    $this->spear = get_sub_field('iframe');
                endif;
            endwhile;
        endif;

        $this->title = get_sub_field('title');
        $this->description = get_sub_field('description');
        $this->buttons = get_sub_field('buttons');
        $this->ID = get_sub_field('id');
        $this->columnLayout = get_sub_field('column_layout');
        
        
    }

    public function render()
    {
        return $this->view('components.section');
    }
}
