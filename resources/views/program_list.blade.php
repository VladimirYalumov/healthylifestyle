@extends('layouts.app')

@section('content')
    <div  class = "container-fluid">
        <div class="row bg-white">
            <h1 class="col-12">@lang('content.programs_h')</h1>
            <div class="list-group">
                <ul class="list-group-item">
                @foreach ($programs as $program)
                    <li class="list-group-item">
                        <button class="list-group-item list-group-item-action list-group-item-secondary" data-toggle="modal" data-target="#myModal" onclick="daysWrite({{ $program->days }} - 1, {{ $program->id }})">{{ $program->name }}</button>
                        <div style="padding: 5px;">
                            <p>{{ $program->message }}</p>
                            <p style="font-weight: 600;">Кол-во дней необходимых для тренировки в неделю - {{ $program->days }}</p>
                        </div>
                    </li>
                    <br>
                @endforeach
                </ul>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Выбрать программу</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form" method="GET" action="{{route('home')}}" onsubmit="checkRepeats(); return false;">
                            <div class="modal-body">
                                <div>
                                    <p>Вы уверены что хотите закрепить эту программу в своём личном кабинете?</p>
                                    <p>После выбора данной программы в вашем ЛК появятся новые упражнения. Вы сможете сменить программу в любой момент</p>
                                    <p>Выбирите дни в которые вы хотите тренироваться, а также время в которое вам удубно начать тренировку</p>
                                </div>
                                <div id="days">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn btn-dark">Выбрать</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/check_days_script.js"></script>
@endsection
