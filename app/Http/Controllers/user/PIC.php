<?php

namespace App\Http\Controllers\user;

#laravel default object
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use DB;
use Session;
#my model object
use \App\ModelUser\Company;
use \App\ModelUser\PIC as PICModel;
use \App\ModelUser\UserPic;
use \App\ModelUser\UserCompany;


class PIC extends Controller
{
    //
    public function PIC_Modify_Index($slugid,$slugname)
    {
        $id = trim($slugid);
        $name = trim($slugname);

        $Company = new Company;
        $companyData = $Company->select('CompanyId','CompanyName')->get();

        $picData = PICModel::where('PICID',$id)->first();

        return view('user.modify.modifypic',compact('companyData','picData'));
    }

    public function PIC_Modify_Saved(Request $request)
    {
        $User = Auth::user();

        if($request->has('CompanyId') && $request->has('PICName') &&$request->has('PICPosition') &&
            $request->has('PICOfficeAddress') &&$request->has('PICOfficePhoneNumber') && $request->has('PICOfficeFax') 
            && $request->has('PICPersonalPhoneNumber') && $request->has('PICOfficeEmail'))
        {
            //object obtain from table
            $picID = $request->PIC;
            $companyId = $request->CompanyId;
            $picName = $request->PICName;
            $picPosition = $request->PICPosition;
            $picOfficeAddress = $request->PICOfficeAddress;
            $picOfficePhoneNumber = $request->PICOfficePhoneNumber;
            $picOfficeFax = $request->PICOfficeFax;
            $picPersonalPhoneNumber = $request->PICPersonalPhoneNumber;
            $picOfficeEmail = $request->PICOfficeEmail;

            //object create for model IndustryType
            $PICModel = PICModel::where('PICID',$picID)
            ->update([
                'CompanyID' => $companyId, 'PICID' => $picID,
                'PICName'=> $picName,
                'PICOfficeAddress' => $picOfficeAddress,
                'PICPosition' => $picPosition,'PICOfficeNumber' => $picOfficePhoneNumber,
                'PICPhoneNumber' => $picPersonalPhoneNumber,'PICFax' => $picOfficeFax,
                'PICEmail' => $picOfficeEmail]);

            //object create for model UserIndustry
            $User = UserCompany::create(['UserID' => $User->id,'PICID' => $picID,'TypeOperationID' => '4']);
            
            Session::flash('success_flash','Contact Person berhasil diubah');
            return redirect()->route('companieshome');
        }
        else{
            Session::flash('error_flash','Contact Person gagal diubah');
            return redirect()->route('companieshome');
        }    
    }

    public function PIC_Delete($slugid,$slugname)
    {   
        $User = Auth::user();

        $id = trim($slugid);
        $name = trim($slugname);
     
        $PIC =  PICModel::where('PICID',$id)->where('PICName',$name)->first();
     
        $PIC->update(['LastUpdateUserID' => $User->id]);
        $PIC->delete();
        UserPic::create(['UserID' => $User->id,'PICID' => $id,'TypeOperationID' => '3']);
        Session::flash('success_flash','Contact Person berhasil di delete');
        return redirect()->route('companieshome');

    }

    public function PIC_Search(Request $request)
    {
        // $input = Input::all();
    // dd($input);
        $searchName = trim($request->SearchName);
        if(empty($searchName) == false)
        {
            $PIC = PICModel::join('companies','companies.CompanyId','=','pics.CompanyID')
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
            $PIC = new PICModel;            
        }
        
        $picData = $PIC->simplePaginate(20); 
        $SearchName = $searchName;
        return view('user.company',compact('picData','SearchName'));            


    }

}

