<div class="page-header relative">
  @if($webp && file_exists($webp))
  <div class="pb-[50%] md:pb-0 md:absolute md:w-full md:h-full bg-cover bg-center z-0" style="background-image: url({{$webp}})"></div>
  @else
    <div class="pb-[50%] md:pb-0 md:absolute md:w-full md:h-full bg-cover bg-center z-0" style="background-image: url({{$image["url"]}})"></div>
  @endif

  <div class="relative xl:container mx-auto z-10 md:px-6 flex h-full items-center {{ $align }}">
      <div class="bg-light md:bg-white/90 p-6 xl:p-10 rounded-sm text-center md:text-left md:w-[480px] grow-0 h-auto hero-bg">
        <h1 class="{{$tw['h1']}} {{ ($icon) ? 'hero-icon' : '' }}">
          @if($icon)
          <span class="md:absolute block md:inline">{!! $icon !!}</span>
          @endif
          {!! $title !!}
        </h1>
        @if($sub)<h2 class="text-xl font-medium mb-6">{!! $sub !!}</h2>@endif
        <div class="mb-0 md:mb-10 formatted">{!! $description !!}</div>

        @if( have_rows('buttons') )
          @while( have_rows('buttons') )
          @php(the_row())
            <x-Button :hero="true"></x-Button>
          @endwhile
        @endif
      </div>
  </div>
</div>
