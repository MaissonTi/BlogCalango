<?php

namespace App;

use App\Model\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public $rules = [
        'nome'=>'required|min:3|max:100',
        'email'=>'required',
        'password'=>'required|min:6|confirmed',


    ];

    public $message = [
        'nome.required'=>'O nome do Usuário é um campo obrigatório',
        'nome.min'=>'O "Nome do Usuário deve conter o mínimo de três caracteres"',
        'nome.max'=>'O "Nome do Usuário deve conter o máximo de cem caracteres"',
        'email.required'=>'O E-mail do Usuário é um campo obrigatório',
        'password.required'=>'O campo "SENHA" é obrigatório,Por Favor Preencha',
        'password.confirmed' =>'Senha não confere, por favor verifique.'
    ];

    public function eAdmin()
    {

        return $this->existePapel('Admin');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }

    public function addRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('nome','=',$role)->firstOrFail();
        }

        if($this->thereRole($role)){
            return;
        }

        return $this->roles()->attach($role);

    }

    public function thereRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('nome','=',$role)->firstOrFail();
        }

        return (boolean) $this->roles()->find($role->id);

    }

    public function destroyRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('nome','=',$role)->firstOrFail();
        }

        return $this->roles()->detach($role);
    }

    public function hasAnyRole($roles)
    {
        $userRoles = $this->roles;
        return $roles->intersect($userRoles)->count();
    }

    public function hasRole($role)
    {
        if($this->roles()->where('nome',$role)->first())
        {
            return true;
        }
        return false;
    }
}
