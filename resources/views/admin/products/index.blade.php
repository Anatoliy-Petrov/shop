@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Товары</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('class') }}">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                      <a href="/admin/product/create" class="btn btn-success">
                        Создать товар
                      </a>
                    </div>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10%" scope="col">#</th>
                          <th style="width: 25%" scope="col">Имя</th>
                          <th style="width: 25%" scope="col">Категория</th>
                          <th style="width: 10%" scope="col">Цена</th>
                          <th style="width: 15%" scope="col"></th>
                          <th style="width: 15%" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id}}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="/admin/product/edit/{{ $product->id }}">редактировать</a>
                                </td>
                                <td>
                                    <form action="/admin/product/{{ $product->id }}" 
                                          method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-xs btn-danger">
                                          удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            
                        @empty
                          Нет ни одного товара
                        @endforelse
                      </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
