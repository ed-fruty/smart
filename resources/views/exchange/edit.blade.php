<?php
/**
 * @var \Fruty\SmartHome\Common\Status\Status $status
 * @var \Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface $exchange
 * @var \Illuminate\Support\ViewErrorBag $errors
 * @var \Fruty\SmartHome\Exchange\Concern\Connections\ConnectorAggregate $exchangeConnectorAggregate
 */
?>

@extends('layouts.panel')


@section('title')
    <ol class="breadcrumb">
        <li><a href="{{ route('exchange.index') }}">Exchanges</a></li>
        <li class="active">Edit exchange "{{ $exchange->getName() }}"</li>
    </ol>
@endsection

@section('content')
    <form class="form-horizontal" role="form"  action="{{ route('exchange.update', $exchange->getId()) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2 control-label">Name</label>

            <div class="col-md-9">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?: $exchange->getName() }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('connector') ? ' has-error' : '' }}">
            <label for="connector" class="col-md-2 control-label">Connection type</label>
            <div class="col-md-9">
                <select name="connector" id="connector" class="form-control">
                    @foreach($exchangeConnectorAggregate->getConnectors() as $connector)
                        <option value="{{ $connector->getName() }}"
                                {{ old('connector') === $connector->getName() || $exchange->getConnectorName() === $connector->getName() ? 'selected' : '' }}
                        >{{ $connector->getName() }}</option>
                    @endforeach
                </select>
                @if ($errors->has('connector'))
                    <span class="help-block">
                        <strong>{{ $errors->first('connector') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('dsn') ? ' has-error' : '' }}">
            <label for="dsn" class="col-md-2 control-label">DSN</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="dsn" name="dsn" value="{{ old('dsn') ?: $exchange->getDsn() }}">
                @if ($errors->has('dsn'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dsn') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status" class="col-md-2 control-label">Status</label>
            <div class="col-md-9">
                <select name="status" id="status" class="form-control">
                    @foreach($status->dropDown() as $value => $name)
                        <option value="{{ $value }}" {{ old('status') === $value || $exchange->getStatus()->getValue() === $value ? 'selected' : '' }} >{{ $name }}</option>
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
            <input type="submit" value="Update" class="btn btn-block btn-info">
        </div>
    </form>
@endsection