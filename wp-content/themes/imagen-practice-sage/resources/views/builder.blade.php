{{--
  Template Name: Page Builder Template
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())

    @include('partials.pb')

    @endwhile
@endsection
