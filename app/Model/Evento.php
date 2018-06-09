<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'tb_evento';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'data_evento',
        'cliente_id'
    ];

    public $rules = [
            'nome' => 'required|min:3|max:100'            
    ];
    
    public $messages = [
        'nome.required' => 'O "Nome do evento" é obrigatorio',
        'nome.min' => 'O "Nome do evento" deve ter no minimo 3 caracteres'
    ];

    public function cliente()
    {
        return $this->hasOne('App\Model\Cliente','id','cliente_id');
    }

}
