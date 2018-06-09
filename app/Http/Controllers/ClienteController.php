<?php

namespace App\Http\Controllers;

use App\Model\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    private $cliente;

    public function __construct(Cliente $cliente )
    {       
        $this->cliente = $cliente;
    }

    public function index()
    {
        $clientes = $this->cliente->all();
        
        return view('sistema.cadastro.cliente.index', compact('clientes'));        
    }


    public function create()
    {
       return view('sistema.cadastro.cliente.form');
    }


    public function store(Request $request)
    {
        try{

            $dadosForm = $request->all();

            $validate = validator($dadosForm, $this->cliente->rules, $this->cliente->messages);
            if( $validate->fails() ){
                return redirect()
                    ->route('cliente.create')
                    ->withErrors($validate)
                    ->withInput();
            }
              
            $insert =  $this->cliente->create( $dadosForm );
    
            if ($insert) 
                return redirect()->route('cliente.index')->with('success', 'Registro criado com sucesso!');
            else
                return redirect()->back();
        
        } catch (\Exception $e) {            
            
            return redirect()->route('cliente.index')->with('error',  $e->getMessage() );

        }


    }

    //search
    public function show(Request $request)
    {
        //Pega os dados do formulário
        /*$dataForm = $request->except('_token');
        $keySearch = $dataForm['search'];
        
        //Faz o filtro dos dados
        $clientes = $this->cliente
                ->where('nome', 'LIKE', "%$keySearch%")
                ->paginate($this->totalPage);
        
        return view('cliente.index', compact('clientes', 'dataForm'));*/
    }


    public function edit($id)
    {
        try{

            $cliente = $this->cliente->find($id);

            return view('sistema.cadastro.cliente.form', compact('cliente'));
        
        } catch (\Exception $e) {            

            return redirect()->route('cliente.index')->with('error', $e->getMessage() );
            
        }

    }

    public function update($id, Request $request)
    {
        try{

            $dadosForm = $request->all();        

            $update =  $this->cliente->find($id)->update( $dadosForm );
            
           if ($update) 
                return redirect()->route('cliente.index')->with('success', 'Registro editado com sucesso!');
            else
                return redirect()->route('cliente.editar', $id);
        
        } catch (\Exception $e) {            

            return redirect()->route('cliente.index')->with('error', $e->getMessage() );
            
        }

    }


    public function destroy($id)
    {
        try{

            $item = Cliente::findOrFail($id);
            $delete = $item->delete();
        
            $response = array('status' => 'success' );
        
        } catch (\Exception $e) {
            $response = array('status' => 'fail', 'error' => $e->getMessage()  );
            
        }

        return \Response::json($response);
    }

}
