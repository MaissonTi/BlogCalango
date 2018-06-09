<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'tb_cliente';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'sobrenome',
        'data_nascimento'
    ];

    public $rules = [
            'nome' => 'required|min:3|max:100'            
    ];
    
    public $messages = [
        'nome.required' => 'O "Nome do cliente" é obrigatorio',
        'nome.min' => 'O "Nome do cliente" deve ter no minimo 3 caracteres'
    ];

}
