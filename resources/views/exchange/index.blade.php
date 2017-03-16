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
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($collection as $exchange)
                    <tr>
                        <td> {{ $exchange->getId() }}</td>
                        <td> {{ $exchange->getName() }}</td>
                        <td> {{ $exchange->getStatus() }}</td>
                        <td> {{ $exchange->getType()->getName() }}</td>
                        <td> {{ $exchange->getCreatedAt() }}</td>
                        <td> {{ $exchange->getUpdatedAt() }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-default">Edit</a>
                                <a href="#" class="btn btn-default">Devices</a>
                                <a href="#" class="btn btn-default">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection