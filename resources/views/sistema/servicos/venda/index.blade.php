@extends('layouts.app')

@include('includes.datatable-lib' )
@include('includes.dialog-remove')

@section('content')

@include('includes.alert-shap')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        @include('includes.breadcrumbs',             
                        [ 'itens' => [ 'Home'          => array( 'rota' => 'home', 'icon' => 'home' ),
                                       'Minhas Vendas' => array( 'rota' => '', 'icon' => 'format_list_bulleted' ) ]                                     
                        ])

                        <div class="header">
                            <h2>
                                <b>Vendas</b>
                            </h2>
                            <ul class="header-dropdown btn-add">
                                <li class="dropdown">
                                    <a href="{{route('venda.create')}}" class="btn bg-blue waves-effect">
                                        <i class="material-icons">shopping_cart</i> 
                                        <span>Nova Venda</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable jsDataTable">
                                    <thead>
                                        <tr>                                            
                                            <th>Numero</th>
                                            <th>Cliente</th>
                                            <th>Data da Venda</th>
                                            <th>Situação</th>
                                            <th style="width: 100px;"> <center>Ação</center>  </th>                                           
                                        </tr>
                                    </thead>                                   
                                    <tbody> 
                                        @foreach($vendas as $venda)                                                                                
                                        <tr>                                                                                      
                                            <td>{{$venda->id}}</td>
                                            <td>{{$venda->cliente->nome}}</td>
                                            <td>{{$venda->validade}}</td>
                                            <td>{{$venda->situacao}}</td>  
                                            <td >

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="glyphicon glyphicon-th"></i>
                                                        Opções <span class="caret"></span>                                                        
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-ajust" style="margin-top: 0px !important">
                                                         <li><a href="javascript:void(0);"> <i class="material-icons">edit</i> Editar</a></li>
                                                        <li><a href="javascript:void(0);"> <i class="material-icons">delete</i> Deletar</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a href="javascript:void(0);"> <i class="material-icons">print</i>Orçamento</a></li>                                                      
                                                        <li role="separator" class="divider"></li>
                                                        <li><a href="javascript:void(0);"> <i class="material-icons">note</i> Iniciar O.S.</a></li>
                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection


@push('js')
    <script>        
        $(document).ready(function(){    
                $('[data-toggle="tooltip"]').tooltip(); 
        });
    </script> 
@endpush





