
{{--
  Template Name: New Patient Template
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())

    {{-- need a better solution for this --}}
    @php( $pageSettings = get_field('settings') )
    @if( have_rows('content') )
        @while( have_rows('content') )
        @php(the_row())
            @if( get_row_layout() == 'page_header' )
                <x-Hero></x-Hero>

                @if($pageSettings['enable_sub_nav'] && $pageSettings['enable_sub_nav'][0] == 'yes' && $pageSettings['sub_nav_items'])
                <div id="stickynav" class="z-40 bg-white/90 border-b border-t border-gray-100">
                    <div class="container mx-auto px-6 text-center">
                        <nav class="nav-tertiary font-medium uppercase text-xs " aria-label="Primary Nav">
                            <ul class="nav">
                            @foreach( $pageSettings['sub_nav_items'] as $navItem )
                                <li class="inline-block mx-3 py-3 anchor-item">
                                    <a href="{{$navItem['anchor']}}">{{$navItem['label']}}</a>
                                </li>  
                            @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                @endif
            @endif
        @endwhile
    @endif


    @php($initial = get_field('initial_visit'))
    <div class="page-section relative bg-light" id="{{$initial['id']}}">
        <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
            <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                <div class="relative mx-auto z-10 md:p-6 py-6">
                    <div class="content-center">
                        <div class="p-6 text-center">
                            <h3 class="{{$tw['h3']}}">{!! $initial['title'] !!}</h3>
                            @if($initial['description'])<p class="formatted">{!! $initial['description'] !!}</p>@endif
                        </div>
                    </div>
                </div>
                
                {{-- steps --}}
                <div class="relative mx-auto z-10 pb-6">
                    <div class="grid grid-cols-3 gap-5 content-center">
                        @foreach($initial['steps'] as $step)
                            <div class="md:col-span-1 col-span-3 bg-white">
                                <div class="p-6">
                                    <h3 class="{{$tw['h3']}} !mb-2">{!! $step['title'] !!}</h3>
                                    {!! $step['description'] !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    @php($patient = get_field('new_patient_forms'))
    <div class="page-section relative bg-light" id="{{$patient['id']}}">
        <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
            <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                <div class="relative mx-auto z-10 md:p-6 py-6">
                    <div class="content-center">
                        <div class="p-6 text-center">
                            <h3 class="{{$tw['h3']}}">{!! $patient['title'] !!}</h3>
                            @if($patient['description'])<p class="mb-6 formatted">{!! $patient['description'] !!}</p>@endif

                            @foreach($patient['buttons'] as $button)
                            <a href="{{ $button['button_url'] }}" class="m-6 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-xs min-w-[160px] h-10 bg-primary hover:bg-primary-dark"> 
                                <span class="uppercase">{!! $button['button_label'] !!}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if( have_rows('content') )
        @while( have_rows('content') )
        @php(the_row())
            @if( get_row_layout() == 'faq' )
                <x-FaqList></x-FaqList>
            @endif
        @endwhile
    @endif

    @endwhile
@endsection
