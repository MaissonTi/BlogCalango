<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Mockery\Exception;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('sistema.cadastro.user.index',compact('users'));
    }


    public function create()
    {
        return view('sistema.cadastro.user.form');
    }


    public function store(Request $request)
    {
        try{
            $dateForm = $request->all();
            $validate = validator($dateForm, $this->user->rules, $this->user->message);
            if($validate->fails())
            {
                return redirect()
                    ->route('users.create')
                    ->withErrors($validate)
                    ->withInput();
            }

            $insert = $this->user->create($dateForm);
            $insert->password = bcrypt($request->password);
            $insert->save();
            if($insert)
                return redirect()->route('users.index')->with('success', 'Registro criado com sucesso!');
            else
                return redirect()->back();
        }
        catch(Exception $e)
        {
            return redirect()->route('user.index')->with('error',  $e->getMessage() );
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        try {
            $user = $this->user->find($id);
            return view('sistema.cadastro.user.form',compact('user'));
        }
        catch (Exception $e)
        {
            return redirect()->route('user.index')->with('error', $e->getMessage() );
        }
    }


    public function update(Request $request, $id)
    {
        try
        {

            $user = $this->user->find($id);
            $dateForm = $request->all();
            $update = $user->update($dateForm);
            $user->password = bcrypt($request->password);
            $user->save();
            if($update)
                return redirect()->route('users.index')->with('success', 'Registro criado com sucesso!');
            else
                return redirect()->route('users.edit',$id);
        }
        catch (Exception $e)
        {
            return redirect()->route('user.index')->with('error', $e->getMessage() );
        }
    }


    public function destroy($id)
    {
        try
        {
            $role = $this->user->findOrFail($id)->delete();
            $response = array('status'=>'success');

        }
        catch(Exception $e)
        {
            $response = array('status' => 'fail', 'error' => $e->getMessage()  );
        }
        return response()->json($response);
    }
}
