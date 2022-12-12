
{{--
  Template Name: Contact Us Template
--}}

@extends('layouts.app')

@section('content')
    
    @if( have_rows('content') )
@while( have_rows('content') )
@php(the_row())
    @if( get_row_layout() == 'page_header' )
        <x-Hero></x-Hero>
    @endif
    @endwhile
    @endif
    @while(have_posts()) @php(the_post())
    <div class="page-section relative">
        <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
            <div class="xl:col-span-10 xl:col-start-2 col-span-12">

                <div class="relative mx-auto z-10 p-6">
                    <div class="grid grid-cols-12 gap-5 content-center">
                        <div class="xl:col-span-10 xl:col-start-2 col-span-12 relative text-center mb-10">
                            @php($title = get_field('sub_title'))
                            @php($subText = get_field('sub_text'))
                            <h2 class="text-xl md:text-2xl font-medium text-primary relative mb-6"><?php echo $title ?></h2>
                            <div class="formatted text-center"><?php echo $subText ?></div>

                        </div>
                        <div class="xl:col-span-7 col-span-12 relative">
                            <h2 class="{{$tw['h2']}}">Contact Us</h2>
                            <?= do_shortcode('[wpforms id="444" description="true"]'); ?>
                        </div>
                        <div class="xl:col-span-1 col-span-12 relative"></div>
                        <div class="xl:col-span-4 col-span-12 relative">
                            <h2 class="{{$tw['h2']}}">Our Office</h2>
                            
                            <div class="mb-10">
                                <h4 class="text-base font-medium text-primary uppercase">Hours</h4>
                                <table>
                                @if( have_rows('practice_hours', 'option') )
                                    @while( have_rows('practice_hours', 'option') ) 
                                    @php(the_row())
                                
                                    @php($days = get_sub_field('day'))
                                    @php($time = get_sub_field('hours'))
                                    <tr><td> {{ $days}} &nbsp;&nbsp;&nbsp;</td><td>{{ $time }}</td></tr>
                                    @endwhile
                                @endif
                                </table>
                            </div>
                            
                            <div class="mb-10">
                                <h4 class="text-base font-medium text-primary uppercase">Location</h4>
                                <div>{!! the_field('location', 'option') !!}</div>
                                @php($googleMap = get_field('google_map_link'))
                                <a href="<?php echo $googleMap ?>" target="_blank" class="min-w-[160px] h-10 mt-6 bg-primary whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-xs"> 
                                    <span class="uppercase">Get Directions</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endwhile
@endsection
