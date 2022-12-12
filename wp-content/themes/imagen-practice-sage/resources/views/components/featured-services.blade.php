<div class="page-section relative bg-light my-6">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <div class="relative mx-auto z-10 p-6">
        <div class="content-center">
          <div class="pb-6 text-center">
            <h2 class="{{$tw['h2']}}">{!! $title !!}</h2>
            @if($description)<p class="formatted">{!! $description !!}</p>@endif
          </div>
        </div>
      </div>
  
      {{-- services --}}
      <div class="relative xl:container mx-auto z-10 pb-6">
        <div class="grid grid-cols-3 gap-5 content-center">

        @foreach($services as $service)
          <x-Service :span="1" :postID="$service['service']" :invert="true"></x-Service>
        @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

