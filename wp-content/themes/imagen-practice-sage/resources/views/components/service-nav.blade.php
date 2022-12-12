{{-- 
@if($services->have_posts())
<ul>
  @while($services->have_posts())
  @php($services->the_post())

    <li><a href="{{the_permalink()}}">{{the_title()}}</a></li>

  @endwhile
</ul>
@endif 
@php(wp_reset_postdata())

 --}}

 @if (has_nav_menu('service_navigation'))
    <nav class="nav-service flex text-sm" aria-label="{{ wp_get_nav_menu_name('service_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'service_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif