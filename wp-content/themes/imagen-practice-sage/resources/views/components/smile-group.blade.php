<div class="page-section relative" id="{{ $ID }}">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto pb-6 relative">
    <div class="xl:col-span-8 xl:col-start-3 col-span-12">
      <div class="relative mx-auto z-10 md:p-6 py-6">
        <div class="content-center">
          <div class="p-6 text-center">
            <h2 class="{{$tw['h2']}}">{!! $title !!}</h2>
            <div class="formatted">{!! $description !!}</div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      {{-- scrubbers --}}
      <div class="relative mx-auto z-10 pb-6 px-6 xl:px-0">
        <div class="grid grid-cols-3 gap-5 content-center">

          @if( have_rows('scrubber') )
            @while( have_rows('scrubber') )
            @php(the_row()) 
            <div class="col-span-3 md:col-span-1 rounded-sm overflow-hidden md:p-0">
              <x-Scrubber :span="1"></x-Scrubber>
            </div>
            @endwhile
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

