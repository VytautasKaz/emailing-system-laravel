@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div style="text-align: center" class="col-md-8">
                <h1>Welcome!</h1><br>
                @if (Auth::guest())
                    <p><strong>Log in to access app's features!</strong></p>
                @endif
            </div>
        </div>
    </div>
@endsection
