@extends('adminlte::page')

@section('title', 'Nova Transferência')

@section('content_header')
<h1>Fazer Transferência</h1>

<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Saldo</a></li>
    <li><a href="">Transferencia</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3>Transferir saldo (recebedor)</h3>
    </div>
    <div class="box-body">
        @include('admin.includes.alerts')

        <form method="POST" action="{{ route('transfer.store')}}">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" name="sender" placeholder="Quem ira receber" class="form-control"
                    value="eu@danielmota.com.br">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Próximo</button>
            </div>
        </form>
    </div>
</div>
@stop