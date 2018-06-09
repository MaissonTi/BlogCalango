<?php

namespace App\Http\Controllers;

use App\Model\Role;
use Illuminate\Http\Request;
use Mockery\Exception;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role )
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->all();
        return view('sistema.cadastro.role.index',compact('roles'));
    }

    public function  create()
    {
        return view('sistema.cadastro.role.form');
    }

    public function store(Request $request)
    {
        $dadosForm = $request->all();
        try
        {
            $validate = validator($dadosForm, $this->role->rules, $this->role->message);
            if( $validate->fails() ){
                return redirect()
                    ->route('roles.create')
                    ->withErrors($validate)
                    ->withInput();
            }
            $insert = $this->role->create($dadosForm);
            if ($insert)
                return redirect()->route('roles.index')->with('success', 'Registro criado com sucesso!');
            else
                return redirect()->back();
        }
        catch(Exception $e)
        {
            return redirect()->route('roles.index')->with('error',  $e->getMessage() );
        }
    }

    public function edit($id)
    {
        try
        {
            $role = $this->role->find($id);
            return view('sistema.cadastro.role.form', compact('role'));
        }
        catch (Exception $e)
        {
            return redirect()->route('roles.index')->with('error', $e->getMessage() );
        }
    }

    public function  update($id,Request $request)
    {
        try
        {
            $dadosForm = $request->all();

            $update = $this->role->findOrFail($id)->update($dadosForm);
            if($update)
                return redirect()->route('roles.index')->with('success', 'Registro editado com sucesso!');
            else
                return redirect()->route('roles.editar', $id);
        }
        catch (Exception $e)
        {
            return redirect()->route('roles.index')->with('error', $e->getMessage() );
        }
    }

    public function destroy($id)
    {
        try
        {
            $role = $this->role->findOrFail($id)->delete();
            $response = array('status'=>'success');
        }
        catch(Exception $e)
        {
            $response = array('status' => 'fail', 'error' => $e->getMessage()  );
        }
            return response()->json($response);
    }
}
