@extends('layouts.app')

@section('content')
  {{-- @include('partials.page-header') --}}

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  <?php
   global $wp_query;
   global $paged;
   $not_singular = $wp_query->found_posts > 1 ? 'results' : 'result'; // if found posts is greater than one echo results(plural) else echo result (singular)
  ?>
  <div class="relative container mx-auto z-10 p-6">
    <div class="grid grid-cols-3 gap-5">
      <div class="col-span-2">
        <h2 class="{{$tw['h2']}}">{{$wp_query->found_posts . " $not_singular found"}} for "{{the_search_query()}}"</h2>
      </div>
    </div>
  </article>

  @while(have_posts()) @php(the_post())
    @include('partials.content-search')
  @endwhile
  
  <div class="grid grid-cols-2 py-6 capitalize">
    <div class="col-span-1">
  @if( get_previous_posts_link() ) 
    <a href="{{ get_pagenum_link( $paged - 1 ) }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="15" class="inline mr-2"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path class="fill-primary" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg> &nbsp; Previous Page</a>
  @endif
    </div>
    <div class="col-span-1 text-right">
  @if( get_next_posts_link() )
      <a href="{{ get_pagenum_link( $paged +1 ) }}">Next Page &nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="15" class="inline ml-2"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></a>
  @endif
    </div>
  </div>
@endsection
