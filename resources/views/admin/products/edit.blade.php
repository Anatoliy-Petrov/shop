@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>редактирование товара</h3></div>

                    <div class="panel-body">
                        @include('layouts.error')
                        <form action="/admin/product/{{ $product->id }}" enctype="multipart/form-data" method="post">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Название товара: </label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ $product->name }}" placeholder="Введите название товара">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Категория: </label>
                                <select name="category_id" class="form-control">
                                    <option value="">выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            @if($category->id == $product->category_id)
                                                selected
                                            @endif
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Цена: </label>
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}" placeholder="Введите цену">
                            </div>
                            <div class="form-group">
                                <label for="description">описание: </label>
                                <textarea name="description" class="form-control" placeholder="введите описание">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <img class="product-image-lg" src="/img/{{  $product->image }}">
                            </div>
                            <div class="form-group">
                                <label for="image">выберите титульное изображение</label>
                                <input type="file" class="filestyle" name="image">
                            </div>
                            <hr>
                            <div class="form-group">
                                @foreach($images as $image)
                                    @include('admin.products.image')
                                @endforeach
                            </div>
                            <div class="clear"></div>
                            
                            <hr>
                            <div class="form-group">
                                <label for="gal_image">выберите изображение для галереи</label>
                                <input type="file" class="filestyle" name="gal_image">
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