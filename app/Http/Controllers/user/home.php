<?php

namespace App\Http\Controllers\user;


#laravel default object
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Session;
use Auth;
use DB;
use Excel;

#my model object 
use \App\ModelUser\Category;
use \App\ModelUser\IndustryType;
use \App\ModelUser\PIC;
use \App\ModelUser\Company;


class home extends Controller
{
    //
    public function index()
    {
    	return view('user.home');
    }
    
    public function Home_To_Excel($SearchName)
    {
    	
    	$searchName = trim($SearchName);

      	if(empty($searchName) == false)
        {
            $PIC = PIC::join('companies','companies.CompanyId','=','pics.CompanyID')
            ->join('industry_types','companies.IndustryID','=','industry_types.IndustryId')
            ->orWhere('IndustryName','like','%'.$searchName.'%')
            ->orWhere('CompanyName','like','%'.$searchName.'%')
            ->orWhere('CompanyAddress','like','%'.$searchName.'%')
            ->orWhere('CompanyWebsite','like','%'.$searchName.'%')
            ->orWhere('CompanyPhoneNumber','like','%'.$searchName.'%')
            ->orWhere('PICName','like','%'.$searchName.'%')
            ->orWhere('PICOfficeAddress','like','%'.$searchName.'%')
            ->orWhere('PICPosition','like','%'.$searchName.'%')
            ->orWhere('PICOfficeNumber','like','%'.$searchName.'%')
            ->orWhere('PICPhoneNumber','like','%'.$searchName.'%')
            ->orWhere('PICFax','like','%'.$searchName.'%')
            ->orWhere('PICEmail','like','%'.$searchName.'%');
        }else{
            $PIC = new PIC;            
        }
        
        $picData = $PIC->get(); 

		// //for exporting to excel 
		Excel::create('CDC_Company', function($excel)  use ($picData){

		    // Set the title
		    $excel->setTitle('CDC Company Database');
		    // Chain the setters
		    $excel->setCreator('CDC Prasetiya Mulya')
		          ->setCompany('Prasetiya Mulya');
		    // Call them separately
		    $excel->setDescription('List data untuk ');

		    $i = 1;
		   	$excel->sheet('Sheet 1', function($sheet) use($picData,$i) {			
		    foreach ($picData as $datas) {
		    	# code...
						
					$sheet->row(1, array(
					    'No',
					    'Nama Perusahaan',
					    'Industri',
					    'Alamat',
					    'Website',
					    'PIC',
					    'Jabatan',
					    'Tlp Kantor',
					    'Fax',
					    'HP',
					    'Email'
					));
					$sheet->row(($i+1), array(
					    $i,
					    $datas->Company->CompanyName,
					    $datas->Company->Industry->IndustryName,
					    $datas->PICOfficeAddress,
					    $datas->Company->CompanyWebsite,
					    $datas->PICName,
					    $datas->PICPosition,
					    $datas->PICOfficeNumber,
				        $datas->PICFax,
				        $datas->PICPhoneNumber,
				        $datas->PICEmail
					));
				
	    	
	    	$i++;

		    }
		    });
		})->export('xls');



    }

    
}
