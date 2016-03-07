<?php

namespace App\Http\Controllers\user;

#laravel default object
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use DB;
use Session;
#my model object
use \App\ModelUser\Company as CompanyModel;
use \App\ModelUser\UserCompany;
use \App\ModelUser\IndustryType;
use \App\ModelUser\PIC;
use \App\ModelUser\UserPic;

class company extends Controller
{
    //
    public function index()
    {
        $SearchName = '0';
        $picData = PIC::with('Company.Industry')->simplePaginate(20);
        return view('user.company',compact('picData','SearchName'));
    }

    public function Company_Add()
    {
        $Industry = new IndustryType;
        $industryData = $Industry->select('IndustryId','IndustryName')->orderBy('IndustryName')->get();
        return view('user.addcompany',compact('industryData'));
    }

    public function Company_Saved(Request $request)
    {   
        // $input = Input::all();
        // dd($input);
        $User = Auth::user();
        if($request->has('IndustryType')&& $request->has('CompanyName')) 
        {
            //object obtain from table
            $industryID = $request->input('IndustryType');
            $companyName = $request->input('CompanyName');
            $companyAddress = $request->input('CompanyAddress');
            $companyWebsite = $request->input('CompanyWebsite');
            $companyPhoneNumber = $request->input('CompanyPhoneNumber');
                
            # object obtain from tab
            $picTotal = $request->input('pic_total');
            $picName = $request->input('PICName');
            $picPosition = $request->input('PICPosition');
            $picOfficeEmail = $request->input('PICOfficeEmail');
            $picOfficeAddress = $request->input('PICOfficeAddress');
            $picOfficePhoneNumber = $request->input('PICOfficePhoneNumber');
            $picOfficeFax = $request->input('PICOfficeFax');
            $picPersonalPhoneNumber = $request->input('PICPersonalPhoneNumber');

            //object create for model Company
            $Company = new CompanyModel;
            $companyDataFinder = $Company->where('CompanyName',$companyName)
            ->select(DB::raw('COUNT(*) as counter'),'CompanyId')->first();

            if($companyDataFinder->counter == 0)
            {
                $Company->CompanyName = $companyName;
                (trim($companyAddress) != "" ? $Company->CompanyAddress = $companyAddress : "" ); 
                (trim($companyWebsite) != "" ? $Company->CompanyWebsite = $companyWebsite : "") ; 
                (trim($companyPhoneNumber) != "" ? $Company->CompanyAddress = $companyPhoneNumber : "") ; 
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

            if(empty($picName[0]) == false)
            {
                for ($i=0; $i < $picTotal; $i++) { 
                # code...
                        $PIC = new PIC;
                        $PIC->CompanyID = $companyID;
                        (trim($picName[$i]) != "" ?  $PIC->PICName  = $picName[$i] : "");
                        (trim($picPosition[$i]) != "" ? $PIC->PICPosition = $picPosition[$i] : "" );
                        (trim($picOfficeAddress[$i]) != "" ? $PIC->PICOfficeAddress = $picOfficeAddress[$i] : "");
                        (trim($picOfficePhoneNumber[$i]) != "" ? $PIC->PICOfficeNumber = $picOfficePhoneNumber[$i] : "");
                        (trim($picPersonalPhoneNumber[$i]) != "" ? $PIC->PICPhoneNumber = $picPersonalPhoneNumber[$i] : "");
                        (trim($picOfficeFax[$i]) != "" ? $PIC->PICFax = $picOfficeFax[$i] : "");
                        (trim($picOfficeEmail[$i]) != "" ? $PIC->PICEmail = $picOfficeEmail[$i] : "");
                        $PIC->LastUpdateUserID = $User->id;
                    
                        $PIC->save();
                        $picID = $PIC->PICID;
                        $UserPIC = UserPic::create(['UserID' => $User->id,'PICID' => $picID,
                            'TypeOperationID' => '1']); 
                }
                Session::flash('success_flash','berhasil menambahkan company dan atau contact person');
                return redirect()->route('companieshome');
            }else{
                Session::flash('error_flash','gagal menambahkan company dan atau contact person');
                return redirect()->route('companieshome');
            }
         
        }
        else{
              Session::flash('error_flash','gagal menambahkan company dan atau contact person');
            return redirect()->route('companieshome');
        }
    }

    public function Add_Contact_Person_To_Company()
    {
        $Industry = new IndustryType;
        $industryData = $Industry->select('IndustryId','IndustryName')->orderBy('IndustryId','asc')->get();
        return view('user.addcontactperson',compact('industryData'));
    }

    public function Get_The_Company_To_Add_Contact_Person(Request $request)
    {
        if($request->has('IndustryType'))
        {
            $industryID = $request->IndustryType;
            $companyData = CompanyModel::where('IndustryID',$industryID)
            ->select('CompanyId','CompanyName')->get();
            return json_encode($companyData);

        }else{
            return 'no_data';
        }
    }

    public function Company_Modify_Index($slugid,$slugname)
    {

        $id = trim($slugid);
        $name = trim($slugname);
        $Industry = new IndustryType;
        $industryData = $Industry->select('IndustryId','IndustryName')->orderBy('IndustryName')->get();
        
        $Company = new CompanyModel;
        $companyData = $Company->where('CompanyId',$id)
        ->where('CompanyName',$name)->first();

        return view('user.modify.modifycompany',compact('companyData','industryData'));
    }

    public function Company_Modify_Saved(Request $request)
    {
        $User = Auth::user();

        if($request->has('Company') && $request->has('CompanyName') && $request->has('CompanyAddress') 
            && $request->has('CompanyWebsite') && $request->has('CompanyPhoneNumber'))
        {
            //object obtain from table
            $companyID = $request->input('Company');
            $industryID = $request->input('IndustryType');
            $companyName = $request->input('CompanyName');
            $companyAddress = $request->input('CompanyAddress');
            $companyWebsite = $request->input('CompanyWebsite');
            $companyPhoneNumber = $request->input('CompanyPhoneNumber');

            //object create for model IndustryType
            $Company = CompanyModel::where('CompanyId',$companyID)
            ->update([
                'IndustryID' => $industryID,'CompanyName'=> $companyName,
                'CompanyAddress' => $companyAddress,
                'CompanyWebsite' => $companyWebsite,'CompanyPhoneNumber' => $companyPhoneNumber]);

            //object create for model UserIndustry
            $User = UserCompany::create(['UserID' => $User->id,'CompanyID' => $companyID,'TypeOperationID' => '4']);
            return redirect()->route('companieshome');
        }
        else{
            return redirect()->route('companieshome');
        }    
    }


    public function Company_Delete($slugid,$slugname)
    {   
        $User = Auth::user();

        $id = trim($slugid);
        $name = trim($slugname);
     
        $Company =  CompanyModel::where('CompanyId',$id)->where('CompanyName',$name)->first();
        $Company->update(['LastUserUpdateID'=> $User->id]);
        $Company->delete();

        UserCompany::create(['UserID' => $User->id,'CompanyID' => $Company->CompanyId,'TypeOperationID' => '2']);

        $PIC = new PIC;

        $picData = $PIC->where('CompanyID',$Company->CompanyId)->get();
        foreach ($picData as $picDatas) {
                # code...
            $picDatasModel = $PIC->find($picDatas->PICID);
            $picDatasModel->update(['LastUpdateUserID' => $User->id]);
            $picDatasModel->delete();

            UserPic::create(['UserID' => $User->id,'PICID' => $picDatas->PICID,'TypeOperationID' => '2']);
        }

        return redirect()->route('companieshome');

    }

}

