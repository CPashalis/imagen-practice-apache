
@if( have_rows('members') )
  @while( have_rows('members') )
  @php(the_row()) 
  <x-MemberModal></x-MemberModal>
  @endwhile
@endif

