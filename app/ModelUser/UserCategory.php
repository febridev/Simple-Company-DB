<?php

namespace App\ModelUser;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    //
        //
	protected $table = 'user_categories';
	protected $primaryKey  = 'UserCategoryID';
	protected $connection = 'mysql';
	protected $fillable = ['UserID','CategoryID','TypeOperationID'];	
}
