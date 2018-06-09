<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'nome','descricao'
    ];

    public $rules = [
            'nome'=>'required|min:3|max:50'
        ];

    public $message = [
            'nome.required' => 'O nome da Role é um campo obrigatório',
            'nome.min'=>'O nome da role deve conter no mínimo 3 caracteres'
        ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permissions_role','role_id','permission_id');
    }

    public function addPermission($permission = [])
    {
        if (is_string($permission)) {
            $permissao = Permission::where('nome','=',$permission)->firstOrFail();
        }

        if($this->existePermissao($permission)){
            return;
        }

        return $this->permissoes()->attach($permission);
    }

    public function therePermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('nome','=',$permission)->firstOrFail();
        }

        return (boolean) $this->permissoes()->find($permission->id);
    }

    public function destroyPermission($permission)
    {
        if (is_string($permission)) {
            $permissao = Permission::where('nome','=',$permission)->firstOrFail();
        }

        return $this->permissoes()->detach($permission);
    }
}
