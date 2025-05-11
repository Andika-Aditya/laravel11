@props(['topProduct' => []])
@foreach ($topProduct as $topProducts)
<div class="item">
    <div class="box">
        <div class="img-box">
        <img src="{{ $topProducts['imgProduct'] }}" alt="" class="box-img">
        </div>
        <div class="detail-box">
        <div class="client_id">
            <div class="client_info" style="justify-content: center;">
                <h6>
                    {{ $topProducts['titleProduct'] }}
                </h6>
                <p>
                    "{{ $topProducts['overview'] }}"
                </p>
            </div>
        </div>
        <p>
            {{ $topProducts['descriptionProduct'] }}
        </p>
        </div>
    </div>
    </div>
@endforeach
