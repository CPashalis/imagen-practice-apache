@php( $pageSettings = get_field('settings') )

@if( have_rows('content') )
@while( have_rows('content') )
@php(the_row())
    
    {{-- Page Header and Sub Nav --}}
    @if( get_row_layout() == 'page_header' )
        <x-Hero></x-Hero>

        @if($pageSettings['enable_sub_nav'] && $pageSettings['enable_sub_nav'][0] == 'yes' && $pageSettings['sub_nav_items'])
        <div id="stickynav" class="z-40 bg-white border-b border-t border-gray-100">
            <div class="xl:container mx-auto px-6 text-center">
                <nav class="nav-tertiary font-medium uppercase text-xs " aria-label="Primary Nav">
                    <ul class="nav">
                    @foreach( $pageSettings['sub_nav_items'] as $navItem )
                        <li class="inline-block mx-3 py-3 anchor-item">
                            <a href="#{{$navItem['anchor']}}">{{$navItem['label']}}</a>
                        </li>  
                    @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        @endif
    @endif

    {{-- Sections --}}
    @if( get_row_layout() == 'section' )
        @php($settings = get_sub_field('settings'))
        @if( have_rows('sections') )
            @php($reverse = 0)
            @while( have_rows('sections') )
            @php(the_row())
                <x-Section :reverse="$reverse" :columns="$settings['columns']" :bg="$settings['background_color_on']"></x-Section>
                @php($reverse = !$reverse)
            @endwhile
        @endif
    @endif

    {{-- Dentists --}}
    @if( get_row_layout() == 'dentist_section' )
        @php($id = get_sub_field('id'))
        @php($title = get_sub_field('title'))
        @php($description = get_sub_field('description'))
        
        @if( have_rows('d_sections') )
        
        <div class="page-section relative d-section z-0" id="{{$id}}">
            <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto pt-6 md:px-6 px-3.5 relative">
                <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                    <div class="relative container mx-auto z-10 md:px-6">
                        <div class="content-center">
                            <div class="p-6 text-center">
                                <h2 class="{{$tw['h2']}} {{($description) ? '':'!mb-0'}}">{!! $title !!}</h2>
                                @if($description)
                                    <div class="formatted">{!! $description !!}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php($reverse = 0)
            @while( have_rows('d_sections') )
                @php(the_row())
                <x-DentistSection :reverse="$reverse" :columns="2"></x-DentistSection>
                @php($reverse = !$reverse)
            @endwhile
        </div>
        @while( have_rows('d_sections') )
            @php(the_row())
            <x-DentistModal></x-DentistModal>
            @php($reverse = !$reverse)
        @endwhile
        @endif
    @endif

    {{-- Team Group --}}
    @if( get_row_layout() == 'team_group' )
        @php($id = get_sub_field('id'))
        @php($title = get_sub_field('title'))
        @php($description = get_sub_field('description'))
        @if( have_rows('teams') )
        <div class="page-section relative z-0" id="{{$id}}">
            <div class="bg-light mt-6">
                <div class="{{$tw['wrapper']}}">
                    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                        <div class="relative container mx-auto z-10 py-6">
                            <div class="content-center">
                                <div class="text-center">
                                    <h2 class="{{$tw['h2']}} {{($description) ? '':'!mb-0'}}">{!! $title !!}</h2>
                                    @if($description)
                                        <div class="formatted">{!! $description !!}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @while( have_rows('teams') )
                @php(the_row()) 
                <x-TeamGroup></x-TeamGroup>
            @endwhile
        </div>
        @while( have_rows('teams') )
            @php(the_row()) 
            <x-TeamModals></x-TeamModals>
            @endwhile
        @endif
    @endif

    {{-- Service Group --}}
    @if( get_row_layout() == 'service_group' )
        <x-ServiceGroup></x-ServiceGroup>
    @endif

    {{-- Featured Service --}}
    @if( get_row_layout() == 'featured_services' )
        <x-FeaturedServices></x-FeaturedServices>
    @endif

    {{-- Callout --}}
    @if( get_row_layout() == 'callout' )
        <x-Callout></x-Callout>
    @endif

    {{-- Technology --}}
    @if( get_row_layout() == 'technology' )
        <x-Technology></x-Technology>
    @endif

    {{-- Smile Gallery --}}
    @if( get_row_layout() == 'smile_gallery' )
        @if( have_rows('smile_group') )
            @php($toggle = 0)
            @while( have_rows('smile_group') )
            @php(the_row()) 
            <div class="{{ ($toggle) ? 'bg-light' : '' }}"">
                <x-SmileGroup></x-SmileGroup>
            </div>
            @php($toggle = !$toggle)
            @endwhile
        @endif
    @endif

    {{-- Events --}}
    @if( get_row_layout() == 'event_list' )
        <x-EventList></x-EventList>
    @endif

    {{-- Specials --}}
    @if( get_row_layout() == 'specials' )
        @if( have_rows('specials_list') )
        <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto md:p-6 py-6 relative">
            <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                <div class="relative mx-auto z-10 px-3.5 py-6 md:p-6">
                    <div class="grid grid-cols-4 gap-3.5 md:gap-5 content-center">
                    @while( have_rows('specials_list') )
                    @php(the_row()) 
                    <x-Special></x-Special>
                    @endwhile
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif

    {{-- FAQ --}}
    @if( get_row_layout() == 'faq' )
        <x-FaqList></x-FaqList>
    @endif

    {{-- Membership --}}
    @if( get_row_layout() == 'membership' )
        <x-Plans></x-Plans>
    @endif

    {{-- Insta Feed --}}
    @if( get_row_layout() == 'instagram_feed' )
    @php($instaID = get_sub_field('id'))
    @php($instaTitle = get_sub_field('title'))
    @php($instaDesc = get_sub_field('description'))
    <div class="page-section relative mt-6" id="instagram">
        <div class="grid grid-cols-12 gap-3.5 md:gap-5 content-center xl:container mx-auto py-6 px-3.5 md:p-6 relative">
            <div class="col-span-12">
                <h2  class="text-xl text-primary mb-6 font-medium text-center"><?php echo $instaTitle ?></h2>
                        @if($instaDesc)
                        <div class="formatted text-center">{!! $instaDesc !!}</div>
                        @endif
                <?= do_shortcode('[instagram-feed feed="'.$instaID.'"]'); ?>
            </div>
        </div>
    </div>
    @endif
    

    {{-- Patient Experiences  --}}
    @if( get_row_layout() == 'patient_experiences' )
    @php($peTitle = get_sub_field('title'))
    @php($peDesc = get_sub_field('description'))
    @php($peWText = get_sub_field('white_text'))
        <div class="page-section relative bg-grad mt-6" id="reviews">
            <div class="grid grid-cols-12 gap-3.5 md:gap-5 content-center xl:container mx-auto py-6 px-3.5 md:p-6 relative">
                <div class="xl:col-span-10 xl:col-start-2 col-span-12 my-6">
                    @if(get_sub_field('template') == 1)
                        @if($peWText)
                            <h2 class="text-xl text-primary mb-6 font-medium text-center text-white"><?php echo $peTitle ?></h2>
                            @if($peDesc)
                            <div class="formatted text-center">{!! $peDesc !!}</div>
                            @endif
                        @else
                            <h2 class="text-xl text-primary mb-6 font-medium text-center"><?php echo $peTitle ?></h2>
                            @if($peDesc)
                            <div class="formatted text-center">{!! $peDesc !!}</div>
                            @endif               
                        @endif
                        <?= do_shortcode('[wprevpro_usetemplate tid="1"]'); ?>
                    @endif
                    @if(get_sub_field('template') == 2)
                        @if($peWText)
                            <h2 class="text-xl mb-6 font-medium text-center text-white"><?php echo $peTitle ?></h2>
                            @if($peDesc)
                            <div class="formatted text-center">{!! $peDesc !!}</div>
                            @endif
                        @else
                            <h2 class="text-xl text-primary mb-6 font-medium text-center"><?php echo $peTitle ?></h2>
                            @if($peDesc)
                            <div class="formatted text-center">{!! $peDesc !!}</div>
                            @endif               
                        @endif
                    <?= do_shortcode('[wprevpro_usetemplate tid="2"]'); ?>
                    @endif
                </div>
            </div>
        </div>
      @endif
      {{-- Image Grid --}}
    @if( get_row_layout() == 'image_grid' )
        @php($id = get_sub_field('id'))
        @php($title = get_sub_field('title'))
        @php($description = get_sub_field('description'))
        @if( have_rows('grid') )
        <div class="page-section relative z-0" id="{{$id}}">
            <div class="mt-6">
                <div class="{{$tw['wrapper']}}">
                    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                        <div class="relative container mx-auto z-10 pt-6">
                            <div class="content-center">
                                <div class="text-center">
                                    <h2 class="{{$tw['h2']}} {{($description) ? '':'!mb-0'}}">{!! $title !!}</h2>
                                    @if($description)
                                        <div class="formatted">{!! $description !!}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <x-ImageGrid></x-ImageGrid>
            
        </div>

        @php($i = 1)
        @while( have_rows('grid') )
            @php(the_row()) 
            @php($image = get_sub_field('image'))
            <div class="modal micromodal-slide z-50" id="modal-grid-{{$i}}" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                <div class="modal__container relative" role="dialog" aria-modal="true" aria-labelledby="modal-grid-{{$i}}-title">
                <header class="modal__header absolute top-0 right-0 p-6">
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <div class="modal__content" id="modal-grid-{{$i}}-content">
                    <div class="relative container mx-auto z-10 p-6">
                    <div class="grid grid-cols-1 gap-5 content-center">
                        <div class="col-span-1">
                        <img src="{{$image['url']}}" alt="{!! $title !!}"/>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            @php($i++)
        @endwhile
        @endif
    @endif
@endwhile
@endif