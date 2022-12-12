<div class="page-section relative" id="{{$ID}}">
  <div class="{{$tw['wrapper']}}">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <div class="{{($reverse) ? 'md:grid':'grid'}} md:grid-cols-3 md:gap-x-5 content-center items-center {{$bg}}">
        @if($reverse)
          @include('components.includes.section-content')
          @include('components.includes.section-media')
        @else()
          @include('components.includes.section-media')
          @include('components.includes.section-content')
        @endif
      </div>
    </div>
  </div>
</div>
