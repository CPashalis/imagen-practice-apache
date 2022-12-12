<style>
#calloutSection p span a{color:white;}
</style>
<div class="relative bg-primary-light" id="{{$ID}}">
  <div class="relative container mx-auto z-10 p-10">
    <div class="grid grid-cols-5 gap-5 content-center">
      <div class="md:col-span-3 md:col-start-2 col-span-10">
        <div id="calloutSection" class="text-center">
          <div class="inline-block mb-2 callout-icon">{!! $icon !!}</div>
          <h2 class="{{$tw['h1']}} text-accent">{!! $title !!}</h2>
          <div class="mb-10 formatted callout-description">{!! $description !!}</div>

          @if( have_rows('buttons') )
            @while( have_rows('buttons') )
            @php(the_row())
            <div class="callout-button">
              <x-Button :hero="true"></x-Button>
            </div>
            @endwhile
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
