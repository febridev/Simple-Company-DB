<?php

namespace App\Http\Controllers\user;

//Laravel Default Object
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;



//Shamir Model For Saving Data To Database
use \App\ModelUser\IndustryType;
use \App\ModelUser\UserIndustry;
use \App\ModelUser\Company;
use \App\ModelUser\PIC;
use \App\ModelUser\UserCompany;
use \App\ModelUser\UserPic;

class industry extends Controller
{
    //
	public function index()
	{

		$IndustryType = new IndustryType;
		$industryTypeData = $IndustryType->select('IndustryId','IndustryName','IndustryDescription')->simplePaginate(20);	
		return view('user.industry',compact('industryTypeData'));
	}


	#below method for adding industry type add Route :: industryAdd

	public function Industry_Add()
	{
		return view('user.addindustry');
	}

	public function Industry_Saved(Request $request)
	{
		$User = Auth::user();

		if($request->has('IndustryName') && $request->has('IndustryDescription'))
		{
			//object obtain from table
			$industryName = $request->input('IndustryName');
			$industryDescription = $request->input('IndustryDescription');
			
			//object create for model IndustryType
			$IndustryType = new IndustryType;
			$IndustryType->IndustryName = $industryName;
			$IndustryType->IndustryDescription = $industryDescription;
			$IndustryType->LastUserUpdateID = $User->id;
			$IndustryType->isActive = 1;
			$IndustryType->save();

			// get lastest id from last inserting data from above code 
			$industryID = $IndustryType->IndustryId;

			//object create for model UserIndustry
			$UserIndustry = UserIndustry::create(['UserID' => $User->id,'IndustryID' => $industryID,'TypeOperationID' => '2']);

			return redirect()->route('industryhome');
		}
		else{
			return redirect()->route('industryadd');
		}

	}

	#formodify
	public function Industry_Modify_Index($slugid,$slugname)
	{
		$id = trim($slugid);
		$name = trim($slugname);

		$IndustryType = new IndustryType;
		$industryTypeData = $IndustryType->where('IndustryId',$id)
		->where('IndustryName',$name)->first();

		return view('user.modify.modifyindustry',compact('industryTypeData'));
	}

	public function Industry_Modify_Saved(Request $request)
	{
		$User = Auth::user();

		if($request->has('IndustryType') && $request->has('IndustryName') && $request->has('IndustryDescription'))
		{
			//object obtain from table
			$industryName = $request->input('IndustryName');
			$industryDescription = $request->input('IndustryDescription');
			$industryId = $request->input('IndustryType');

			
			//object create for model IndustryType
			$IndustryType = IndustryType::where('IndustryName',$industryName)
			->where('IndustryId',$industryId)->update(['IndustryName'=> $industryName,
				'IndustryDescription' => $industryDescription]);

			//object create for model UserIndustry
			$UserIndustry = UserIndustry::create(['UserID' => $User->id,'IndustryID' => $industryId,'TypeOperationID' => '2']);

			return redirect()->route('industryhome');
		}
		else{
			return redirect()->route('industryhome');
		}

	}

	public function Industry_Delete($slugid,$slugname)
	{	
		$User = Auth::user();

		$id = trim($slugid);
		$name = trim($slugname);
		$IndustryType = new IndustryType;
		
		$IndustryTypeData = $IndustryType->where('IndustryId',$id)
		->where('IndustryName',$name)->first();
		
		$IndustryTypeData->update(['LastUserUpdateID' => $User->id]);
		
		$IndustryTypeData->delete();

		//object create for model UserIndustry
		$UserIndustry = UserIndustry::create(['UserID' => $User->id,'IndustryID' => $id,'TypeOperationID' => '3']);

		$Company = new Company;
		$PIC = new PIC;
		$companyData = $Company->where('IndustryID',$id)->select('CompanyId')->get();
		foreach($companyData as $datas)
		{
			$companyDataModel = $Company->find($datas->CompanyId);
			$companyDataModel->update(['LastUserUpdateID'=> $User->id]);
			$companyDataModel->delete();

			UserCompany::create(['UserID' => $User->id,'CompanyID' => $datas->CompanyId,'TypeOperationID' => '3']);

			$picData = $PIC->where('CompanyID',$datas->CompanyId)->get();
			foreach ($picData as $picDatas) {
				# code...
				$picDatasModel = $PIC->find($picDatas->PICID);
				$picDatasModel->update(['LastUpdateUserID' => $User->id]);
				$picDatasModel->delete();

				UserPic::create(['UserID' => $User->id,'PICID' => $picDatas->PICID,'TypeOperationID' => '3']);
			}
		}
		return redirect()->route('industryhome');
	}


	#for search
	public function Industry_Search(Request $request)
	{
		$searchName = $request->SearchName;
		if(empty($searchName) == false)
		{
			$Industry = IndustryType::orWhere('IndustryName','like','%'.$searchName.'%')
			->orWhere('IndustryDescription','like',$searchName);
		}else{
			$Industry = new IndustryType;
		}
		$industryTypeData = $Industry->simplePaginate(20);
		return view('user.industry',compact('industryTypeData'));

	}


}
