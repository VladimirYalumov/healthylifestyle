@extends('layouts.app')

@section('content')
<div  class = "container-fluid">
    <div class="row bg-white">
        <h1 class="col-12">Личный кабинет</h1>

        <div class="col-12">
            @if (session('status'))
                <div>
                    {{ session('status') }}
                </div>
            @endif
            @if (Auth::user()->hasRole('coach'))
                <div>
                    <a href="{{route('coach')}}">Создать программу</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
