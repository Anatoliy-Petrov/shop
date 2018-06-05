@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            {{ $category->name }}
                        </h4>
                    </div>

                    <div class="panel-body">
                        <div class="body">
                            <img class="category-image-lg" src="{{ asset('img/'.$category->image) }}">
                            {!! $category->description !!}
                        </div>
                    </div>
                </div>

                @if(isset($childCategories))
                    @forelse($childCategories as $childCategory)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5>
                                    <a href="{{ '/categories/'.$childCategory->id }}">
                                        {{ $childCategory->name }}
                                    </a>
                                </h5>
                            </div>

                            <div class="panel-body">
                                <div class="body">
                                    {{ substr($childCategory->description, 0, 100) }}
                                </div>
                            </div>
                        </div>
                    @empty
                        нет категорий в этой категории
                    @endforelse 
                @else
                    <div class="row">
                        @forelse($products as $product)
                            @include('layouts.products.product')
                        @empty
                            нет товаров в этой категории
                        @endforelse
                    </div> 
                @endif
            </div>
        </div>        
    </div>
@endsection