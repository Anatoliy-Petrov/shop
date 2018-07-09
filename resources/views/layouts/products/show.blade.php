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

                            <div class="clear"></div>
                        </div>

                        <p>
                            <ul class="list-group">
                                @foreach($product->attributes as $attribute)
                                    <li class="list-group-item">
                                        <h3>{{ $attribute->name }}, {{ $attribute->measure }}</h3>
                                        <ul class="list-group list-group-flush">

                                            @foreach(json_decode($attribute->pivot->options_available) as $option)
                                                <li class="list-group-item">
                                                    {{ $option }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </p>
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