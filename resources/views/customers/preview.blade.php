@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">E-mail preview</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="">To:</label>
                                <p>{{ $_GET['customer_email'] }}</p>
                            </div>
                            <div class="form-group">
                                <label>Subject:</label><br>
                                @foreach ($templates as $template)
                                    @if ($template->id == $_GET['template_id'])
                                        <input type="text" value="{{ $template->subject }}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group">
                                @foreach ($templates as $template)
                                    @if ($template->id == $_GET['template_id'])
                                        <textarea style="width: 100%;" name="" id="mce" cols="30"
                                            rows="10"><p>Hello, {{ $_GET['customer_username'] }}!</p><br> {{ $template->content }}</textarea>
                                    @endif
                                @endforeach
                            </div>
                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
