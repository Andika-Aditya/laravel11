@props(['active' => false])
<li class="nav-item {{ $active ? 'active' : false}}" aria-current="{{ $active ? 'page' : false }}"> 
    <a {{ $attributes }} class="nav-link"> {{ $slot }} </a>
</li>