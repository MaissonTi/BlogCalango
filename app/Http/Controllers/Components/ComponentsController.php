<?php

namespace App\Http\Controllers\Components;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ComponentsController extends Controller
{
    
    public function index(Request $request)
    {

    }

    public function create(Request $request)
    {
        
    }

      
    public function store(Request $request)
    {
        
    }

      
    public function show($model)
    {
       
        try{

            $config = json_decode($model, true);

            $record = DB::table($config['table'])->select($config['fields'])->get();            

            $response = array('status' => 'success', 'data' => $record  );

        
        } catch (\Exception $e) {
            
            $response = array('status' => 'fail', 'error' => $e->getMessage()  );
            
        }

        return \Response::json($response);
        
    }

}
