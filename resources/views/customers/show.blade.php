@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Send an e-mail to:</div>
                    <div class="card-body">
                        <form action="" method="GET">
                            @csrf
                            <input type="hidden" name="customer_username" value="{{ $customer->username }}">
                            <input type="hidden" name="customer_email" value="{{ $customer->email }}">
                            <div class="form-group">
                                <label for="">Username:</label>
                                <p>{{ $customer->username }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">E-mail:</label>
                                <p>{{ $customer->email }}</p>
                            </div>
                            <div class="form-group">
                                <label>Subject:</label>
                                <select name="template_id" class="form-control" required>
                                    <option value="" disabled selected>Select a subject</option>
                                    @foreach ($templates as $template)
                                        <option value="{{ $template->id }}">
                                            {{ $template->subject }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Preview</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
