@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
      @if( get_row_layout() == 'page_header' )
          @php($text = get_sub_field('text'))
      @elseif( get_row_layout() == 'download' )
          @php($file = get_sub_field('file'))
      @endif
  @endwhile

@endsection
