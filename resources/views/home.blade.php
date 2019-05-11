@extends('layouts.app')

@section('content')
<div>
    <h1>Личный кабинет</h1>

    <div>
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
@endsection
