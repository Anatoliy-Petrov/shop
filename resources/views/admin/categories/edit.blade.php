@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>редактирование категории</h3></div>
                    <div class="panel-body">
                        @include('layouts.error')
                        <form action="/admin/categories/{{ $category->id }}" enctype="multipart/form-data" method="post">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Название категории: </label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ $category->name }}" placeholder="Введите название категории">
                            </div>
                            @if($category->parent_id)
                                <div class="form-group">
                                    <label for="parent">Родительская категория: </label>
                                    <select name="parent" class="form-control">
                                        <option value="" disabled>выберите категорию</option>
                                        @foreach($rootCategories as $rootCategory)
                                            <option value="{{ $rootCategory->id }}" 
                                                @if($rootCategory->id == $category->parent_id)
                                                    selected
                                                @endif
                                            >
                                                {{ $rootCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            
                            <div class="form-group">
                                <label for="description">описание: </label>
                                <textarea name="description" class="form-control" placeholder="введите описание">{{ $category->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <img class="product-image-lg" src="{{ asset('/img/'.$category->image) }}">
                            </div>
                            <div class="form-group">
                                <label for="image">выберите изображение</label>
                                <input type="file" class="filestyle" name="image">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>
@endsection