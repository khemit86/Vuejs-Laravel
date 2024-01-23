<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsletterSubscribers;
use App\Models\Categories;
use App\Models\SubscriptionPlans;
use App\Models\SingleJob;
use App\Models\UserCategories;
use App\Models\Offers;
use App\Models\SingleJobAmounts;
use App\Models\Addons;
use App\Models\UserSubscriptionPlans;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use telesign\sdk\messaging\MessagingClient;
use Session;
class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function getPricing()
    {        
        $result = array();
        $singleJobData = SingleJob::with(['SingleJobAmounts'=>function($q){

            $q->where('quantity_from',1);
        }])->first();
       
        $dataSubscription = SubscriptionPlans::where('status',1)->get();
        $dataOffers = Offers::where('offer_type',1)->first();
        $addOnData1 = Addons::where('addon_for',1)->orderBy('position','asc')->get();
        $addOnData2 = Addons::where('addon_for',2)->orderBy('position','asc')->get();
        $singleAddon = Addons::where('addon_for',3)->orderBy('position','asc')->first();
        $result['singleJobData'] = $singleJobData;
        $result['dataSubscription'] = $dataSubscription;
        $result['dataOffers'] = $dataOffers;
        $result['addOnData']['singlejob'] = $addOnData1;
        $result['addOnData']['plan'] = $addOnData2;
        $result['singleAddon'] = $singleAddon;
        return response()->json([
            'message' => 'success',
            'status' => 200,
            'data'=>$result
        ],200);
    }

    public function getPricing11(Request $request)
    {        
        $planId = $request->query('planId');
        $dataUserSubscription = UserSubscriptionPlans::where('id',$planId)->first();
        $planQty = $dataUserSubscription->plan_qty - $dataUserSubscription->plan_used_qty;
        if(!empty($dataUserSubscription))
        {
            $result = array();
            $singleJobData = SingleJob::with(['SingleJobAmounts'=>function($q) use($planQty){

                $q->where('quantity_from',$planQty);
            }])->first();
        
            $dataSubscription = SubscriptionPlans::where('status',1)->get();
            $dataOffers = Offers::where('offer_type',1)->first();
            $addOnData1 = Addons::where('addon_for',1)->orderBy('position','asc')->get();
            $addOnData2 = Addons::where('addon_for',2)->orderBy('position','asc')->get();
            $singleAddon = Addons::where('addon_for',3)->orderBy('position','asc')->first();
            $result['singleJobData'] = $singleJobData;
            $result['dataSubscription'] = $dataSubscription;
            $result['dataOffers'] = $dataOffers;
            $result['addOnData']['singlejob'] = $addOnData1;
            $result['addOnData']['plan'] = $addOnData2;
            $result['singleAddon'] = $singleAddon;
            return response()->json([
                'message' => 'success',
                'status' => 200,
                'data'=>$result,
                'qty'=>$planQty
            ],200);
        }
        else
        {
            return response()->json([
                'message' => 'success',
                'status' => 500,
                'data'=>'',
            ],200);
        }
        
    }

    
    public function privacy()
    {
        $body_class = '';

        return view('frontend.privacy', compact('body_class'));
    }

    /**
     * Terms & Conditions Page
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        $body_class = '';
        return view('frontend.terms', compact('body_class'));
    }

    public function getParentCategory()
    {
        $result = array();
        $data = Categories::where('parent_id',0)->where('status',1)->get();
        if($data->isNotEmpty())
        {
            $i=0;
            foreach($data as $key=>$value)
            {
                $result[$i] = array('id'=>$value->id,'name'=>$value->name);
                $i++;
            }
            return $result;
        }
    }

    public function getChildCategory($parent_category_id = null)
    {
        $parentId = $parent_category_id;
        $result = array();
        $html = '';
        $data = Categories::where('parent_id',$parentId)->where('status',1)->get();
        if($data->isNotEmpty())
        {
            $i=0;
            $html .= '<select class="form-control" name="child_category_id" id="child_category_id">';
            foreach($data as $key=>$value)
            {
                $html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
                $result[$i] = array('id'=>$value->id,'name'=>$value->name);
                $i++;
            }
            $html .= '</select>';
            return $html;
        }
    }

    


    public function getCategory()
    {
        $result = array();
        $result1 = array();
        $data = Categories::where('status',1)->get();
        if($data->isNotEmpty())
        {            
            foreach ($data as $key => $value)
            {
                if($value->parent_id == 0)
                {
                    $result[$value->id][$value->id] = $value->name;
                }
                else if($value->parent_id > 0)
                {
                    $result[$value->parent_id][$value->id] = $value->name;
                }
            }           
            $j = 0;
            foreach ($result as $key11 => $value11)
            {
                if(!empty($value11))
                {
                    $i = 0;
                    foreach ($value11 as $key22 => $value22)
                    {
                        if($i == 0)
                        {
                             $result1[$j]['parent'] = array('id'=>$key22,'value'=>$value22);
                        }
                        else
                        {
                            $result1[$j]['child'][] = array('id'=>$key22,'value'=>$value22);
                        }
                        $i++;
                    }
                }
                $j++;
            }           
           return $result1; 
        }
        else
        {
            return $result;
        }
    }

    public function getCategoryEdit($userId = null)
    {
        return $data = DB::table('user_categories')->where('user_id',$userId)->get();
    }

    public function getCountries()
    {
        return DB::table('countries')->get();
    }

    public function addSubscription(Request $request)
    {
        $request->validate( 
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',                
            ],
            [
                'name.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Please enter a valid email!',                
            ]
            ); 
        $email = $request->input('email');
        $data = NewsletterSubscribers::where('email',$email)->first();
        if(!empty($data))
        {
            return response()->json([
                'message' => 'This Email already subscribed, please try another one!',
                'status' => 501
            ],200);
        }
        else
        {
            $tbl = new NewsletterSubscribers;
            $tbl->name = $request->input('name');
            $tbl->email = $request->input('email');
            $tbl->status = 1;
            $tbl->save();
            return response()->json([
                'message' => 'Thank you for subscribing!',
                'status' => 200
            ],200);
        }
    }
    public function getSingleJobAmounts(Request $request)
    {
        $quantity = $request->input(0);
        $addOnAmount = $request->input(1);
        $isWithPremium = $request->input(2);
        $addonId = $request->input(3); 
        $planType =  $request->input(4);
        $planAmount =  $request->input(5);
        $planId =  $request->input(6);
        if($addonId > 0)
        {
            $dataAddon = DB::table('addon_amounts')->select('amount')->where('quantity_from','<=',$quantity)->where('quantity_to','>=',$quantity)->where('addon_id','=',$addonId)->first();
            if(!empty($dataAddon))
            {
                $addOnAmount = $dataAddon->amount*$quantity;
            }
            else
            {
                if($quantity > 1)
                {
                    $dataAddon = DB::table('addon_amounts')->select('amount')->where('quantity_from','<=',$quantity)->orderBy('id','desc')->where('addon_id','=',$addonId)->first();
                    if(!empty($dataAddon))
                    {
                        $addOnAmount = $dataAddon->amount*$quantity;
                    }
                }
                else if($quantity <= 1)
                {
                    $dataAddon = DB::table('addon_amounts')->select('amount')->where('quantity_from','>=',$quantity)->where('addon_id','=',$addonId)->orderBy('id','asc')->first();
                    if(!empty($dataAddon))
                    {
                        $addOnAmount = $dataAddon->amount*$quantity;
                    }
                }              
            }
        }
        else
        {
            $addOnAmount = 0;
        }

        if($planType == 1)
        {
            $data = SingleJobAmounts::select('amount')->where('quantity_from','<=',$quantity)->where('quantity_to','>=',$quantity)->first();
            if(!empty($data))
            {
                $singleAmount = $data['amount']*$quantity;
                $finalAmount = $singleAmount+$addOnAmount;
                return response()->json([
                    'message' => 'Success',
                    'amount'=>$finalAmount,
                    'plan_amount'=>$singleAmount,
                    'addon_amount'=>$addOnAmount,
                    'status' => 200
                ],200);
            }
            else
            {
                return response()->json([
                    'message' => 'Something went wronge! Please try after sometimes!!',
                    'status' => 501
                ],200);
            }
        }
        else if($planType == 2)
        {
            $dataAddon  =  DB::table('addon_amounts')->select('amount')->where('quantity_from','<=',$quantity)->where('quantity_to','>=',$quantity)->where('addon_id','=',$planId)->first();
            if(!empty($dataAddon))
            {
                $finalAmount = $dataAddon->amount*$quantity;
                return response()->json([
                    'message' => 'Success',
                    'amount'=>$finalAmount,
                    'plan_amount'=>0,
                    'addon_amount'=>$finalAmount,
                    'status' => 200
                ],200);
            }
            else
            {
                return response()->json([
                    'message' => 'Something went wronge! Please try after sometimes!!',
                    'status' => 501
                ],200);
            }
        }
        else if($planType == 3)
        {
            $finalAmount = $planAmount+$addOnAmount;                    
            return response()->json([
                'message' => 'Success',
                'amount'=>$finalAmount,
                'plan_amount'=>$planAmount,
                'addon_amount'=>$addOnAmount,
                'status' => 200
            ],200); 
        }        
    }

    public function candidateRegister(Request $request)
    {
        $email = $request->input('email');
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $verificationType = $request->input('verification_type');
        $fullName = $firstName.' '.$lastName;
        $phone = $request->input('mobile');
        $request->validate( 
        [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            /*'password' => 'required|string|min:8|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9*[!$#%]).*$/',*/
            'password' => 'required',
            'mobile' => 'required|string|max:255|unique:users',
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
                'mobile.required'=>'Phone number is required!',
                'mobile.unique'=>'This Phone is already exits, Please try another!',
                'location.required'=>'Location is required!',
                'verification_type.required'=>'Verification type is required!',
                'postal_code.required'=>'Postal code is required!',
                'postal_code.numeric'=>'Postal code must be numeric type!',
                'postal_code.digits'=>'Postal code length must be 4 digits!',
            ]
            );
            $password = $request->input('password');
            $user = new Users();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');             
            $user->email = $email; 
            $user->password = Hash::make($password);
            $user->mobile = $phone;
            $user->postal_code = $request->input('postal_code'); 
            $user->location = $request->input('location');  
            $user->verification_type = $verificationType;
            $user->is_notify = $request->input('is_notify');
            $user->privacy = $request->input('privacy');
            $uploadedFile = $request->file('cv_file');
            if(!empty($uploadedFile) && $uploadedFile->isValid())
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
            $user->is_verified = 0; 
            $user->link_expired = 0;
            if($user->save())
            {       
                $uId = 'C'.sprintf("%'.05d\n", $user['id']);
                //$uId = 'C'.$user['id'].mt_rand(100000, 999999);
                DB::table('users')->where('id',$user['id'])->update(['u_id'=>$uId]);
                if($verificationType == 1)
                {
                     //$secret = "35onoi2=-7#%g03kl";
                     //$secret1 = urlencode($secret);
                    // $hash = MD5($email.$secret);
                    $data = 
                    [   
                        'username'=>$fullName,         
                        'name'=>$email,
                        'link'=>url('/emailVerify/'.urlencode(base64_encode($email)))
                    ];
                    $toEmail = $email;
                    $toName = $fullName;
                    $fromEmail = 'support@proslipsi.com';
                    $fromName = 'Proslipsi';
                    $subject = 'Account Verification';
                    Mail::send('/frontend/mail/verification', $data, function($message)use ($toEmail, $toName, $fromEmail) {
                        $message->to($toEmail)->subject
                            ('Account Verification');
                        $message->from($fromEmail,'Proslipsi');
                    });
                    return response()->json([
                        'message' => 'Registration Successfully Done! Please Verify your account by email verification!',
                        'status' => 200,
                        'verification_type'=>1
                    ],200);
            }
            else if($verificationType == 2)
            {
                require base_path() . '/vendor/autoload.php';            
                $customer_id = "EAB7F370-7C2B-4464-BBD8-A026888E1B4F";
                $api_key = "GyMU2aqm8QJij7AIfM7x+8WFG0DnkmaBLWEQ3jyT1MbqxoUgDAdJJ4nANMqrmzasHFWdjxvn03fR9QNa2zLbMQ==";
                $phone_number = "357".$phone;
                //echo $phone_number; die;
                $digits = 4;                
                $verify_code = rand(pow(10, $digits-1), pow(10, $digits)-1);
                $message = "Your proslipsi verification code is $verify_code";
                $message_type = "OTP";                
                $messaging = new MessagingClient($customer_id, $api_key);
                $response = $messaging->message($phone_number, $message, $message_type);
                Users::where('id','=',$user->id)->update(['otp' => $verify_code]);  
                //dd($response);
                return response()->json([
                    'message' => 'Registration Successfully done, Please enter OTP to verify!',
                    'status' => 200,
                    'verification_type'=>2
                ],200);
            }   
            }
            else
            {
                return response()->json([
                    'message' => 'Opps! Registration not done!',
                    'status' => 501
                ],200);
            }
    }

    public function employerRegister(Request $request)
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
                /*'password' => 'required|string|min:8|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9*[!$#%]).*$/',*/
                'password' => 'required',
                'mobile' => 'required|string|max:255|unique:users',
                'location' => 'required',
                'verification_type'=>'required',
                'privacy'=>'required',
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
                'location.required'=>'Location is required!',
                'verification_type.required'=>'Verification type is required!',
                'category.required'=>'Category is required!',
                
            ]
        );
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
        $user->verification_type = $request->input('verification_type');
        $user->company_description = $request->input('company_description');
        $user->is_notify = $request->input('is_notify');
        $user->privacy = $request->input('privacy');             
        $user->role_id = 2;  
        $user->status = 1;
        $user->is_verified = 0;
        $user->link_expired = 0;        
        if($user->save())
        {            
            //$uId = 'E'.$user['id'].mt_rand(100000, 999999);
            $uId = 'E'.sprintf("%'.05d\n", $user['id']);
            DB::table('users')->where('id',$user['id'])->update(['u_id'=>$uId]);
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
            if($verificationType == 1)
            {
                $data = 
                [   
                    'username'=>$fullName,         
                    'name'=>$email,
                    'link'=>url('/emailVerify/'.urlencode(base64_encode($email)))
                ];
                $toEmail = $email;
                $toName = $fullName;
                $fromEmail = 'support@proslipsi.com';
                $fromName = 'Proslipsi';
                $subject = 'Account Verification';
                Mail::send('/frontend/mail/employer_verification', $data, function($message)use ($toEmail, $toName, $fromEmail) {
                    $message->to($toEmail)->subject
                        ('Account Verification');
                    $message->from($fromEmail,'Proslipsi');
                });
                return response()->json([
                    'message' => 'Registration Successfully Done! Please Verify your account by email verification!',
                    'status' => 200,
                    'verification_type'=>1
                ],200);
            }
            else if($verificationType == 2)
            {
                require base_path() . '/vendor/autoload.php';            
                $customer_id = "EAB7F370-7C2B-4464-BBD8-A026888E1B4F";
                $api_key = "GyMU2aqm8QJij7AIfM7x+8WFG0DnkmaBLWEQ3jyT1MbqxoUgDAdJJ4nANMqrmzasHFWdjxvn03fR9QNa2zLbMQ==";
                $phone_number = "357".$phone;
                $digits = 4;                
                $verify_code = rand(pow(10, $digits-1), pow(10, $digits)-1);
                $message = "Your proslipsi verification code is $verify_code";
                $message_type = "OTP";                
                $messaging = new MessagingClient($customer_id, $api_key);
                $response = $messaging->message($phone_number, $message, $message_type);
                Users::where('id','=',$user->id)->update(['otp' => $verify_code]);  
                //dd($response);
                return response()->json([
                    'message' => 'Registration Successfully done, Please enter OTP to verify!',
                    'status' => 200,
                    'verification_type'=>2
                ],200);
            }           
            
        }
        else
        {
            return response()->json([
                'message' => 'Opps! Registration not done!',
                'status' => 501
            ],200);
        }
        
    }

    public function forgotPassword(Request $request)
    {
        $request->validate( 
        [
            'email' => 'required|string|email|max:255',                
        ],
        [
            'email.required' => 'Email is required!',
            'email.email' => 'Please enter a valid email!',                
        ]
        ); 
        $email = $request->input('email');
        $dataUser = DB::table('users')->where('email',$email)->first();
        if(!empty($dataUser))
        {
            // if($dataUser->is_verified == 0)
            // {
            //     return response()->json([
            //         'message' => 'Your account not verified yet, Please verify your account first!',
            //         'status' => 501
            //     ],200);
            // }
            if($dataUser->role_id == 2)
            {
                $username = $dataUser->company_name;
            }
            else
            {
                $username = $dataUser->first_name.' '.$dataUser->last_name;
            }
            $data = 
                [   
                  'username'=>$username,         
                  'name'=>$dataUser->email,
                  'link'=>url('/resetpassword/'.base64_encode($dataUser->email))
                ];
                
                $toEmail = $dataUser->email;
                $toName = $dataUser->email;
                $fromEmail = 'support@proslipsi.com';
                $fromName = 'Proslipsi';
                $subject = 'Forgot Password';
                Mail::send('/frontend/mail/forgot', $data, function($message)use ($toEmail, $toName, $fromEmail) {
                    $message->to($toEmail)->subject
                       ('Forgot Password');
                    $message->from($fromEmail,'Proslipsi');
                 });
                 if (Mail::failures()) {
                            echo 'fail'; die;
                }
                DB::table('users')->where('id','=',$dataUser->id)->update(['forgot_link_time_out'=>date('Y-m-d H:i:s',strtotime('+30 minutes')),'link_expired'=>0]);
                 return response()->json([
                    'message' => 'Please check your email for reset password',
                    'status' => 200
                ],200);
        }
        else
        {
            return response()->json([
                'message' => 'This email not exist! Please try another one!',
                'status' => 501
            ],200);
        }
    }

    public function loginPost(Request $request,$url = null)
    {       
        $employerFunctions = array('/employer/postjob','employer/index','employer/jobs');
        $candidateFunctions = array('/candidate/profile');
        $url = $request->query('url');
           $user_data = array(
          'email'  => $request->input('email'),
          'password' => $request->input('password')
         );

         $request->validate( 
        [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ],
        [
            'email.required' => 'Email is required!',
            'email.email' => 'Please enter a valid email!',
            'password.required' => 'Password is required!',
        ]
        );        
        $dataUser = DB::table('users')->where('email',$user_data['email'])->first();        
         if(empty($dataUser))
         {
            return response()->json([
                'message' => 'Invalid login credentials!',
                'status' => 501
            ],501);
         }
         else
         {
            if(Auth::attempt($user_data))
            {
                if($dataUser->is_verified == 1)
                {
                    if($dataUser->role_id == 2 || $dataUser->role_id == 3)
                    {         
                        if($dataUser->role_id == 2)
                        {
                            if(!empty($url))
                            {
                                if(in_array($url,$employerFunctions))
                                {
                                    $dataUser = Auth::user();
                                    return response()->json([
                                        'message' => 'Loged in successfully',
                                        'status' => 200,
                                        'data'=> Auth::user(),
                                        'url'=>$url,
                                    ],200);
                                }
                                else
                                {
                                    $dataUser = Auth::user();
                                    return response()->json([
                                        'message' => 'Loged in successfully',
                                        'status' => 200,
                                        'data'=> Auth::user(),
                                        'url'=>'/employer/index',
                                    ],200);
                                }
                            }
                            else
                            {
                                $dataUser = Auth::user();
                                return response()->json([
                                    'message' => 'Loged in successfully',
                                    'status' => 200,
                                    'data'=> Auth::user(),
                                    'url'=>'/employer/index',
                                ],200);
                            }
                        }
                        else if($dataUser->role_id == 3)
                        {
                            if(!empty($url))
                            {
                                if(in_array($url,$candidateFunctions))
                                {
                                    $dataUser = Auth::user();
                                    return response()->json([
                                        'message' => 'Loged in successfully',
                                        'status' => 200,
                                        'data'=> Auth::user(),
                                        'url'=>$url,
                                    ],200);
                                }
                                else
                                {
                                    $dataUser = Auth::user();
                                    return response()->json([
                                        'message' => 'Loged in successfully',
                                        'status' => 200,
                                        'data'=> Auth::user(),
                                        'url'=>'/candidate/profile',
                                    ],200);
                                }
                            }
                            else
                            {
                                $dataUser = Auth::user();
                                return response()->json([
                                    'message' => 'Loged in successfully',
                                    'status' => 200,
                                    'data'=> Auth::user(),
                                    'url'=>'/candidate/profile',
                                ],200);
                            }
                        }           
                        
                    }
                    else
                    {
                        return response()->json([
                            'message' => 'Invalid login credentials!',
                            'status' => 501
                        ],501);
                    }
                }
                else
                {
                    return response()->json([
                        'message' => 'Your account not verified!',
                        'status' => 502
                    ],502);
                }
                
                
            }
            else
            {
                return response()->json([
                    'message' => 'Invalid login credentials!',
                    'status' => 501
                ],501);
            }
         }
        
         
    }

    public function checkAuth()
    {   
        $user = Auth::user();                       
        //dd($user);
        if(Auth::check())
        {
            if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
            {
                return response()->json([
                    'message' => 'login credentials!',
                    'status' => 200,
                    'data'=>$user,
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'Invalid login credentials!',
                    'status' => 501
                ]);
            }
           
        }
        else
        {
            return response()->json([
                'message' => 'Invalid login credentials!',
                'status' => 501
            ]);
        }
    }

    public function emailVerify($email = null)
    {
       if(!empty($email))
       {           
           $email = urldecode(base64_decode($email));
           $dataUser = Users::where('email','=',$email)->first();     
           $companyName = '';
           if(!empty($dataUser))
           {               
               //dd($dataUser->link_expired);
                if($dataUser->link_expired == 0)
                {
                    if(Auth::loginUsingId($dataUser->id))
                    {       
                        $user = Auth::user();                                            
                        DB::table('users')->where('id',$dataUser->id)->update(['email_verified_at'=>date('Y-m-d H:i:s'),'is_verified'=>1]);
                        if($dataUser->role_id == 2)
                        {
                            $username = $dataUser->name;
                            $companyName = $dataUser->company_name;
                        }
                        else
                        {
                            $username = $dataUser->first_name.' '.$dataUser->last_name;
                        }
                       
                            
                            $toEmail = $dataUser->email;
                            $toName = $dataUser->email;
                            $fromEmail = 'support@proslipsi.com';
                            $fromName = 'Proslipsi';
                            $subject = 'Proslipsi Welcome';
                            if($dataUser->role_id == 3)
                            {
                                $data = 
                                [   
                                  'username'=>$username,
                                ];
                                Mail::send('/frontend/mail/welcome', $data, function($message)use ($toEmail, $toName, $fromEmail) {
                                    $message->to($toEmail)->subject
                                    ('Proslipsi Welcome');
                                    $message->from($fromEmail,'Proslipsi');
                                });
                            }
                            else if($dataUser->role_id == 2)
                            {
                                $data = 
                                [   
                                  'username'=>$username,
                                  'companyName'=>$companyName
                                ];
                                Mail::send('/frontend/mail/employer_welcome', $data, function($message)use ($toEmail, $toName, $fromEmail) {
                                    $message->to($toEmail)->subject
                                    ('Proslipsi Welcome');
                                    $message->from($fromEmail,'Proslipsi');
                                });
                            }
                           
                        DB::table('users')->where('id','=',$dataUser->id)->update(['link_expired'=>1]);
                        return response()->json([
                            'message' => 'Email verified successfully!',
                            'status' => 200,
                            'role_id'=>$dataUser->role_id,
                            'data'=>$user,
                        ]);                        
                    }                    
                }
                else
                {
                   
                    return response()->json([
                        'message' => 'Email verification link expired!',
                        'status' => 501
                    ]);
                }
                
           }
           else
           {
                //return redirect()->route('frontend.login');
                return response()->json([
                    'message' => 'Email not verified!',
                    'status' => 501
                ]);
           }
       }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate( 
            [
                'otp' => 'required',
            ],
            [
                'otp.required' => 'OTP is required!',
                                
            ]
        );       
        $otp = (string)$request->input('otp');      
        //echo $otp; die;   
        $dataUser = DB::table('users')->where('otp','=',$otp)->first();       
        if(!empty($dataUser))
        {        
            if(Auth::loginUsingId($dataUser->id))
            {
                DB::table('users')->where('id',$dataUser->id)->update(['email_verified_at'=>date('Y-m-d H:i:s'),'is_verified'=>1,'otp'=>'']);
                if($dataUser->role_id == 2)
                {
                    $username = $dataUser->company_name;
                }
                else
                {
                    $username = $dataUser->first_name.' '.$dataUser->last_name;
                }
                $data = 
                    [   
                    'username'=>$username,
                    ];
                    
                    $toEmail = $dataUser->email;
                    $toName = $dataUser->email;
                    $fromEmail = 'support@proslipsi.com';
                    $fromName = 'Proslipsi';
                    $subject = 'Proslipsi Welcome';
                    Mail::send('/frontend/mail/welcome', $data, function($message)use ($toEmail, $toName, $fromEmail) {
                        $message->to($toEmail)->subject
                        ('Proslipsi Welcome');
                        $message->from($fromEmail,'Proslipsi');
                    });
                return response()->json([
                    'message' => 'OTP verified successfully',
                    'status' => 200,
                    'role_id'=>$dataUser->role_id,
                    'data'=>$dataUser
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'Please enter a valid OTP!',
                    'status' => 501,                    
                ]);
            }
           
        }
        else
        {   
            return response()->json([
                'message' => 'Please enter a valid OTP!',
                'status' => 501,
                
            ]);

        }
        
    }

    // public function reset($email = null)
    // {
    //     $email = base64_decode($email);
    //     $container = DB::table('users')->where('email',$email)->first();
    //     if(!$container)
    //     {
    //         return response()->json([
    //             'message' => 'Your account not found in our sysyem!',
    //             'status' => 501,                
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'message' => 'Success',
    //             'status' => 200,
    //             ''
                
    //         ]);
    //     }
    //     return view('auth.reset_password')->with('email',$email);
    // }

    public function checkForgotExpired($email = null)
    {
        $email = base64_decode($email);
        $container = DB::table('users')->where('email',$email)->first();
        $currentTime = date('Y-m-d H:i:s');        
        if($currentTime <= $container->forgot_link_time_out && $container->link_expired == 0)
        {
            if(!$container)
            {
                return response()->json([
                                'message' => 'Your account not found in our sysyem!',
                                'status' => 501,               
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'Success',
                    'status' => 200,               
                ]); 
            }
        }
        else
        {
            return response()->json([
                'message' => 'Forgot password link expired, please try again!',
                'status' => 501,               
            ]);
        }
    }

    public function resetPassword(Request $request,$email = null)
    {
        $request->validate( 
            [
                'password' => 'required|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'required',
            ],
            [
                'password.required' => 'Password is required!',
                'password.same' => "Password and it's confirm password is not same!",
                'confirm_password.required' => 'Confirm Paasword is required!',                               
            ]
        );
        $email = base64_decode($email);
        $password = $request->input('password');
        $container = DB::table('users')->where('email',$email)->first();
        $currentTime = date('Y-m-d H:i:s');        
        
            if(!$container)
            {
                return response()->json([
                                'message' => 'Your account not found in our sysyem!',
                                'status' => 501,               
                ]);
            }
            else
            {
                $password = Hash::make($password);
                $user = DB::table('users')->where('email', $email)->update(array('password' =>$password));
                if($container->role_id == 2)
                {
                    $username = $container->company_name;
                }
                else
                {
                    $username = $container->first_name.' '.$container->last_name;
                }
                $data = 
                    [   
                    'username'=>$username,
                    ];
                    
                    $toEmail = $container->email;
                    $toName = $container->email;
                    $fromEmail = 'support@proslipsi.com';
                    $fromName = 'Proslipsi';
                    $subject = 'Reset Password';
                    Mail::send('/frontend/mail/reset', $data, function($message)use ($toEmail, $toName, $fromEmail) {
                        $message->to($toEmail)->subject
                        ('Reset Password');
                        $message->from($fromEmail,'Proslipsi');
                    });
                return response()->json([
                    'message' => 'Reset password successfully! Now you can login with your new password',
                    'status' => 200,               
                ]);
            }        
    }

    public function addPricing(Request $request)
    {
        $reqData = $request->all();
        //dd($reqData);        
        $result = array();
        if(!empty($reqData))
        {
            $planType = $reqData['plan_type'];
            $id = $reqData['id'];
            $qty = $reqData['qty'];
            $amount = $reqData['amount'];
            $planAmount = $reqData['plan_amount'];
            $addonAmount = $reqData['addon_amount'];
            $addonId = $reqData['addon_id'];
            $result['id'] = $id;           
            $result['addonId'] = $addonId;
            if($planType == 1)
            {
                $result['plan_type'] = 1;
                $dataSingleJob = DB::table('single_job')->where('id',$id)->first();
                $result['plan_title'] = isset($dataSingleJob->title)?$dataSingleJob->title:'';
                
                if($addonId > 0)
                {
                    $dataAddon = DB::table('addons')->where('id',$addonId)->first();                    
                    $result['addon_title'] = isset($dataAddon->title)?$dataAddon->title:'';
                    $result['addon_type'] = isset($dataAddon->type)?$dataAddon->type:'';
                    $result['addon_qty'] = $qty;
                }
                else
                {
                    $result['addon_qty'] = 0;
                }
                $result['plan_qty'] = $qty;
                $result['amount'] = $amount;
            }
            else if($planType == 2)
            {
                $result['plan_type'] = 2;
                $dataAddon = DB::table('addons')->where('id',$id)->first();
                $result['plan_title'] = isset($dataAddon->title)?$dataAddon->title:'';
                $result['addon_type'] = isset($dataAddon->type)?$dataAddon->type:'';
                $result['addon_qty'] = $qty;
                $result['plan_qty'] = $qty;
                $result['amount'] = $amount;
               
            }
            else if($planType == 3)
            {
                $dataSubscription = DB::table('subscription_plans')->where('id',$id)->first();
                $result['plan_title'] = isset($dataSubscription->title)?$dataSubscription->title:'';            
                $result['amount'] = $amount;
                $result['plan_qty'] = 1;                
                if($addonId > 0)
                {
                    $result['plan_type'] = 3;
                    $dataAddon = DB::table('addons')->where('id',$addonId)->first();
                    $result['addon_title'] = isset($dataAddon->title)?$dataAddon->title:'';
                    $result['addon_type'] = isset($dataAddon->type)?$dataAddon->type:'';
                    $result['addon_qty'] = $qty;
                }
                else
                {
                    $result['plan_type'] = 4;
                    $result['addon_qty'] = 0;
                }                             
                
            }   
            $result['plan_amount'] = $planAmount;
            $result['addon_amount'] = $addonAmount;         
            $vat = DB::table('settings')->where('name','vat')->first();
            $result['vat'] = isset($vat->val)?$vat->val:0;     
            Session::forget('dataPricing');
            Session::put('dataPricing', $result);
            return response()->json([
                'message' => 'success',
                'status' => 200,               
            ]);
        }
        else
        {
            return 0;
        }
    }

    public function checkSubscriptionPackage(Request $request)
    {
        $userId = Auth::user()->id;
        $planId = $request->input(0);
        $type = $request->input(1);
        $isValid = 1;        
        if($type >= 3)
        {
            $dataSubscription = SubscriptionPlans::where('id',$planId)->first();                    
            $data = UserSubscriptionPlans::with('subscriptionPlan')->where(['user_id'=>$userId,'active'=>1])->whereIn('plan_type',[3,4])->get();          
            if(!empty($data) && !empty($dataSubscription))
            {                
                foreach($data as $key => $value)
                {          
                   // echo $dataSubscription->amount.'  '. $value['subscriptionPlan']->amount;
                    if($dataSubscription->amount <= $value['subscriptionPlan']->amount)
                    {                                        
                        $isValid = 0;
                        break;
                    }
                }  
                          
                if($isValid == 1)
                {
                    return 1;
                }
                else 
                {
                    return 0;
                }
            }
            else
            {
                return 1;
            }
        }
        else
        {
            return 1;
        }
        
    }

    public function checkSubscriptionPackageFront(Request $request)
    {
        $userId = Auth::user()->id;
        $dataPrice = Session::get('dataPricing');
        $planId = $dataPrice['id'];
        $type = $dataPrice['plan_type'];
        $isValid = 1;        
        if($type >= 3)
        {
            $dataSubscription = SubscriptionPlans::where('id',$planId)->first();                    
            $data = UserSubscriptionPlans::with('subscriptionPlan')->where(['user_id'=>$userId,'active'=>1])->whereIn('plan_type',[3,4])->get();          
            if(!empty($data) && !empty($dataSubscription))
            {                
                foreach($data as $key => $value)
                {          
                   // echo $dataSubscription->amount.'  '. $value['subscriptionPlan']->amount;
                    if($dataSubscription->amount <= $value['subscriptionPlan']->amount)
                    {                                        
                        $isValid = 0;
                        break;
                    }
                }  
                          
                if($isValid == 1)
                {
                    return 1;
                }
                else 
                {
                    return 0;
                }
            }
            else
            {
                return 1;
            }
        }
        else
        {
            return 1;
        }
        
    }

    
}
