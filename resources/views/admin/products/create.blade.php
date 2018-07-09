@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>создание товара</h3></div>

                    <div class="panel-body">
                        @include('layouts.error')
                        <form action="/admin/product" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <product-create-form :attributes="{{ $categories }}"></product-create-form>
                            {{--<div class="form-group">--}}
                                {{--<label for="title">Название товара: </label>--}}
                                {{--<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Введите название товара">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="category">Категория: </label>--}}
                                {{--<select name="category" class="form-control" id="categoriesList" v-on:change="getAttributes">--}}
                                    {{--<option value="">выберите категорию</option>--}}
                                    {{--@foreach($categories as $category)--}}
                                        {{--<option value="{{ $category->id }}">--}}
                                            {{--{{ $category->name }}--}}
                                        {{--</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            {{--<div class="form-group" v-text="categoryId"></div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="title">Цена: </label>--}}
                                {{--<input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Введите цену">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="description">описание: </label>--}}
                                {{--<textarea name="description" class="form-control" placeholder="введите описание">{{ old('description') }}</textarea>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<h4>Добавление атрибутов</h4>--}}
                            {{--</div>--}}
                            {{--<div class="form-group" v-for="(catAttribute, index) in catAttributes">--}}
                                {{--<label v-text="catAttribute.name"></label>--}}
                                {{--<select :name="catAttribute.name" class="form-control">--}}
                                    {{--<option :value="option.value" v-for="(option, index) in catAttribute.options" v-html="option.value"></option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="image">выберите изображение</label>--}}
                                {{--<input type="file" class="filestyle" name="image">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<button type="submit" class="btn btn-primary">сохранить</button>--}}
                            {{--</div>--}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script> -->
    {{--<script src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>--}}

    <!-- <script>
        CKEDITOR.replace('editor');
    </script> -->
@endsection