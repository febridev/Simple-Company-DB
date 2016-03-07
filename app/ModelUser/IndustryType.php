<?php

namespace App\ModelUser;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class IndustryType extends Model
{
    //
	use SoftDeletes;


    protected $table = 'industry_types';
	protected $primaryKey  = 'IndustryId';
	protected $connection = 'mysql';
	protected $fillable = ['IndustryName','IndustryDescription','LastUserUpdateID','isActive'];	
	protected $dates = ['deleted_at'];



	#access all company under 1 industry
	public function Company()
	{
		return $this->hasMany('\App\ModelUser\Company','IndustryID','IndustryId');
	}


	#industry belongs to category 
	public function Category()
	{
		return $this->belongsTo('\App\ModelUser\Category','CategoryID','CategoryID');
	}
}
