<?php

namespace App\Http\Controllers\frontend\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use DB;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;
class CandidateAccountController extends Controller
{
    	
    public function __construct()
    {

    }

    public function getCandidate()
    {
        $userId = Auth::user()->id;
        return Users::where('id',$userId)->first();
    }
    
    public function changeemail(Request $request)
    {
        $oldEmail = Auth::user()->email;
        $userId = Auth::user()->id;
        $email = $request->input('email');
        $password = $request->input('password');
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
            $user_data = array(
                'email'  => $oldEmail,
                'password' => $password
               ); 
               if(Auth::attempt($user_data))
               {    
                  Users::where('id',$userId)->update(['email'=>$email]);
                  return response()->json([
                    'message' => 'Email updated successfully',
                    'status' => 200
                ],200);
               }
               else
               {
                    return response()->json([
                        'message' => 'Your password not matched!',
                        'status' => 501
                    ],200);
               }

    }

    public function changePassword(Request $request)
    {
        $request->validate( 
        [
            'current_password' => 'required|string|max:255',
            'new_password' => 'required|string|max:255',
            'confirm_password' => 'required|same:new_password',
        ],
        [
            'current_password.required' => 'Current password is required!',
            'new_password.required' => 'New password is required!',
            'confirm_password.required' => 'Confirm password is required!',
             'confirm_password.same' => 'New password and its confirm password not same!'
        ]
        );   
        $userId = Auth::user()->id;
        $oldPasswordHashed = Auth::user()->password;
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');
        if(Hash::check($currentPassword, $oldPasswordHashed))
        {
            $newPasswor = Hash::make($newPassword);
            Users::where('id',$userId)->update(['password'=>$newPasswor]);
            return response()->json([
                'message' => 'Password changed successfully',
                'status' => 200
            ],200);
        }
        else
        {
            return response()->json([
                'message' => 'Current password not matched!',
                'status' => 501
            ],200);
        }
    }

    public function deletePassword(Request $request)
    {
        $request->validate( 
        [
            'delete_password' => 'required|string|max:255',                
        ],
        [
            'delete_password.required' => 'Password is required!',
        ]
        );
        $email = Auth::user()->email;
        $password = $request->input('delete_password');
        $user_data = array(
            'email'  => $email,
            'password' => $password
           ); 
           if(Auth::attempt($user_data))
           {
                Users::where('email',$email)->delete();
                Auth::logout();
                Session::flush();
                return response()->json([
                    'message' => 'Account Deleted Successfully',
                    'status' => 200
                ],200);
           }
           else
           {
                return response()->json([
                    'message' => 'Password not matched!',
                    'status' => 501
                ],200);
           }
        
    }

}
