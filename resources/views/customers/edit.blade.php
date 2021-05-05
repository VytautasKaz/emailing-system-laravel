@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit customer:</div>
                    <div class="card-body">
                        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="username" class="form-control" value="{{ $customer->username }}"
                                    required>
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="email" name="email" class="form-control" value="{{ $customer->email }}"
                                    required>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category:</label>
                                <select name="tag_id" class="form-control">
                                    <option value="" selected>Select a category</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" @if ($tag->id == $customer->tag_id) selected="selected" @endif>
                                            {{ $tag->tag }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
