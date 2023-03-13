
<div class="page-section relative">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto md:p-6 pb-6 relative">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <div class="relative mx-auto z-10">
        <div class="grid grid-cols-3 gap-5 content-center bg-light">
          <div class="md:col-span-1 col-span-3 relative" style="padding-bottom: 75%;">
            <div class="absolute w-full h-full bg-cover bg-center z-0" style="background-image: url({{the_post_thumbnail_url()}})"></div>
          </div>
          <div class="md:col-span-2 col-span-3 items-center flex">
            <div class="p-6">
              <h3 class="{{$tw['h3']}} !mb-2">{!! $title !!}</h3>
              <h4 class="{{$tw['h4']}}">{!! $date !!}</h4>
              <div class="mb-6 formatted">{!! $description !!}</div>

              <a href="{{ $btnURL }}" target="_blank" class="min-w-[160px] h-10 mt-6 bg-primary whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-xs"> 
                <span class="uppercase">Register</span>
              </a>
            </div>
          </div>      
        </div>
      </div>
    </div>
  </div>
</div>
{{get_sub_field('event_date_time')}}
