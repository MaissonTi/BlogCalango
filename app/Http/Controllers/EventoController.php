<?php

namespace App\Http\Controllers;

use App\Model\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    private $evento;

    public function __construct(Evento $evento )
    {       
        $this->evento = $evento;
    }

    public function index()
    {
        $eventos = $this->evento->all();
        
        return view('sistema.cadastro.evento.index', compact('eventos'));        
    }


    public function create()
    {
       return view('sistema.cadastro.evento.form');
    }


    public function store(Request $request)
    {
        try{

            $dadosForm = $request->all();

            $validate = validator($dadosForm, $this->evento->rules, $this->evento->messages);
            if( $validate->fails() ){
                return redirect()
                    ->route('evento.create')
                    ->withErrors($validate)
                    ->withInput();
            }
              
            $insert =  $this->evento->create( $dadosForm );
    
            if ($insert) 
                return redirect()->route('evento.index')->with('success', 'Registro criado com sucesso!');
            else
                return redirect()->back();
        
        } catch (\Exception $e) {            
            
            return redirect()->route('evento.index')->with('error',  $e->getMessage() );

        }


    }

    //search
    public function show(Request $request)
    {
        //Pega os dados do formulário
        /*$dataForm = $request->except('_token');
        $keySearch = $dataForm['search'];
        
        //Faz o filtro dos dados
        $eventos = $this->evento
                ->where('nome', 'LIKE', "%$keySearch%")
                ->paginate($this->totalPage);
        
        return view('evento.index', compact('eventos', 'dataForm'));*/
    }


    public function edit($id)
    {
        try{

            $evento = $this->evento->find($id);

            return view('sistema.cadastro.evento.form', compact('evento'));
        
        } catch (\Exception $e) {            

            return redirect()->route('evento.index')->with('error', $e->getMessage() );
            
        }

    }

    public function update($id, Request $request)
    {
        try{

            $dadosForm = $request->all();        

            $update =  $this->evento->find($id)->update( $dadosForm );
            
           if ($update) 
                return redirect()->route('evento.index')->with('success', 'Registro editado com sucesso!');
            else
                return redirect()->route('evento.editar', $id);
        
        } catch (\Exception $e) {            

            return redirect()->route('evento.index')->with('error', $e->getMessage() );
            
        }

    }


    public function destroy($id)
    {
        try{

            $item = evento::findOrFail($id);
            $delete = $item->delete();
        
            $response = array('status' => 'success' );
        
        } catch (\Exception $e) {
            $response = array('status' => 'fail', 'error' => $e->getMessage()  );
            
        }

        return \Response::json($response);
    }

}
