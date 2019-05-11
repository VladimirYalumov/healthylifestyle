@extends('layouts.app')

@section('content')
    <div  class = "container-fluid">
        <div class="row">
            <div class="col-12"><h1>Создание тренировки</h1></div>
            <div class="col-12">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    <label for="email" class="col-form-label col-md-4 col-xs-12">Количество дней для тренировок</label>

                    <div class="col-md-4 col-6">
                        <select class="form-control" id="number_days" name="days" onchange="daysWrite(this.value);">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                        </select>
                    </div>
                    <div class="col-md-10 col-xs-12" id="days">

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