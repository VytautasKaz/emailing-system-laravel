@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit template:</div>
                    <div class="card-body">
                        <form action="{{ route('templates.update', $template->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label>Subject:</label>
                                <input type="text" name="subject" class="form-control" value="{{ $template->subject }}"
                                    required>
                                @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Content:</label>
                                <textarea class="form-control" name="content" id="mce" cols="30" rows="10"
                                    required>{{ $template->content }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
