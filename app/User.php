<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  /* bagain route nya */
    public function roles()
    {
        return $this->belongsToMany('\App\Role');
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = \App\Role::where('name', $role)->first();
        }
 
        return $this->roles()->attach($role);
    }
     
    public function revokeRole($role)
    {
        if (is_string($role)) {
            $role = \App\Role::where('name', $role)->first();
        }
 
        return $this->roles()->detach($role);
    }

    public function hasRole($name)
    {
        foreach($this->roles as $role)
        {
            if ($role->name === $name) return true;
        }
         
        return false;
    }

    // ini digunakan untuk array role
    public function hasAndRoles($arrayRole)
    {
        $bools = array();
        $roleselection = $arrayRole;
        $arraycount = sizeof($roleselection);

        foreach ($roleselection as $roless) {
            # code...
            $returner = $this->hasRole($roless);
            $returner == true ? array_push($bools,'oke') : '';
        }
        $occurences = array_count_values($bools); 
        $countoccurences = isset($occurences['oke']) ? $occurences['oke'] : 0 ;
        return $countoccurences == $arraycount ? true : false ;
    }

    public function hasOrRoles($arrayRole)
    {
        $bools = array();
        $roleselection = $arrayRole;
        $arraycount = sizeof($roleselection);

        foreach ($roleselection as $roless) {
            # code...
            $returner = $this->hasRole($roless);
            $returner == true ? array_push($bools,'oke') : '';
        }
        $occurences = array_count_values($bools); 
        $countoccurences = isset($occurences['oke']) ? $occurences['oke'] : 0 ;
        return ( $countoccurences == $arraycount )  or ( $countoccurences >= 1 ) ? true : false ;
    }
}
