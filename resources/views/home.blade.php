@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            @if(\Session::has('error'))
                <div class="alert alert-danger">
                    {{\Session::get('error')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Всякие там товары</div>


                <div class="panel-body">
                    @forelse($products as $product)
                        @include('layouts.products.product')
                    @empty
                        Все раскупили, приходите позже.
                    @endforelse
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
@endsection
