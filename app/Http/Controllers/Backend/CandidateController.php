<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      
    public function __construct()
    {
        
    }



    public function index(Request $request)
    {
        $search = $request->query('search');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');       
        $query = Users::query();       
        if(!empty($search))
        {           
            $query->where('first_name', 'LIKE', "%$search%")->where('role_id','=',3)->orWhere('last_name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%");
        }
        if(isset($startDate) && $startDate != 'null')
        {
            $startdate1 = date('Y-m-d',strtotime($startDate));
            if(isset($endDate) && $endDate != 'null')
            {              
                $query->where('created_at','>=',$startdate1);
            }
            else
            {
                $query->where('created_at','>=',$startdate1.' 00:00:00');
                $query->where('created_at','<=',$startdate1.' 23:59:59');
            }            
            
        }
        if(isset($endDate) && $endDate != 'null')
        {          
            $enddate1 = date('Y-m-d',strtotime($endDate));
            $query->where('created_at','<=',$enddate1);
        }          
          
        $query->where('role_id','=',3);
        return $query->orderBy('id','DESC')->paginate(10);
        
    }

    public function store(Request $request)
    {
        $email = $request->input('email');
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $fullName = $firstName.$lastName;
        $request->validate( 
        [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            /*'password' => 'required|string|min:8|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9*[!$#%]).*$/',*/
            'password' => 'required',
            'phone_number' => 'required|string|max:255',
            'location' => 'required',
            'postal_code'=>'required|numeric|digits:4',
            ],
            [
                'first_name.required' => 'First name is required!',
                'last_name.required' => 'Last name is required!',
                'email.required' => 'Email is required!',
                'password.required' => 'Password is required!',
                'email.unique' => 'This Email is already exits, Please try another!',
                'phone_number.required'=>'Phone number is required!',
                'location.required'=>'Location is required!',
                'postal_code.required'=>'Postal code is required!',
                'postal_code.numeric'=>'Postal code must be numeric type!',
                'postal_code.digits'=>'Postal code length must be 4 digits!',
            ]
            );
                         
          $password = $request->input('password');
          $dataUser = DB::table('users')->where('email',$email)->get();
          if($dataUser->isNotEmpty())
          {
            return response()->json(null,501);
          }
          else
          {             
             $user = new Users();
             $user->first_name = $request->input('first_name');
             $user->last_name = $request->input('last_name');             
             $user->email = $email; 
             $user->password = Hash::make($password);
             $user->mobile = $request->input('phone_number'); 
             $user->postal_code = $request->input('postal_code');
             $user->location = $request->input('location');  
             $user->verification_type = 1;
             $user->is_notify = $request->input('is_notify');
             $user->privacy = $request->input('privacy');
             $uploadedFile = $request->file('cv_file');
             if(!empty($uploadedFile))
             {
                $fileName = round(microtime(true) * 1000).'_'.$uploadedFile->getClientOriginalName();
                $uploadedFile->move(CVPATH, $fileName);
             }
             else
             {
                $fileName = '';
             }
             $user->cv_file = $fileName;
             $user->role_id = 3;  
             $user->status = 1;
             $user->is_verified = 1; 
             //dd($user);
             if($user->save())
             {

                 $data = 
                [   
                  'username'=>$fullName,         
                  'email'=>$email,
                  'password'=>$password
                ];
                $toEmail = $email;
                $toName = $fullName;
                $fromEmail = 'support@proslipsi.com';
                $fromName = 'Proslipsi';
                $subject = 'Create Account By Proslipsi';
                Mail::send('/frontend/mail/admin_create_candidate', $data, function($message)use ($toEmail, $toName, $fromEmail) {
                    $message->to($toEmail)->subject
                        ('Welcome');
                    $message->from($fromEmail,'Proslipsi');
                }); 
             }
             return response()->json([
                'message' => 'Record added successfully',
                'status' => 200
            ],200);
        }  

    }

    public function edit($id)
    {
       return $data = Users::where('id',$id)->first();
    }



public function export(Request $request)
{
    $roleId = 3;
    $dataFields = $request->input('fields');
    $filters = array_filter($request->input('filter'));
    //$order = $request->input('order');
    //$limit = $request->input('limit');
    //dd($filters);
    
    $fields = array();
    $headings = array();
    if(!empty($dataFields))
    {
        foreach ($dataFields as $key => $value) 
        {
            $fields[$key] = $key;                            
            $headings[] = $value;
                     
        }
    }
    
    Excel::store(new UsersExport($headings,$fields,$filters,$roleId), 'users.xlsx', 'export');
    $path = url('/').'/uploads/export/users.xlsx';
   // $path = 'http://localhost/proslipsi_vue/public/uploads/export/users.xlsx';
    return response()->json([
        'message' => 'Record edited successfully',
        'status' => 200,
        'path'=>$path
    ],200);
    //return Excel::download(new UsersExport($headings,$fields,$filters), 'users.xlsx');           
          
    }

    public function update(Request $request,$id= null)
    {  
        //dd($request);
        $email = $request->input('email');
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $fullName = $firstName.$lastName;
        $request->validate( 
        [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required','string','email',Rule::unique('users')->ignore($id)],
            /*'password' => 'required|string|min:8|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9*[!$#%]).*$/',*/
            'password' => 'required',
            'phone_number' => 'required|string|max:255',
            'location' => 'required',
            'verification_type'=>'required',
            'postal_code'=>'required|numeric|digits:4',
            ],
            [
                'first_name.required' => 'First name is required!',
                'last_name.required' => 'Last name is required!',
                'email.required' => 'Email is required!',
                'password.required' => 'Password is required!',
                'email.unique' => 'This Email is already exits, Please try another!',
                'email.email' => 'Please enter a valid email!',
                'phone_number.required'=>'Phone number is required!',
                'location.required'=>'Location is required!',
                'verification_type.required'=>'Verification type is required!',
                'postal_code.required'=>'Postal code is required!',
                'postal_code.numeric'=>'Postal code must be numeric type!',
                'postal_code.digits'=>'Postal code length must be 4 digits!',
            ]
            );
        
        $user=Users::where('id',$id)->get()->first();
        $user->first_name= $request->input('first_name');
        $user->email= $request->input('email');
        $user->last_name= $request->input('last_name');
        $user->mobile= $request->input('phone_number');
        $user->postal_code = $request->input('postal_code');
        $user->location= $request->input('location');   
        $user->verification_type = $request->input('verification_type');         
        $uploadedFile = $request->file('cv_file');        
        if(!empty($uploadedFile))
        {
            $fileName = round(microtime(true) * 1000).'_'.$uploadedFile->getClientOriginalName();
            $uploadedFile->move(CVPATH, $fileName);
        }
        else
        {           
            $fileName = $request->input('old_cv');
        }
        $user->cv_file = $fileName;
        $user->update();
        return response()->json([
            'message' => 'Record edited successfully',
            'status' => 200
        ],200);
    
    }

    public function view($id = null)
    {
       return $data = Users::where('id',$id)->first();
    }

    
    public function destroy($id = null)
    {
       DB::table('users')->where('id',$id)->delete();
       return response()->json(null,200);
    }

    public function changeStatus($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        if(!empty($data))
        {
            if($data->is_verified == 1)
            {
                DB::table('users')->where('id', $id)->update(['is_verified'=>0]);
                return response()->json([
                    'message' => 'Record un-verified successfully',
                    'status' => 200
                ],200);
            }
            else if($data->is_verified == 0)
            {
                DB::table('users')->where('id', $id)->update(['is_verified'=>1]);
                return response()->json([
                    'message' => 'Record verified successfully',
                    'status' => 200
                ],200);
            }            
        }
        else
        {
            return response()->json([
                'message' => 'Record not found!',
                'status' => 501
            ],200);
        }
    }


    public function verified($id)
    {
        $user=User::where('id',$id)->get()->first();

        if($user->is_verified=='0')
        {
            $user->is_verified=1;
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->update();
            return redirect()->back()->withFlashSuccess(__('Candidate Verified Successfully'));

        }elseif ($user->is_verified=='1') {
            $user->is_verified = 0;
            $user->update();
                return redirect()->back()->withFlashSuccess(__('Candidate Verified Successfully'));            
        }

    }

}
