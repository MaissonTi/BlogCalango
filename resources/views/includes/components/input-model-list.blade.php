@include('includes.datatable-lib' )

<input-dialog-list>

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
                {{-- @foreach($vendas as $venda)                                                                                
                <tr>                                                                                      
                    <td>{{$venda->id}}</td>
                    <td>{{$venda->cliente}}</td>
                    <td>{{$venda->data_venda}}</td>
                    <td>{{$venda->situacao}}</td>  
                    <td >
                        <div class="btn-center">                                                   
                            <a href="{{route('venda.edit', $venda->id )}}" class="btn bg-blue waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar">
                                    <i class="material-icons">edit</i>
                            </a>                                                        
                            <a  onclick="remove(this,'{{route('venda.destroy', $venda->id )}}')" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Excluir">
                                    <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>

</input-dialog-list>

