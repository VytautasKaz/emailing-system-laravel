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
                <th>Username</th>
                <th>E-mail</th>
                <th>Actions</th>
            </tr>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->username }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                            <a class="btn btn-success" href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('customers.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
