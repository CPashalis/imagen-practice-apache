@if(!empty($content))
@php($id = str_replace(' ', '', $title))
<div class="modal micromodal-slide z-50" id="modal-{{$id}}" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container relative" role="dialog" aria-modal="true" aria-labelledby="modal-{{$id}}-title">
      <header class="modal__header absolute top-0 right-0 p-6">
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <div class="modal__content" id="modal-{{$id}}-content">
        <div class="relative container mx-auto z-10 p-6">
          <div class="grid grid-cols-2 gap-5 content-center">
            <div class="col-span-1">
              <h2 class="{{$tw['h2']}} md:!mb-2">{!! $title !!}</h1>
              @if($job)<h3 class="text-xl font-medium relative md:mb-4 mb-2">{!! $job !!}</h2>@endif
              <div class="mb-6 formatted">{!! $description !!}</div>
              {!! $content !!}
            </div>
            <div class="col-span-1">
              <img src="{{$image['url']}}" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif