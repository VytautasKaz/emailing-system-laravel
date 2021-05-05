@extends('layouts.app')
@section('content')
    <div class="card-body container">
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <table class="table">
            <tr>
                <th>Subject</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
            @foreach ($templates as $template)
                <tr>
                    <td>{{ $template->subject }}</td>
                    <td>{{ $template->content }}</td>
                    <td>
                        <form action="{{ route('templates.destroy', $template->id) }}" method="POST">
                            <a class="btn btn-success" href="{{ route('templates.edit', $template->id) }}">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('templates.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
