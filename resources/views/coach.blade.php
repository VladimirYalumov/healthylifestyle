@extends('layouts.app')

@section('content')
    <div  class = "container-fluid">
        <div class="row bg-white">
            <div class="col-12"><h1>Создание программы тренировок</h1></div>
            <div class="col-12">
                <form class="form-horizontal" method="GET" action="{{ route('createprogramm') }}">
                    <label for="name" class="col-form-label col-md-4 col-xs-12">Название тренировки</label>
                    <div class="col-md-6 col-6">
                        <input class="form-control col-md-6 col-xs-12" type="text" value="Название тренировки" id="name" name = "name">
                    </div>
                    <label for="message" class="col-form-label col-12">Комментарий для тех кто выберет данную программу</label>
                    <div class="form-group col-md-6 col-12">
                        <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                    </div>
                    <label for="number_days" class="col-form-label col-md-4 col-xs-12">Количество дней для тренировок</label>

                    <div class="col-md-4 col-6">
                        <select class="form-control" id="number_days" name="days" onchange="daysWrite(this.value);">
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                        </select>
                    </div>
                    <div class="col-12" id="days">

                    </div>
                    <div class="col-md-2 col-xs-12 p-3">
                        <button type="submit" class="btn btn-dark ">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/form_script.js"></script>


@endsection