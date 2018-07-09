@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Пользователи</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('class') }}">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10%" scope="col">#</th>
                          <th style="width: 30%" scope="col">Имя</th>
                          <th style="width: 30%" scope="col">email</th>
                          <th style="width: 15%" scope="col"></th>
                          <th style="width: 15%" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->isAdmin == 1)
                                      <form action="/admin/user/down/{{ $user->id }}" method="POST">
                                          {{ csrf_field() }}
                                          <button type="submit" class="btn btn-xs btn-default" 
                                            @if(auth()->user()->id == $user->id)
                                              disabled
                                            @endif>
                                            понизить права
                                          </button>
                                      </form>
                                    @else
                                      <form action="/admin/user/up/{{ $user->id }}" method="POST">
                                          {{ csrf_field() }}
                                          <button type="submit" class="btn btn-xs btn-default">
                                            сделать админом
                                          </button>
                                      </form>
                                    @endif
                                    
                                </td>
                                <td>
                                    <form action="/admin/user/{{ $user->id }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-xs btn-danger" 
                                            @if(auth()->user()->id == $user->id)
                                              disabled
                                            @endif 
                                        >
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
