<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Button extends Component
{
    public $btnLabel;
    public $btnURL;
    public $btnIcon;
    public $isSchedule;
    public $isCall;
    public $phone;
    public $hero;
    public $heroClass;

    public function __construct(
        $btnIcon = '',
        $btnLabel = '',
        $btnURL = '',
        $isSchedule = '',
        $isCall = '',
        $hero = false,
        $heroClass = 'text-xs min-w-[160px] h-10 bg-primary hover:bg-primary-dark'
    ){
        // these should be passed in instead so it can be used outside of a repeater
        $this->btnLabel = ($btnLabel !== '') ? $btnLabel : get_sub_field('button_label');
        $this->btnURL = ($btnURL !== '') ? $btnURL : get_sub_field('button_url');
        $this->btnIcon = ($btnIcon !== '') ? $btnIcon : get_sub_field('button_icon');
        $this->isSchedule = ($isSchedule !== '') ? $isSchedule : get_sub_field('schedule_button');
        $this->isCall = ($isCall !== '') ? $isCall : get_sub_field('call_button');
        $this->phone = get_field('practice_phone', 'option');
        $this->hero = $hero;
        $this->heroClass = ($hero) ? "xl:max-w-[195px] md:max-w-[210px] md:mb-0 mb-5 h-14 text-sm w-1/2 bg-primary leading-4 basis-1/2 hover:bg-primary-dark" : $heroClass;
    }

    public function render()
    {
        return $this->view('components.button');
    }
}
