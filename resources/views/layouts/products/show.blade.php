@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            {{ $product->name }}
                        </h4>
                        price: {{ $product->price }} грн.
                    </div>

                    <div class="panel-body">
                        <div class="body">
                            <img class="category-image-lg" src="{{ asset('img/'.$product->image) }}">
                            {!! $product->description !!}
                        </div>
                    </div>
                    <div class="panel-footer">
                        @foreach($product->images as $image)
                            @include('layouts.products.image')
                        @endforeach
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection