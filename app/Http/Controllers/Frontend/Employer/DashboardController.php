<?php

namespace App\Http\Controllers\frontend\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use DB;
use Session;
use Auth;
class DashboardController extends Controller
{
    	
    public function __construct()
    {

    }
    
    public function getEmployerData()
    {
        $userId = Auth::user()->id;
        return  Users::where('id',$userId)->first();
    }

    public function editPersonalInfo(Request $request)
    {
        $request->validate( 
            [
                'name' => 'required',
                'email' => 'required',
                'location' =>'required',
                'mobile' =>'required',
               
                ],
                [
                    'name.required' => 'Employer name is required!',
                    'email.required' => 'Employer email is required!',
                    'location.required' => 'Employer location is required!',
                    'mobile.required' => 'Employer mobile is required!',
                    
                ]
            );
        $userId = Auth::user()->id;
        $data = Users::find($userId);
        if(!empty($data))
        {
            $data->name = $request->input('name'); 
            $data->location = $request->input('location'); 
            $data->mobile = $request->input('mobile'); 
            $data->address = $request->input('address'); 
            $data->save();           
            return response()->json([
                'message' => 'success',
                'status' => 200
            ],200);
        }
        else
        {
            return response()->json([
                'message' => 'fail',
                'status' => 500
            ],200);
        }
    }


    public function editCompanyInfo(Request $request)
    {
        $request->validate( 
            [
                'company_name' => 'required',
               
                ],
                [
                    'company_name.required' => 'Company name is required!',                 
                    
                ]
            );
        $userId = Auth::user()->id;
        $data = Users::find($userId);
        if(!empty($data))
        {
            $data->company_name = $request->input('company_name'); 
            $data->company_description = $request->input('company_description'); 
            $data->vat_no = $request->input('vat_no'); 
            $data->save();           
            return response()->json([
                'message' => 'success',
                'status' => 200
            ],200);
        }
        else
        {
            return response()->json([
                'message' => 'fail',
                'status' => 500
            ],200);
        }
    }

    public function uploadLogo(Request $request)
    {
        $request->validate( 
            [
                "company_logo"  => "dimensions:min_width=150,min_height=150",
               
                ],
                [
                    'company_logo.dimensions' => 'Logo Size: Minimum 150px x 150px',                 
                    
                ]
            );
        
        $userId = Auth::user()->id;
        $uploadedFile = $request->file('company_logo');
        if(!empty($uploadedFile))
        {
            $data = DB::table('users')->where('id',$userId)->first();
            if(!empty($data->company_logo))
            {
                //unlink(COMPANYLOGO.$data->company_logo);
            }            
            $fileName = round(microtime(true) * 1000).'_'.$uploadedFile->getClientOriginalName();
            $uploadedFile->move(COMPANYLOGO, $fileName);
            DB::table('users')->where('id',$userId)->update(['company_logo'=>$fileName]);
            return 1;
        }
        else
        {
            return 0;
        }
    }

}
