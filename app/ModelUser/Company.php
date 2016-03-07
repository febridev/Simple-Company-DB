<?php

namespace App\ModelUser;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
	use SoftDeletes;
  
    protected $table = 'companies';
	protected $primaryKey  = 'CompanyId';
	protected $connection = 'mysql';
	protected $fillable = ['IndustryID','CompanyName','CompanyAddress','CompanyWebsite',
	'CompanyPhoneNumber','LastUserUpdateID','isActive'];	
	
	protected $dates = ['deleted_at'];



	public function Industry()
	{
		return $this->belongsTo('\App\ModelUser\IndustryType','IndustryID','IndustryId');
	}

	public function PIC()
	{
		return $this->hasMany('\App\ModelUser\PIC','CompanyID','CompanyId');
	}

}
