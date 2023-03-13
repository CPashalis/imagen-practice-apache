@if($isSchedule && $isSchedule[0] == 'yes')
  <button data-micromodal-trigger="modal-schedule" class="{{$heroClass}} whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-left"> 
  @if($btnIcon)
      {!! $btnIcon !!}
    @endif
    <span class="uppercase">Schedule<br/>Appointment</span>
  </button>
@elseif($isSchedule && $isSchedule[0] == 'no')
<a href="{{ $btnURL }}" target="_blank" class="{{$heroClass}} btn whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white"> 
    @if($btnIcon)
      {!! $btnIcon !!}
    @endif
    <span class="uppercase">{!! $btnLabel !!}</span>
  </a>
@elseif($isCall && $isCall[0] == 'yes')
<a href="tel:{{$phone}}" data-micromodal-trigger="modal-schedule" class="{{$heroClass}} whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-left"> 
@if($btnIcon)
      {!! $btnIcon !!}
    @endif
  <span class="uppercase">Call Now</span>
</a>
@else
  <a href="{{ $btnURL }}" class="{{$heroClass}} btn whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white"> 
    @if($btnIcon)
      {!! $btnIcon !!}
    @endif
    <span class="uppercase">{!! $btnLabel !!}</span>
  </a>
@endif