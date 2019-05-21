@extends('layouts.app')

@section('content')
    <div  class = "container-fluid">
        <div class="row bg-white">
            <h1 class="col-12">Список программ</h1>
            <div class="list-group">
                <ul class="list-group-item">
                @foreach ($programs as $program)
                    <li class="list-group-item">
                        <button class="list-group-item list-group-item-action list-group-item-secondary" data-toggle="modal" data-target="#myModal">{{ $program->name }}</button>
                        <p>{{ $program->message }}</p>
                    </li>
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
                            <div class="modal-body">
                                <p>Вы уверены что хотите закрепить эту программу в своём личном кабинете?</p>
                                <p>После выбора данной программы в вашем ЛК появятся новые упражнения</p>
                                <p>Вы сможете сменить программу в любой момент</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                <form method="POST" action="{{ route('register') }}">
                                    <button type="submit" class="btn btn btn-dark">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
