@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Категории</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('class') }}">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                      <a href="/admin/categories/create" class="btn btn-success">
                        Создать категорию
                      </a>
                    </div>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10%" scope="col">#</th>
                          <th style="width: 30%" scope="col">Имя</th>
                          <th style="width: 30%" scope="col">родительская категория</th>
                          <th style="width: 15%" scope="col"></th>
                          <th style="width: 15%" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent_id }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="/admin/categories/edit/{{ $category->id }}">редактировать</a>
                                </td>
                                <td>
                                    <form action="/admin/categories/{{ $category->id }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-xs btn-danger">
                                          удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
