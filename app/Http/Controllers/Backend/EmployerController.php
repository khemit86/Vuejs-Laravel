<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UserCategories;
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

class EmployerController extends Controller
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
            $query->where('name', 'LIKE', "%$search%")->where('role_id','=',3)->orWhere('company_name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%");
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
          
        $query->where('role_id','=',2);
        return $query->orderBy('id','DESC')->paginate(10);
        
    }

    public function store(Request $request)
    {
        $email = $request->input('email');       
        $fullName = $request->input('name');
        $verificationType = $request->input('verification_type');
        $phone = $request->input('mobile');
        $request->validate( 
        [
            'company_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'mobile' => 'required|digits:8|unique:users',
            'location' => 'required',
            'category'=>'required|array',
            'category.*'=>'required',
        ],
        [
            'company_name.required' => 'Company name is required!',
            'name.required' => 'Full name is required!',
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!',
            'email.unique' => 'This Email is already exits, Please try another!',
            'mobile.required'=>'Phone number is required!',
            'mobile.unique'=>'This Phone is already exits, Please try another!',
            'mobile.digits'=>'Phone number should be 8 digits!',
            'location.required'=>'Location is required!',
            'category.required'=>'Category is required!',
            
        ]);
          
        $category = $request->input('category');
        $password = $request->input('password');
        $user = new Users();
        $user->company_name = $request->input('company_name');
        $user->name = $request->input('name');             
        $user->email = $email; 
        $user->password = Hash::make($password);
        $user->mobile = $request->input('mobile');
        $user->vat_no = $request->input('vat_no');
        $user->country_id = $request->input('country_id'); 
        $user->location = $request->input('location');  
        $user->verification_type = 1;
        $user->company_description = $request->input('company_description');
        $user->is_notify = 1;
        $user->privacy = 1;           
        $user->role_id = 2;  
        $user->status = 1;
        $user->is_verified = 1;
        $user->link_expired = 1;        
        if($user->save())
        {            
            if(!empty($category))
            {
                foreach($category as $key => $value)
                {
                    if(is_array($value))
                    {
                        foreach($value as $key11 => $value11)
                        {
                            $userCate = new UserCategories();
                            $userCate->user_id = $user->id;
                            $userCate->parent_category_id =  $key;
                            $userCate->child_category_id = $value11;
                            $userCate->is_all_cat = 0;
                            $userCate->status = 1;     
                            $userCate->save(); 
                        }
                    }
                    else
                    {
                        $userCate = new UserCategories();
                        $userCate->user_id = $user->id;
                        $userCate->parent_category_id =  $key;
                        $userCate->is_all_cat = 1;
                        $userCate->status = 1;     
                        $userCate->save();        
                    }
                }
            }
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
            $subject = 'Welcome';
            Mail::send('/frontend/mail/admin_create_employer', $data, function($message)use ($toEmail, $toName, $fromEmail) {
                $message->to($toEmail)->subject
                    ('Welcome');
                $message->from($fromEmail,'Proslipsi');
            });   
            return response()->json([
                'message' => 'Employer registration successfully done',
                'status' => 200
            ],200);        
            
        }
        else
        {
            return response()->json([
                'message' => 'Opps! Registration not done!',
                'status' => 501
            ],200);
        } 

    }

    public function edit($id)
    {
       return $data = Users::where('id',$id)->with('userCategories')->first();
    }



public function export(Request $request)
{
    $roleId = 2;
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
        $email = $request->input('email');       
        $fullName = $request->input('name');
        $verificationType = $request->input('verification_type');
        $phone = $request->input('mobile');
        $request->validate( 
        [
            'company_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => ['required','string','email',Rule::unique('users')->ignore($id)],
            /*'password' => 'required|string|min:8|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9*[!$#%]).*$/',*/
            'password' => 'required',
            'mobile' => ['required','digits:8',Rule::unique('users')->ignore($id)],
            'location' => 'required',
            //'verification_type'=>'required',
            //'privacy'=>'required',
            'category'=>'required|array',
            'category.*'=>'required',
        ],
        [
            'company_name.required' => 'Company name is required!',
            'name.required' => 'Full name is required!',
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!',
            'email.unique' => 'This Email is already exits, Please try another!',
            'mobile.required'=>'Phone number is required!',
            'mobile.unique'=>'This Phone is already exits, Please try another!',
            'mobile.digits'=>'Phone number should be 8 digits!',
            'location.required'=>'Location is required!',
            //'verification_type.required'=>'Verification type is required!',
            'category.required'=>'Category is required!',
            
        ]);
        $category = $request->input('category');
        $password = $request->input('password');
        $user=Users::where('id',$id)->get()->first();
        $user->company_name = $request->input('company_name');
        $user->name = $request->input('name');             
        $user->email = $email; 
        $user->mobile = $request->input('mobile');
        $user->vat_no = $request->input('vat_no');
        $user->country_id = $request->input('country_id'); 
        $user->location = $request->input('location');  
        $user->company_description = $request->input('company_description');      
        if($user->save())
        {            
            if(!empty($category))
            {
                DB::table('user_categories')->where('user_id',$user->id)->delete();
                foreach($category as $key => $value)
                {
                    if(is_array($value))
                    {
                        foreach($value as $key11 => $value11)
                        {
                            $userCate = new UserCategories();
                            $userCate->user_id = $user->id;
                            $userCate->parent_category_id =  $key;
                            $userCate->child_category_id = $value11;
                            $userCate->is_all_cat = 0;
                            $userCate->status = 1;     
                            $userCate->save(); 
                        }
                    }
                    else
                    {
                        $userCate = new UserCategories();
                        $userCate->user_id = $user->id;
                        $userCate->parent_category_id =  $key;
                        $userCate->is_all_cat = 1;
                        $userCate->status = 1;     
                        $userCate->save();        
                    }
                }
            }
            return response()->json([
                'message' => 'Record edited successfully',
                'status' => 200
            ],200);        
            
        }
        else
        {
            return response()->json([
                'message' => 'Record not updated!',
                'status' => 501
            ],200);
        } 
    
    }

    public function view($id = null)
    {
       return $data = Users::where('id',$id)->with(['country','userCategories.categories'])->first();
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
