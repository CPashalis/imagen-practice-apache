<div class="page-section relative">  
  {{-- events --}}
  <div class="relative xl:container mx-auto z-10 p-6">

    @if($events->have_posts())
      @while($events->have_posts())
      @php($events->the_post())

      <x-Event :span="1"></x-Event>

      @endwhile
    @endif 
    @php(wp_reset_postdata())
  </div>
</div>

