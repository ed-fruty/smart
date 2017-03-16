@extends('layouts.panel')


@section('title')
    <ol class="breadcrumb">
        <li><a href="#">Exchanges</a></li>
        <li class="active">Create a new exchange</li>
    </ol>
@endsection

@section('content')
    <form class="form-horizontal" role="form"  action="{{ route('exchange.create') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2 control-label">Name</label>

            <div class="col-md-9">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="status" class="col-md-2 control-label">Status</label>

            <div class="col-md-9">

                <select name="status" id="status" class="form-control">
                    @foreach([1 => 'Enabled', -1 => 'Disabled'] as $value => $name)
                        <option value="{{ $value }}" {{ old('status') === $value ? 'selected' : '' }} >{{ $name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="form-group">
            <hr>
            <input type="submit" value="Create" class="btn btn-block btn-info">
        </div>
    </form>
@endsection