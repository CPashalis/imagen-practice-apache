<div class="page-section relative bg-light pb-6" id="{{$ID}}">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    <div class="xl:col-span-8 xl:col-start-3 col-span-12">
      <div class="relative mx-auto z-10 p-6">
        <div class="content-center">
          <div class="p-6 text-center">
            <h1 class="text-xl font-medium text-primary mb-6">{!! $title !!}</h1>
            <div class="formatted">{!! $description !!}</div>
          </div>
        </div>
      </div>
    </div>
  
  {{-- cards --}}
  {{-- todo: slick slider --}}
  {{-- todo: wrap each group of three in grid when more than 3 --}}
  <div class="xl:col-span-10 xl:col-start-2 col-span-12">
    <div class="relative  mx-auto z-10 pb-6">
        @if(!empty($cards))
        <div class="grid grid-cols-3 gap-5 content-center">
        @foreach ($cards as $card)
          <div class="md:col-span-1 col-span-3 text-center bg-white shadow-lg">
            <div class="p-6">
            @if($card['image'])
              <img src="{{$card['image']['url']}}" class="my-6 inline-block"/>
              @endif
            <div class="formatted">{!! $card['description'] !!}</div>
            </div>
          </div>
        @endforeach
        </div>
      @endif 
      </div>
    </div>
  </div>
</div>

