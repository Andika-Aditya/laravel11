 @props(['active' => false])
 
<li class="nav-item " aria-current="{{ $active ? 'page' : false }}">
    <a {{ $attributes }} class="nav-link {{ $active ? 'active' : false}}">
        {{ $slot }}
    </a>
</li>