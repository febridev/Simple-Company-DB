<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use URL;
use Auth;
use DB;


// my model object 

use \App\ModelUser\IndustryType;
use \App\ModelUser\UserIndustry;
use \App\ModelUser\Company;
use \App\ModelUser\UserCompany;
use \App\ModelUser\PIC;
use \App\ModelUser\UserPic;

class readexcelfile extends Controller
{
    //

	public function read_excel()
	{ 

		$User = Auth::user();
		Excel::load('cdc1.xlsx', function($reader)  use ($User){
	    // reader methods
			dd($reader->toArray());
			
			$reader->each(function($sheet) use ($User) {
				$industryData = $sheet->getTitle();

			    $sheet->each(function($row)  use ($User,$industryData){
					if(empty($row->nama_perusahaan) == false)
					{
					$IndustryType = new IndustryType;
					$industryTypeDataFinder = $IndustryType
					->where('IndustryName',trim($industryData.'-'.$row->sub_industry))
					->select(DB::raw('COUNT(*) AS counter'),'IndustryId')->first();
					
					if($industryTypeDataFinder->counter == 0)
					{
						$IndustryType->IndustryName = $industryData.'-'.trim($row->sub_industry);
						$IndustryType->LastUserUpdateID = $User->id;
						$IndustryType->save();
						$industryID = $IndustryType->IndustryId;
						$UserIndustry = UserIndustry::create(['UserID' => $User->id,'IndustryID' => $industryID
						,'TypeOperationID' => '1']);
					}else{
						$industryID = $industryTypeDataFinder->IndustryId;
					}			

					$Company = new Company;
					$companyDataFinder = $Company->where('CompanyName',$row->nama_perusahaan)
					->select(DB::raw('COUNT(*) as counter'),'CompanyId')->first();			    	
					
					if($companyDataFinder->counter == 0)
					{
						$Company->CompanyName = $row->nama_perusahaan;
						//(trim($row->alamat) != "" ? $Company->CompanyAddress = $row->alamat : "" ); 
						(trim($row->website) != "" ? $Company->CompanyWebsite = $row->website : "") ; 
						//(trim($row->alamat) != "" ? $Company->CompanyAddress = $row->alamat : "" ; 
						//(trim($row->alamat) != "" ? $Company->CompanyAddress = $row->alamat : "" ; 
						$Company->IndustryID = $industryID;
						$Company->LastUserUpdateID = $User->id;
	          			
						$Company->save();
						$companyID = $Company->CompanyId;
						$UserCompany = UserCompany::create(['UserID' => $User->id,
						'CompanyID' => $companyID,'TypeOperationID' => '1']);

					}else{
						$companyID = $companyDataFinder->CompanyId;	
					}
					
					$PIC = new PIC;
					$PIC->CompanyID = $companyID;
					(trim($row->pic_contact_person) != "" ?  $PIC->PICName  = $row->pic_contact_person : "");
					(trim($row->jabatan) != "" ? $PIC->PICPosition = $row->jabatan : "" );
					(trim($row->alamat) != "" ? $PIC->PICOfficeAddress = $row->alamat : "");
					(trim($row->tlp_kantor) != "" ? $PIC->PICOfficeNumber = $row->tlp_kantor : "");
					(trim($row->hp) != "" ? $PIC->PICPhoneNumber = $row->hp : "");
					(trim($row->fax) != "" ? $PIC->PICFax = $row->fax : "");
					(trim($row->e_mail) != "" ? $PIC->PICEmail = $row->e_mail : "");
					$PIC->LastUpdateUserID = $User->id;
					$PIC->save();
					$picID = $PIC->PICID;
					$UserPIC = UserPic::create(['UserID' => $User->id,'PICID' => $picID,
					'TypeOperationID' => '1']);	
					}
				});
			});
		});
	}


}
