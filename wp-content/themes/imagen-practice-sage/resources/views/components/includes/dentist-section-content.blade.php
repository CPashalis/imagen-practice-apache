<div class="col-span-1 {{($reverse) ? '':'row-start-2'}}">
  <div class="p-6">
    <div class="text-center md:text-left">
      <h3 class="text-xl text-primary font-medium">{!! $title !!}</h3>
      <h4 class="text-base font-medium mb-6">{!! $job !!}</h4>
      <div class="mb-6 formatted">{!! $description !!}</div>

      @if(!empty($content))
      @php($id = str_replace(' ', '', $title))
      <button data-micromodal-trigger="modal-{{$id}}" class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white bg-primary "> 
          <span class="uppercase">Read More</span>
      </button>
      @endif
    </div>
  </div>
</div>