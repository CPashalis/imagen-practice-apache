@extends('layouts.app')

@section('content')
  @if (! have_posts())
  @php($four = get_field('four_o_four', 'option'))
    <div class="h-screen flex place-items-center bg-center bg-cover" style="background-image: url({{$four['background_image']['url']}})">
      <div class="relative container mx-auto z-10 px-10">
        <div class="grid grid-cols-3 gap-5 content-center page-header-inner">
          <div class="col-span-1">
            <div class="bg-white/90 p-10 rounded-sm">
              <h1 class="{{$tw['h1']}}">
                404 - The page you were looking for could not be found
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection
