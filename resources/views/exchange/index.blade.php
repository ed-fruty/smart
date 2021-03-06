@extends('layouts.panel')

@section('title')
    Exchanges
@endsection

@section('content')
    <a href="{{ route('exchange.create') }}" class="btn btn-block btn-info">Create a new exchange</a>
    <hr>
    @if($collection->isEmpty())
        <div class="alert alert-warning">
            No exchanges was found.
        </div>
    @else
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Connector</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($collection as $exchange)
                    <tr>
                        <td> {{ $exchange->id }}</td>
                        <td> {{ $exchange->name }}</td>
                        <td> {{ $exchange->status->getName() }}</td>
                        <td> {{ $exchange->connector }}</td>
                        <td> {{ $exchange->created_at }}</td>
                        <td> {{ $exchange->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('exchange.edit', $exchange->id)  }}" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-info">Devices</a>
                                <form action="{{ route('exchange.delete', $exchange->id) }}">

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection