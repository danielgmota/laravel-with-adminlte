@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
<h1>Saldo</h1>

<ol class="breadcrumb">
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Saldo</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="#" class="btn btn-primary">Recarregar</a>
        <a href="#" class="btn btn-danger">Sacar</a>
    </div>
    <div class="box-body">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ number_format($amount, 2, ',','.') }} <sup style="font-size:20px">%</sup></h3>
                <p>aaaa</p>
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@stop