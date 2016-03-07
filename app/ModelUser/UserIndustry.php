<?php

namespace App\ModelUser;

use Illuminate\Database\Eloquent\Model;

class UserIndustry extends Model
{
    //
	protected $table = 'user_industries';
	protected $primaryKey  = 'UserIndustryId';
	protected $connection = 'mysql';
	protected $fillable = ['UserID','IndustryID','TypeOperationID'];	

	

}
