<?php

namespace App\ModelUser;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PIC extends Model
{
    //
	use SoftDeletes;

    protected $table = 'pics';
	protected $primaryKey  = 'PICID';
	protected $connection = 'mysql';
	protected $fillable = ['CompanyID','PICName','PICOfficeAddress','PICPosition',
	'PICOfficeNumber','PICPhoneNumber','PICFax','PICEmail','LastUpdateUserID','isActive'];	

	protected $dates = ['deleted_at'];

	//get object from model class of company 
	public function Company()
	{
		return $this->belongsTo('\App\ModelUser\Company','CompanyID','CompanyId');
	}
}
