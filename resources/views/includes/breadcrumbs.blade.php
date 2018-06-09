@push('css')
    <style>
        .breadcrumb{
        margin-bottom: 0px !important;
        padding-top: 15px;
        margin: 0px 2%;
        border-bottom: 1px solid #eaeaea;
        }
    </style>
@endpush

<ol class="breadcrumb breadcrumb-col-blue">

    @foreach ($itens as $key => $value)  
    
        @if ( $value['rota'] )
            <li class="active"><a href="{{ route($value['rota']) }}" ><i class="material-icons">{{$value['icon']}}</i> {{$key}}</a></li>        
        @else
            <li ><i class="material-icons">{{$value['icon']}}</i> {{ $key }}</li>            
        @endif
    
    @endforeach


</ol>