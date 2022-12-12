
<div class="col-span-3 md:col-span-{{$span}} {{($invert) ? 'bg-white' : 'bg-light'}} relative">
  <div class="mb-0 md:mb-10 grid grid-cols-3 content-center items-center">
    <div class="col-span-1 md:col-span-3 pb-[100%] md:pb-0 bg-cover bg-center md:h-auto" style="background-image: url({{($webp && file_exists($webp) ? $webp : $imageURL)}})">
      <a href="{{$link}}">
        @if($webp && file_exists($webp))
        <img src="{{$webp}}" alt="{{$title}}" class="hidden md:block opacity-0"/>
        @else
        <img src="{{$imageURL}}" alt="{{$title}}" class="hidden md:block opacity-0"/>
        @endif
      </a>
    </div>
    <div class="p-6 col-span-2 md:col-span-3">
      <a href="{{$link}}" class="text-base text-primary font-medium md:hidden relative block">{{ $title }} 
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="absolute right-0 top-2" height="16"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
      </a>
      <h4 class="text-base text-primary font-medium hidden md:block"><a href="{{$link}}">{{ $title }}</a></h4>
      <div class="py-2 md:py-6 formatted hidden md:block">
        {!! $description !!}
      </div>
      <a href="{{$link}}" class="hidden md:inline-flex min-w-[160px] h-10 mt-6 bg-primary whitespace-nowrap items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-xs md:absolute bottom-0 left-0 uppercase md:ml-6 md:mr-6 md:mb-6">Learn More</a>
    </div>
  </div>
</div>


