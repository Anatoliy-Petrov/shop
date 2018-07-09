@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-{{ session('class') }}">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                @forelse($categories as $category)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <h4 class="flex">
                                    <a href="{{ '/categories/'.$category->id }}">
                                        {{ $category->name }}
                                    </a>
                                </h4>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="body">
                                <img class="category-image-sm" 
                                     src="{{'/img/'.$category->image }}">
                                {!! $category->description !!}
                            </div>
                            <hr>
                            <div class="level">
                                <a href="/categories/{{ $category->id }}">подробнее
                                    </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="body">
                                Пока нет добавленных категорий.
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
        
    </div>
@endsection