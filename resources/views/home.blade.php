@extends('layouts.app')

@section('content')
<div class="container">

        <div>
            <div class="card">
                <div>Dashboard</div>

                <div>
                    @if (session('status'))
                        <div>
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>You are logged in!</p>
                </div>
            </div>
        </div>
</div>
@endsection
