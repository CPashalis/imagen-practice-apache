
      <div class="col-span-2 md:col-span-1 bg-light">
        @if($image)
        <img src="{{$image["url"]}}" alt="{!! $title !!}"/>
        @endif
        <div class="p-6">
          @if(!empty($content))
          @php($id = rand())
          <h3 class="text-primary font-medium cursor-pointer" data-micromodal-trigger="modal-{{$id}}">{!! $title !!}</h3>
          @else
          <h3 class="text-primary font-medium">{!! $title !!}</h3>
          @endif
          <h4 class="mb-1">{!! $job !!}</h4>

          @if(!empty($content))
          <div class="modal micromodal-slide" id="modal-{{$id}}" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
              <div class="modal__container relative" role="dialog" aria-modal="true" aria-labelledby="modal-{{$id}}-title">
                <header class="modal__header absolute top-0 right-0 p-6">
                  <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <div class="modal__content" id="modal-{{$id}}-content">
                  <div class="relative container mx-auto z-10 p-6">
                    <div class="grid grid-cols-2 gap-5 content-center">
                      <div class="col-span-1">
                        <h2 class="{{$tw['h2']}}">{!! $title !!}</h1>
                        <h3 class="{{$tw['h3']}}">{!! $job !!}</h2>
                        <div class="mb-6 formatted">{!! $description !!}</div>
                        <div class="formatted">{!! $content !!}</div>
                      </div>
                      <div class="col-span-1">
                        <img src="{{$image['url']}}" alt="{!! $title !!}"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      
