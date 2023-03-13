<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Scrubber extends Component
{
    public $beforeImage;
    public $afterImage;

    public function __construct(
        $span = 1
    ){
        // content is passed in if outside the loop
        $this->beforeImage = get_sub_field('before_image');
        $this->afterImage = get_sub_field('after_image');
    }

    public function render()
    {
        return $this->view('components.scrubber');
    }
}
