@extends('layouts.app')

@section('content')
    <div  class = "container-fluid">
        <div class="row bg-white">
            <h1 class="col-12">@lang('content.main_h')</h1>
            <div class="col-12 col-sm-7">
                @lang('content.main')
            </div>
            <div class="col-12 col-sm-5">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A2cb1c7cb1ba5107c8716b268ba0eefbc927080eb9589c65d7b91fc8766f5b669&amp;source=constructor" class="col-12" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </div>
@endsection