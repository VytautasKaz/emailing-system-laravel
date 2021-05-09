@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">E-mail preview</div>
                    <div class="card-body">
                        <form action="{{ route('test-email') }}" method="GET">
                            @csrf
                            <input type="hidden" name="customer_username" value="{{ $_GET['customer_username'] }}">
                            <input type="hidden" name="customer_email" value="{{ $_GET['customer_email'] }}">
                            <div class="form-group">
                                <label for="">To:</label>
                                <p>{{ $_GET['customer_email'] }}</p>
                            </div>
                            <div class="form-group">
                                <label>Subject:</label><br>
                                @foreach ($templates as $template)
                                    @if ($template->id == $_GET['template_id'])
                                        <input style="width: 100%;" name="email_subject" type="text"
                                            value="{{ $template->subject }}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group">
                                @foreach ($templates as $template)
                                    @if ($template->id == $_GET['template_id'])
                                        <textarea style="width: 100%;" name="email_content" id="mce" cols="30"
                                            rows="10"><p>Hello, {{ $_GET['customer_username'] }}!</p><br> {{ $template->content }}</textarea>
                                    @endif
                                @endforeach
                            </div>
                            @empty(!$_GET['email_hours'] || !$_GET['email_date'])
                                <div class="form-group">
                                    <p>E-mail to be sent:</p>
                                    @empty(!$_GET['email_hours'])
                                        <p>At {{ $_GET['email_hours'] }}</p>
                                    @endempty
                                    @empty(!$_GET['email_date'])
                                        <p>On {{ $_GET['email_date'] }} </p>
                                    @endempty
                                </div>
                            @endempty
                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
