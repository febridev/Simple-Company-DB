<?php

use Illuminate\Database\Seeder;

class typeOperations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
  		DB::table('type_operations')->insert([[
            'TypeOperationName' => 'Create',
            'TypeOperationDescription' => 'Create Type Operation, whatever you do 
            , if you create something, its mean u use this type operations'
        ],[
        	'TypeOperationName' => 'Delete',
            'TypeOperationDescription' => 'Delete Type Operation, whatever you do 
            , if you Delete something, its mean u use this type operations'
        ],[
        	'TypeOperationName' => 'Update',
            'TypeOperationDescription' => 'Update Type Operation, whatever you do 
            , if you Update something, its mean u use this type operations'
        ],[
        	'TypeOperationName' => 'Modify',
            'TypeOperationDescription' => 'Modify Type Operation, whatever you do 
            , if you Modify something, its mean u use this type operations'
        ]]);

    }
}
