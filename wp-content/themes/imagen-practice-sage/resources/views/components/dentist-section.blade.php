<div class="md:grid grid-cols-12 gap-5 content-center xl:container mx-auto md:p-6 px-3.5 py-6 relative z-0">
  <div class="xl:col-span-10 xl:col-start-2 col-span-12">
    <div class="{{($reverse) ? 'md:grid':'grid'}} md:grid-cols-3 md:gap-x-5 content-center items-center bg-light">
        @if($reverse)
          @include('components.includes.dentist-section-media')
          @include('components.includes.dentist-section-content')
        @else()
          @include('components.includes.dentist-section-content')
          @include('components.includes.dentist-section-media')
        @endif
      </div>
    </div>
  </div>
</div>

