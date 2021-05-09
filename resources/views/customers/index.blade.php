@extends('layouts.app')
@section('content')
    <div class="card-body container">
        <div style="margin-bottom: 32px;" class="card-body">
            <form class="form-inline" action="{{ route('customers.index') }}" method="GET">
                <select style="margin-right: 20px;" name="tag_id" id="" class="form-control">
                    <option value="" selected disabled>Choose a category to filter by</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @if ($tag->id == app('request')->input('tag_id')) selected="selected" @endif>{{ $tag->tag }}</option>
                    @endforeach
                </select>
                <button style="margin-right: 10px;" type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success" href={{ route('customers.index') }}>Show All</a>
            </form>
        </div>
        <form action="#">
            <button name="send_btn" style="float: left; margin-right: 5px" type="submit"
                class="btn btn-outline-primary">Send all</button>
        </form>
        <br>
        <br>
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <table class="table">
            <tr>
                <th>
                    <form action="#"><input type="checkbox" onClick="toggle(this)"></form>
                </th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            @foreach ($customers as $customer)
                <tr>
                    <td>
                        <form action=""><input type="checkbox" name="checkbox-send" value="{{ $customer->id }}"></form>
                    </td>
                    <td>{{ $customer->username }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->tag['tag'] }}</td>
                    <td>
                        <form action="{{ route('customers.show', $customer->id) }}" method="GET">
                            @csrf
                            <input type="hidden" name="customer_username" value="{{ $customer->username }}">
                            <input type="hidden" name="customer_email" value="{{ $customer->email }}">
                            <button name="send_btn" style="float: left; margin-right: 5px" type="submit"
                                class="btn btn-outline-primary">Send</button>
                        </form>
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
