<?php

namespace App\ModelUser;

use Illuminate\Database\Eloquent\Model;

class UserPic extends Model
{
    //
    protected $table = 'user_pics';
	protected $primaryKey  = 'UserPICID';
	protected $connection = 'mysql';
	protected $fillable = ['UserID','PICID','TypeOperationID'];	

}
