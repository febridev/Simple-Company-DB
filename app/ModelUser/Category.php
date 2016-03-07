<?php

namespace App\ModelUser;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    //
	use SoftDeletes;


    protected $table = 'categories';
	protected $primaryKey  = 'CategoryID';
	protected $connection = 'mysql';
	protected $fillable = ['CategoryName','CategoryDescription','LastUserUpdateID','isActive'];	
	protected $dates = ['deleted_at'];



	#access all industry under 1 category
	function Industry()
	{
		return $this->hasMany('\App\ModelUser\IndustryType','CategoryID','CategoryID');
	}


}

