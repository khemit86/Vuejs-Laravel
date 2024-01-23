<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Session;

class BackendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user())
        {
            return response()->json([
                'message' => 'user login',
                'status' => 200,
                'data'=>Auth::user()
            ],200);
        }
        else
        {
            return response()->json([
                'message' => 'user login',
                'status' => 501,
                'data'=>Auth::user()
            ],200);
        }
        
    }
    public function checkAuth()
    {
        // $user = Auth::user();
        // dd($user);
        if(Auth::check())
        {
            if(Auth::user()->role_id == 1)
            {
                return response()->json([
                    'message' => 'login credentials!',
                    'status' => 200
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
   
    public function loginPost(Request $request)
    {       
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
        
         if(Auth::attempt($user_data))
         {
            $dataUser = Auth::user();        
            if($dataUser->role_id == 1)
            {
                return response()->json([
                    'message' => 'Loged in successfully',
                    'status' => 200,
                    'data'=> Auth::user()
                ],200);
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
                'message' => 'Invalid login credentials!',
                'status' => 501
            ],501);
         }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
    }
}
