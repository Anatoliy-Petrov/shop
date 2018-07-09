<div class="product col-sm-6 col-md-4 col-lg-3">
    <a href="/product/{{ $product->id }}">
        <img src="{{ asset('/img/'.$product->image) }}">
    </a>
    <div class="well">
        <strong>{{ $product->name }}</strong>
        <br>
        price: {{ $product->price}}
    </div>
</div>
