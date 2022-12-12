<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.header')

  <main id="main" class="main z-40">
    @yield('content')
  </main>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif
  
  {{-- schedule modal --}}
  <x-ScheduleModal></x-ScheduleModal>

  <x-Modal :id="2"></x-Modal>

@include('sections.footer')
