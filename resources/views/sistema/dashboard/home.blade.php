@extends('layouts.app')

@section('content')

<div class="block-header">
    <h2>DASHBOARD</h2>
</div>

<div class="row clearfix">
    @include('includes.infobox', 
    [ 'rota' => 'cliente.index', 'type' => 'info-box', 
    'color' => 'bg-deep-purple', 'icon' => 'person_add', 'titulo' => 'CLIENTES',
    'number' => $cliente ]
    )
</div>



@endsection