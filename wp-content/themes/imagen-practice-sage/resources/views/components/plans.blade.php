<div class="page-section relative">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <div class="relative mx-auto z-10">
        <div class="content-center">
          <div class="p-6 text-center">
            <h2 class="{{$tw['h2']}}">{!! $title !!}</h2>
            @if($description)
              <p class="mb-6 formatted">{!! $description !!}</p>
            @endif
          </div>
        </div>
      </div>
    </div>
      
    {{-- q and a --}}
    <div class="xl:col-span-8 xl:col-start-3 col-span-12">
      <div class="relative mx-auto z-10 pb-6">
        <table class="table-auto mb-10 w-full border-collapse">
          <tr>
            <th class="p-3 text-sm uppercase p-3 bg-light text-left">PRODUCTS AND SERVICES</th>
            @foreach($plans as $plan)
            <th class="text-center text-sm uppercase p-3 bg-light">{{$plan['title']}}</th>
            @endforeach()
          </tr>
          <tr>
            <td class="p-3">Cost</td>
            @foreach($plans as $plan)
            <td class="text-center text-primary p-3">{{$plan['price']}}</td>
            @endforeach()
          </tr>

          @php($toggle = 1)
          @foreach($choices as $value => $label)
          <tr class="{{ ($toggle) ? 'bg-light' : '' }}">
            <td class="p-3">{{$label}}</td>
            @foreach($plans as $plan)
            <td class="text-center p-3">
              @if(in_array($label, $plan['benefits']))
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="15" class="inline"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path class="fill-primary" d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
              @endif()
            </td>
            @php($toggle = !$toggle)
            @endforeach() 
          </tr>
          @endforeach()
        </table>
      </div>
    </div>
      
    {{-- plans --}}
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      @foreach($plans as $plan)
      <div class="bg-primary-light p-10 mb-10 relative">
        @if($plan['snipe']['text'])
          <div class="snipe absolute left-0 top-0 uppercase text-sm p-2 font-medium {{ (!$plan['snipe']['hex']) ? 'bg-accent' : ''}}" style="{{ ($plan['snipe']['hex']) ? 'background-color:'.$$plan['snipe']['hex'] : ''}}">{!! $plan['snipe']['icon'] !!} {{$plan['snipe']['text']}}</div>
        @endif
        <h2 class="{{$tw['h2']}} {{($plan['snipe']['text']) ? 'mt-6':''}}">{!! $plan['title'] !!}</h2>
        <div class="mb-6">{!! $plan['description'] !!}</div>

        <h3 class="{{$tw['h3']}}">{!! $plan['price'] !!}</h2>
        <p class="text-primary mb-6">{!! $plan['frequency'] !!}</p>

        <button data-micromodal-trigger="modal-member" class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white min-w-[160px] h-10 mt-6 bg-primary"> 
          <span class="uppercase">Learn More</span>
        </button>
      </div>
      @endforeach()
    </div>
  </div>
</div>

{{-- membershipt modal --}}
<x-MembershipModal></x-MembershipModal>

