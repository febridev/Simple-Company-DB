<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



// Route::get('',function(){

// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web','auth']], function () {
    
    //default login
  	Route::get('/',['as' => 'login' , 'uses' => 'user\usermanagement@login']);
  	Route::post('/logintomyheart', ['as' => 'postLogin', 'uses' => 'user\usermanagement@authenticate']);
  	Route::get('/logout',['as' => 'logout','uses' => 'user\usermanagement@logout']);
    
    // home
    Route::get('/home',['as' => 'userhome','uses' => 'user\home@index']);
    Route::post('/searchhomedata',['as' => 'searchhome','uses' => 'user\home@SearchData']);

    //Route::get('/contactus',['as' => 'contactusindex','uses' => 'user\contactus@index']);
    //Route::post('/kirimemailcontact',['as' => 'sendemailcontact','uses' => 'user\contactus@Send_Mail']);

    // //Category
    // Route::get('/category',['as' => 'categoryhome','uses' => 'user\category@index']);
    // Route::get('/categoryadd',['as' => 'categoryadd','uses' => 'user\category@Category_Add']);
    // Route::post('/categorysaved',['as' => 'categorysaved','uses' => 'user\category@Category_Saved']);
    // Route::get('/categorymodify/{slugid}/{slugname}',['as' => 'categorymodify','uses' => 'user\category@Category_Modify_Index']);
    // Route::post('/categorymodifysave',['as' => 'categorymodifysaved','uses' => 'user\category@Category_Modify_Saved']);
    // Route::get('/categoryremove/{slugid}/{slugname}',['as' => 'categoryremove','uses' => 'user\category@Category_Delete']);

    //Industry 
   	Route::get('/industry',['as' => 'industryhome','uses' => 'user\industry@index']);
   	Route::get('/industryadd',['as' => 'industryadd','uses' => 'user\industry@Industry_Add']);
   	Route::post('/industrysaved',['as' => 'industrysaved','uses' => 'user\industry@Industry_Saved']);
    Route::get('/industrymodify/{slugid}/{slugname}',['as' => 'industrymodify','uses' => 'user\industry@Industry_Modify_Index']);
    Route::post('/industrymodifysave',['as' => 'industrymodifysaved','uses' => 'user\industry@Industry_Modify_Saved']);
    Route::get('/industryremove/{slugid}/{slugname}',['as' => 'industryremove','uses' => 'user\industry@Industry_Delete']);
    Route::post('/industrysearch',['as' => 'industrysearchroute','uses' => 'user\industry@Industry_Search']);

    #Company
    Route::get('/companies',['as' => 'companieshome','uses' => 'user\company@index']);
    Route::get('/companiesadd',['as' => 'companiesadd','uses' => 'user\company@Company_Add']);
    Route::post('/companiessaved',['as' => 'companiessaved','uses' => 'user\company@Company_Saved']);
    Route::get('/companymodify/{slugid}/{slugname}',['as' => 'companymodify','uses' => 'user\company@Company_Modify_Index']);
    Route::post('/companymodifysave',['as' => 'companymodifysave','uses' => 'user\company@Company_Modify_Saved']);
    Route::get('/companyremove/{slugid}/{slugname}',['as' => 'companyremove','uses' => 'user\company@Company_Delete']);
    
    Route::get('/addcontactpersontocompany',['as' => 'addcontactpersontocompanyroute','uses' => 'user\company@Add_Contact_Person_To_Company']);
    Route::post('/getcompanytoaddcontactperson',['as' => 'getcompanytoaddcontactpersonroute',
        'uses' => 'user\company@Get_The_Company_To_Add_Contact_Person']);



    #PIC
    Route::get('/picesadd',['as' => 'picesadd','uses' => 'user\PIC@PIC_Add']);
    Route::post('/picessaved',['as' => 'picessaved','uses' => 'user\PIC@PIC_Saved']);
    Route::get('/picmodify/{slugid}/{slugname}',['as' => 'picmodify','uses' => 'user\PIC@PIC_Modify_Index']);
    Route::post('/picmodifysave',['as' => 'picmodifysaved','uses' => 'user\PIC@PIC_Modify_Saved']);
    Route::get('/picremove/{slugid}/{slugname}',['as' => 'picremove','uses' => 'user\PIC@PIC_Delete']);
    Route::post('/picsearch',['as' => 'picsearchroute','uses' => 'user\PIC@PIC_Search']);
    

    //route for exporting to excel
    Route::get('/hometoexcel/{SearchName}'
        ,['as' => 'hometoexcelexportroute','uses' => 'user\home@Home_To_Excel']);




    //extra route for me to read data 
    Route::get('/readexcel',['as' => 'readexcelhome','uses' => 'user\readexcelfile@read_excel']);
});
