<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['nome','descricao'];

    public function  users()
    {
        return $this->belongsToMany(Role::class,'permissions_role','permission_id','role_id');
    }
}
