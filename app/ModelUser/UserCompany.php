<?php

namespace App\ModelUser;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    //
    protected $table = 'user_companies';
	protected $primaryKey  = 'UserCompanyID';
	protected $connection = 'mysql';
	protected $fillable = ['UserID','CompanyID','TypeOperationID'];	

}
