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
                        <td> {{ $exchange->getId() }}</td>
                        <td> {{ $exchange->getName() }}</td>
                        <td> {{ $exchange->getStatus()->getName() }}</td>
                        <td> {{ $exchange->getConnectorName() }}</td>
                        <td> {{ $exchange->getCreatedAt() }}</td>
                        <td> {{ $exchange->getUpdatedAt() }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('exchange.edit', $exchange->getId()->getId())  }}" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-info">Devices</a>
                                <form action="{{ route('exchange.delete', $exchange->getId()->getId()) }}">

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection