<div class="page-section relative" id="{{$ID}}">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">

      <div class="relative mx-auto z-10 md:p-6 py-6">
        <div class="content-center">
          <div class="grid grid-cols-10 gap-5 content-center mx-auto">
            <div class="md:col-span-8 md:col-start-2 col-span-10 text-center">
              <h2 class="{{$tw['h2']}}">{!! $title !!}</h2>
              <div class="formatted">{!! $description !!}</div>
            </div>
          </div>
        </div>
      </div>
      
      {{-- services --}}
      <div class="relative mx-auto z-10 md:p-6 py-6">
        <div class="grid grid-cols-3 gap-5 content-center">

        @if($services->have_posts())
          @while($services->have_posts())
          @php($services->the_post())

          <x-Service :span="1"></x-Service>

          @endwhile
        @endif 
        @php(wp_reset_postdata())
        </div>
      </div>
    </div>
  </div>
</div>

