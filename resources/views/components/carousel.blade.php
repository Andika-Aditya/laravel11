@props(['carousels' => []])          

@foreach ( $carousels as $index => $carousel )
<div class="carousel-item {{ $index == 0 ? 'active' : false }}">
    <div class="container ">
        <div class="row">
        <div class="col-md-6 ">
            <div class="detail-box">
            <h1>
                {{ $carousel['title'] }} <br>
                {{ $carousel['subtitle'] }}
            </h1>
            <p>
                {{ $carousel['description'] }}
            </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="img-box">
            <img src="{{ $carousel['imageCarousel'] }}" alt="">
            </div>
        </div>
        </div>
    </div>
</div>
@endforeach