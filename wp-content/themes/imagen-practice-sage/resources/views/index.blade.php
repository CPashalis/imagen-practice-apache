@extends('layouts.app')

@section('content')

  @if( have_rows('content', 346) )
    @while( have_rows('content', 346) )
    @php(the_row())
        @if( get_row_layout() == 'page_header' )
            <x-Hero></x-Hero>
        @endif
    @endwhile
  @endif

  <div class="{{$tw['wrapper']}}">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      @if (! have_posts())
        <x-alert type="warning">
          {!! __('Sorry, no results were found.', 'sage') !!}
        </x-alert>
      @endif

      <div class="relative mx-auto z-10 md:p-6 py-6">
        <div class="grid grid-cols-4 gap-5 content-center">
          @while(have_posts()) @php(the_post())
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
          @endwhile
        </div>
      </div>
    </div>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
