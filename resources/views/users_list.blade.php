@extends('layouts.app')

@section('content')
    <div  class = "container-fluid">
        <div class="row bg-white">
            <table class="table table-hover">
                <div class="col-12">
                    <form class="form-horizontal" method="POST" action="{{ route('delete_user') }}">
                        @csrf
                        <label for="delete" class="col-form-label col-md-6 col-12">Введите id пользователь, которого хотите удалить</label>
                        <div class="col-md-6 col-12">
                            <input class="form-control" id="delete" name="id" type="number">
                        </div>
                        <div class="col-12 p-3">
                            <button type="submit" class="btn btn-dark ">Удалить</button>
                        </div>
                    </form>
                </div>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Program id</th>
                        <th>Created at</th>
                        <th>Sex</th>
                    </tr>
                </thead>
                @foreach($users as $key => $user)
                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->program_id}}</th>
                        <th>{{$user->created_at}}</th>
                        <th>{{$user->sex}}</th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection