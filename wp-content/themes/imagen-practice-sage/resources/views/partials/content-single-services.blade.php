@if( have_rows('service_content') )
    @while( have_rows('service_content') )
    @php(the_row())
    
        @if( get_row_layout() == 'page_header' )
            <x-Hero></x-Hero>
        @endif

        @if( get_row_layout() == 'section' )
          @php($settings = get_sub_field('settings'))
          @if( have_rows('sections') )
              @while( have_rows('sections') )
              @php(the_row())
                  <x-Section :reverse="$settings['reverse']" :columns="$settings['columns']" :bg="$settings['background_color_on']"></x-Section>
              @endwhile
          @endif
        @endif
        @if( get_row_layout() == 'video_module' )
        <div class="grid grid-cols-12 gap-5 content-center container mx-auto p-6 relative">
          <div class="col-span-10 col-start-2">
            
                <x-ServiceVideo></x-ServiceVideo>
            @endif

            @if( get_row_layout() == 'service_content_accordion' )
            @php($title = get_sub_field('title'))
                @if( have_rows('row') )
                <div class="grid grid-cols-12 gap-5 content-center container mx-auto p-6 relative">
          <div class="col-span-10 col-start-2">
                <h2 class="{{$tw['h2']}} text-center">{{$title}}</h2>
                <div class="relative container mx-auto z-10 pb-6">
                  <div class="accordion" id="accordionExample">
                    @while( have_rows('row') )
                    @php(the_row())
                        <x-ServiceContentAccordion></x-ServiceContentAccordion>
                    @endwhile
                  </div>
                </div>
                @endif
            @endif
          </div>
        </div>

        @if( get_row_layout() == 'callout' )
            <x-Callout></x-Callout>
        @endif

    @endwhile
@endif
