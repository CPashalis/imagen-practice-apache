
<?php if($columnLayout == "text"){
  $columnOrder = "row-start-1";
}
?>
<div class="col-span-{{$column1}} <?php echo $columnOrder ?>">
    <div class="{{ $align }} {{($bg) ? 'p-6':'py-6 md:p-6'}}">
        <h3 class="{{$tw['h3']}}">{!! $title !!}</h3>
        <div class="mb-6 formatted">{!! $description !!}</div>

        @if(!empty($buttons))
        @foreach($buttons as $button)
        <x-Button :btnIcon="$button['button_icon']" :btnLabel="$button['button_label']" :btnURL="$button['button_url']"></x-Button>
        @endforeach
        @endif
    </div>
</div>