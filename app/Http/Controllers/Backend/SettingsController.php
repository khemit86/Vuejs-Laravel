<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Log;
use DB;
class SettingsController extends Controller
{
    public function __construct()
    {
     
    }

   
    public function index()
    {        
        $result = array();
        $data = DB::table('settings')->get();
        if(!empty($data))
        {
            foreach($data as $key=>$value)
            {
                $result[$value->name] = $value->val;
            }
        }
        return $result;
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        if(!empty($requestData))
        {
            foreach($requestData as $key => $value)
            {
                Setting::where('name', $key)->update(array('val' => $value));
            }
            return response()->json([
                'message' => 'Record updated successfully',
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
}
