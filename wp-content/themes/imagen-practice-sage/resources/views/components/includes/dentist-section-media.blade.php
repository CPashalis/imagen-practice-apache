@if($image)
<div class="col-span-2 relative {{($reverse) ? '':'row-start-1 md:row-start-2'}} bg-cover bg-center md:h-full" style="background-image: url({{($webp && file_exists($webp) ? $webp : $image["url"])}})">
  @if($webp && file_exists($webp))
    <img class="opacity-0" src="{{$webp}}" />
  @else
    <img class="opacity-0" src="{{$image["url"]}}" />
  @endif
</div>
@endif