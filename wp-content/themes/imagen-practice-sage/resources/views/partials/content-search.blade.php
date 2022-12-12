<article class="relative container mx-auto z-10 pr-6 pt-6 pb-6 border-b">
  <div class="grid grid-cols-3 gap-5">
    <div class="col-span-2">
      <header> 
        <h2 class="{{$tw['h2']}}">
          <a href="{{ get_permalink() }}">
            {!! $title !!}
          </a>
        </h2>

        @includeWhen(get_post_type() === 'post', 'partials.entry-meta')
      </header>

      <div class="entry-summary">
        @php(the_excerpt())
      </div>
    </div>
  </div>
</article>
