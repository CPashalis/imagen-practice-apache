
<article class="md:col-span-2 col-span-4 text-center bg-light">
  @php($webp = str_replace("uploads", "uploads-webpc/uploads", get_the_post_thumbnail_url()) . ".webp")
  
  @if($webp && file_exists($webp))
  <img src="{{$webp}}" alt="{{$title}}" />
  @else
  {{the_post_thumbnail()}}
  @endif

  <div class="p-10">
    <header class="mb-6">
      <h3 class="{{$tw['h3']}}">
        <a href="{{ get_permalink() }}">
          {!! $title !!}
        </a>
      </h2>

      <div class="mb-6">@include('partials.entry-meta')</div>
    </header>

    <div class="entry-summary">
      @php(the_excerpt())
    </div>

    <a href="{{the_permalink()}}" class="inline-flex min-w-[160px] h-10 mt-6 bg-primary whitespace-nowrap items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-xs uppercase md:ml-6 md:mr-6 md:mb-6"> 
      <span class="uppercase">Read More</span>
    </a>
  </div>
</article>
