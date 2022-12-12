<div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
  <div class="xl:col-span-10 xl:col-start-2 col-span-12">
    <div class="relative mx-auto z-10 pb-6">
      <div class="content-center">
        <div class="text-center">
          <h3 class="{{$tw['h3']}}">{!! $title !!}</h3>
          @if($description)
            <div class="formatted">{!! $description !!}</div>
          @endif
        </div>
      </div>
    </div>
    
    {{-- members --}}
    <div class="relative xl:container mx-auto z-10 pb-6">
      <div class="grid grid-cols-4 gap-5 content-center">

        @if( have_rows('members') )
          @while( have_rows('members') )
          @php(the_row()) 
          <x-Member :span="1"></x-Member>
          @endwhile
        @endif
      </div>
    </div>

  </div>
</div>


