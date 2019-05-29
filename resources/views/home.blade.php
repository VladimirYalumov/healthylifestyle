@extends('layouts.app')

@section('content')
<div  class = "container-fluid">
    <div class="row bg-white">
        <h1 class="col-12">
            @lang('content.home_h')
            @if (Auth::user()->hasRole('coach'))(admin)@endif
        </h1>

        <div class="col-12">
            @if (session('status'))
                <div>
                    {{ session('status') }}
                </div>
            @endif
            @if (Auth::user()->hasRole('coach'))
                <div>
                    <a href="{{route('coach')}}">@lang('content.coach_create_ht')</a>
                </div>
            @endif
        </div>
        <div class="container-fluid row p-3">
            @if(Auth::user()->program_id != NULL)
                @if($exercises == NULL)
                    <div class="col-12">
                        <p>Сегодня тренировок нет. Ток ты это смотри мне чтоб там пироженками не увлекался</p>
                    </div>
                @else
                    <div class="col-12">
                    <p>Сегодня тренировка начнётся в {{$time}}</p>
                    <p>Вот что тебе надо сделать</p>
                    </div>
                <div class="col-md-9 col-xs-12 container-fluid">
                @foreach($exercises as $exercise)
                    <div class="col-12 border border-secondary">
                        <p class="font-weight-bold">{{$exercise['name']}}</p>
                        <p>Количество раз за подход - {{$exercise['number']}}</p>
                        <p>Количество подходов - {{$exercise['appreaches']}}</p>
                    </div>
                @endforeach
                </div>
                <div class="col-md-3 col-xs-12 container-fluid">
                    <p>Сообщение от тренера</p>
                    <p>{{$message}}</p>
                </div>
                @endif
            @else
                <p>Вы не выбрали программу</p>
            @endif
        </div>
    </div>
</div>
@endsection
