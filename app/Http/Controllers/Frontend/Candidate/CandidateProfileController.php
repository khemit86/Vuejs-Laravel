<?php

namespace App\Http\Controllers\frontend\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\CandidateLookingInfo;
use App\Models\CandidateSkillInfo;
use App\Models\CandidateWorkInfo;
use DB;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;
class CandidateProfileController extends Controller
{
    	
    public function __construct()
    {

    }

    public function getCandidateProfile()
    {
        $userId = Auth::user()->id;
        return Users::with(['candidateWorkInfo','candidateSkillInfo'])->where('id',$userId)->first();
       
    }

    public function uploadCV(Request $request)
    {
        $userId = Auth::user()->id;
        $uploadedFile = $request->file('cv_file');
        if(!empty($uploadedFile) && $uploadedFile->isValid())
        {
            $userdata = Users::where('id',$userId)->first();
            if(file_exists(CVPATH.$userdata->cv_file))
            {
                //unlink(CVPATH.$userdata->cv_file);
            }
            $fileName = round(microtime(true) * 1000).'_'.$uploadedFile->getClientOriginalName();
            $uploadedFile->move(CVPATH, $fileName);
            Users::where('id',$userId)->update(['cv_file'=>$fileName]);
            return response()->json([
                'message' => 'Cv upaoded successfully',
                'status' => 200
            ],200);
        }
        else
        {
            return response()->json([
                'message' => 'Cv not upaoded!',
                'status' => 501
            ],200);
        }
    }

    public function deleteCV()
    {
        $userId = Auth::user()->id;
        $userdata = Users::where('id',$userId)->first();
        if(file_exists(CVPATH.$userdata->cv_file))
        {
            //unlink(CVPATH.$userdata->cv_file);
        }
        Users::where('id',$userId)->update(['cv_file'=>'']);
        return response()->json([
            'message' => 'Cv deleted successfully',
            'status' => 200
        ],200);
    }

    public function deleteWorkExp($id = null)
    {
        CandidateWorkInfo::where('id',$id)->delete();
        return response()->json([
            'message' => 'Record deleted successfully',
            'status' => 200
        ],200);
    }


    public function addworkexp(Request $request)
    {       
        $request->validate( 
        [
            'job_title' => 'required|string',
            'company' => 'required|string',
            'from_month' => 'required',
            'from_year' => 'required',
            'to_month' => 'required',
            'to_year' => 'required',
        ],
        [
            'job_title.required' => 'job title is required!',
            'company.required' => 'Company is required!',
            'from_month.required' => 'From Month is required!',
            'from_year.required' => 'From Year is required!',
            'to_month.required' => 'To Month is required!',
            'to_year.required' => 'To Year is required!',
        ]
        );
        $userId = Auth::user()->id;
        $post = new CandidateWorkInfo();
        $post->user_id = $userId;
        $post->job_title = $request->input('job_title');
        $post->company = $request->input('company');
        $post->from_month = $request->input('from_month');
        $post->from_year = $request->input('from_year');
        $post->to_month = $request->input('to_month');
        $post->to_year = $request->input('to_year');
        if(!empty($request->input('is_current')))
        {
            $post->is_current = $request->input('is_current');
        }        
        $post->description = $request->input('description');
        $post->status = 1;
        if($post->save())
        {
            return response()->json([
                'message' => 'Work Experience added successfully',
                'status' => 200
            ],200);
        }
        else
        {
            return response()->json([
                'message' => 'Work Experience not added!',
                'status' => 501
            ],200);
        }
    }

    public function getWorkExp($id = null)
    {
        return CandidateWorkInfo::where('id',$id)->first();
    }

    public function updateWorkExp(Request $request)
    {
        $request->validate( 
        [
            'job_title' => 'required|string',
            'company' => 'required|string',
            'from_month' => 'required',
            'from_year' => 'required',
            'to_month' => 'required',
            'to_year' => 'required',
        ],
        [
            'job_title.required' => 'job title is required!',
            'company.required' => 'Company is required!',
            'from_month.required' => 'From Month is required!',
            'from_year.required' => 'From Year is required!',
            'to_month.required' => 'To Month is required!',
            'to_year.required' => 'To Year is required!',
        ]
        );
        $id = $request->input('id');
        $post = CandidateWorkInfo::where('id',$id)->first();     
        if(!empty($post))
        {
            $post->job_title = $request->input('job_title');
            $post->company = $request->input('company');
            $post->from_month = $request->input('from_month');
            $post->from_year = $request->input('from_year');
            $post->to_month = $request->input('to_month');
            $post->to_year = $request->input('to_year');
            if(!empty($request->input('is_current')))
            {
                $post->is_current = $request->input('is_current');
            }        
            $post->description = $request->input('description');
            $post->status = 1;
            if($post->update())
            {
                return response()->json([
                    'message' => 'Work Experience added successfully',
                    'status' => 200
                ],200);
            }
            else
            {
                return response()->json([
                    'message' => 'Work Experience not updated!',
                    'status' => 501
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

    public function addSkill(Request $request)
    {
        $userId = Auth::user()->id;
        $skills = $request->input('skills');
        CandidateSkillInfo::where('user_id',$userId)->delete();
        if(!empty($skills))
        {
            foreach($skills as $key=>$value)
            {
                $post = new CandidateSkillInfo();
                $post->user_id = $userId;
                $post->skill = $value;
                $post->status = 1;
                $post->save();
            }
        }
        return response()->json([
            'message' => 'Skills updated successfully',
            'status' => 200
        ],200);
    }

    public function getSkills()
    {
        $userId = Auth::user()->id;
        return CandidateSkillInfo::where('user_id',$userId)->get();
    }
    
    

}
