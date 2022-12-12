<div class="{{$tw['wrapper']}}">
  <div class="xl:col-span-10 xl:col-start-2 col-span-12">    
    <div class="relative xl:container mx-auto z-10 pb-6">
      
      @php($i = 1)
      <ul class="flex flex-wrap gap-5">
        @while( have_rows('grid') )
          @php(the_row()) 
          @php($image = get_sub_field('image'))
          <li class="flex-auto h-[300px]">
            <img class="object-cover h-full w-full cursor-pointer" src="{{$image['url']}}" alt="" data-micromodal-trigger="modal-grid-{{$i}}">
          </li>
          @php($i++)
        @endwhile
      </ul>
      
    </div>
  </div>
</div>