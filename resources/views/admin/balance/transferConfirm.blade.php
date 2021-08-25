@extends('adminlte::page')

@section('title', 'Nova Transferência')

@section('content_header')
<h1>Fazer Transferência</h1>

<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Saldo</a></li>
    <li><a href="">Transferencia</a></li>
    <li><a href="">Confirmação</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3>Transferir saldo (confirmação)</h3>
    </div>
    <div class="box-body">
        @include('admin.includes.alerts')

        <form method="POST" action="{{ route('transfer.confirm')}}">
            {!! csrf_field() !!}

            <div class="form-group">
                <h4>
                    <b>Saldo Atual: </b> {{number_format($balance->amount, 2, ',','.')}}
                </h4>
                <p>
                    <b>Nome recebedor: </b> {{$sender->name}}
                </p>
                <p>
                    <b>Email recebedor: </b> {{$sender->email}}
                </p>
                <input type="hidden" name="sender_id" value="{{$sender->id}}">
                <input type="text" name="value" placeholder="Valor" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Transferir</button>
            </div>
        </form>
    </div>
</div>
@stop