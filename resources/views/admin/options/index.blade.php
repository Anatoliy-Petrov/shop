@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Опции</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('class') }}">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="btn-group">
                      <a href="/admin/attributes/create" class="btn btn-sm btn-success">
                        Создать опцию
                      </a>
                    </div>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10%" scope="col">#</th>
                          <th style="width: 25%" scope="col">Значение</th>
                          <th style="width: 25%" scope="col">Атрибут</th>
                          <th style="width: 15%" scope="col"></th>
                          <th style="width: 15%" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($options as $option)
                            <tr>
                                <th scope="row">{{ $option->id}}</th>
                                <td>{{ $option->value }}</td>
                                <td>{{ $option->attribute->name }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="/admin/attributes/edit/{{ $option->id }}">редактировать</a>
                                </td>
                                <td>
                                    <form action="/admin/attributes/{{ $option->id }}"
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
                          Нет ни одной опции
                        @endforelse
                      </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
