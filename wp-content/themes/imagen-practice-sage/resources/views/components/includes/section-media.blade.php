
<?php if($columnLayout == "media"){
  $columnOrder = "row-start-1";
}
?>
@if($image)
<div class="col-span-{{$column2}} {{ $columnOrder }} relative" style="padding-bottom: 55%;">
    <div class="absolute w-full h-full bg-cover bg-center z-0" style="background-image: url({{$image["url"]}})"></div>
</div>
@endif

@if($images)
<div class="relative col-span-{{$column2}} <?php echo $columnOrder ?>">
    <div class="slider">
        @foreach ($images as $image)
        <div><img src="{{$image['image']['url']}}" /></div>
        @endforeach
    </div>
</div>
@endif

@if($videoID || $spear)
<div class="relative col-span-{{$column2}} <?php echo $columnOrder ?>">
  <div class="p-lg-5 p-md-3 p-md-2" style="padding-bottom: 0 !important">
    <div class="gallery-container">
      <div class="embed-responsive">
        <div class='embed-container'>
        @if($videoID)
          <iframe src='https://www.youtube.com/embed/{{$videoID}}?rel=0' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        @endif

        @if($spear)
          {!! $spear !!}
        @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@if($embedCode)
<div class="relative col-span-{{$column2}} <?php echo $columnOrder ?>">
  <div class="p-lg-5 p-md-3 p-md-2" style="padding-bottom: 0 !important">
  {!! $embedCode !!}
  </div>
</div>
@endif
