@props(['productList' => []])

@foreach ($productList as $productLists )
<div class="col-lg-3 col-sm-6">
    <div class="box">
        <div class="img-box img-prdtc">
            <img src="{{ $productLists['imgProduct'] }}"  alt="">
        </div>
        <div class="detail-box">
            <h5 class="tex-white-color">
                {{ $productLists['titleProduct'] }}
            </h5>
            <p>
                {{ $productLists['overview'] }}
            </p>
        </div>

    </div>

</div>
@endforeach

