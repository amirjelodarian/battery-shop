<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function givePermissionTo(Permission $permission){
        return $this->permissions()->attach($permission);
    }

    public function takePermissionTo(Permission $permission){
        return $this->permissions()->detach($permission);
    }
}
