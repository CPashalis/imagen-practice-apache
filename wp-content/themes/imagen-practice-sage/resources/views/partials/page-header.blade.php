<div class="page-header relative">
  <div class="absolute w-full h-full bg-cover bg-center z-0" style="background-image: url({{$image["url"]}})"></div>

  <div class="relative container mx-auto z-10 p-6">
    <div class="grid grid-cols-3 gap-5 content-center page-header-inner">
      <div class="col-span-1">
        <div class="bg-white p-6 rounded-lg">
          <h1 class="{{$tw['h1']}}">{!! $title !!}</h1>
          <p>{{ $description }}</p>
        </div>
      </div>
    </div>
  </div>
</div>

