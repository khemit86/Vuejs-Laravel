<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\PostJobs;
use App\Models\PostJobTasks;
use App\Models\PostJobBenifits;
use App\Models\PostJobQualifications;
use App\Models\PostJobQuestions;
use App\Models\Users;
use App\Models\Addons;
use App\Models\SubscriptionPlans;
use App\Models\UserSubscriptionPlans;
use App\Models\SingleJob;
use App\Models\Questions;

use Auth;

class EmployerJobsController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $search = $request->query('search');  
        $query = PostJobs::query()->with('postJobUser');
        if(!empty($search))
        {            
            $query->where('title', 'LIKE', "%$search%");
        }        
        return $query->orderBy('id','DESC')->paginate(10);
        
    }

    public function view($id=null)
    {
        return $data = PostJobs::where('id',$id)->with(['postJobUser','postJobCategory','postJobTasks','postJobBenifits','postJobQualifications'])->first();
    }

    public function changeApproved($id = null)
    {
        $postVisible = 0;
        $data = PostJobs::where('id',$id)->first();
        if(!empty($data) && $data->step == 4)
        {
            if($data->approved == 1)
            {
                PostJobs::where('id', $id)->update(['approved'=>0]);
                return response()->json([
                    'message' => 'Record un-approved successfully',
                    'status' => 200
                ],200);
            }
            else if($data->approved == 0)
            {   
                if(isset($data->start_date) && isset($data->end_date))
                {                                       
                    PostJobs::where('id', $id)->update(['approved'=>1]);                                   
                    return response()->json([
                        'message' => 'Record approved successfully',
                        'status' => 200
                    ],200);
                }   
                else
                {
                      
                    $dataUserSubs = DB::table('user_subscription_plans')->where('id',$data->user_subscription_plan_id)->first();
                    if(!empty($dataUserSubs))
                    {
                        if($dataUserSubs->plan_type == 1)
                        {
                            $dataPlan = DB::table('single_job')->where('id',$dataUserSubs->single_job_id)->first();
                            if(!empty($dataPlan))
                            {
                                $postVisible = $dataPlan->post_visibility;
                            }
                        }
                        else if($dataUserSubs->plan_type == 2)
                        {
                            $dataPlan = DB::table('addons')->where('id',$dataUserSubs->addon_id)->first();
                            if(!empty($dataPlan))
                            {
                                if($dataPlan->type == 1)
                                {
                                    $postVisible = 7;
                                }
                                else if($dataPlan->type == 2)
                                {
                                    $postVisible = 14;
                                }
                            }
                        }
                        if($dataUserSubs->plan_type == 3 || $dataUserSubs->plan_type == 4)
                        {
                            $dataPlan = DB::table('subscription_plans')->where('id',$dataUserSubs->subscription_plan_id)->first();
                            if(!empty($dataPlan))
                            {
                                $postVisible = $dataPlan->post_visibility;
                            }
                        }                      
                    }
                    else
                    {
                        return response()->json([
                            'message' => 'User not have any plan!',
                            'status' => 501
                        ],200);
                    }
                    $startDate = date('Y-m-d');
                    $endDate = date('Y-m-d',strtotime(' + '.$postVisible.' days'));
                    if($data->post_job_type == 1 || $data->post_job_type == 2)
                    {
                        if($data->post_job_type == 1)
                        {
                            $addonStart = date('Y-m-d');
                            $addonEnd = date('Y-m-d',strtotime(' + 7 days'));
                        }
                        else if($data->post_job_type == 2)
                        {
                            $addonStart = date('Y-m-d');
                            $addonEnd = date('Y-m-d',strtotime(' + 14 days'));
                        }                    
                        PostJobs::where('id', $id)->update(['approved'=>1,'start_date'=>$startDate,'end_date'=>$endDate,'addon_start'=>$addonStart,'addon_end'=>$addonEnd]);
                    }
                    else
                    {
                        PostJobs::where('id', $id)->update(['approved'=>1,'start_date'=>$startDate,'end_date'=>$endDate]);
                    }                
                    return response()->json([
                        'message' => 'Record approved successfully',
                        'status' => 200
                    ],200);
                }         
               
            }            
        }
        else
        {
            if($data->step != 4)
            {
                return response()->json([
                    'message' => 'Job is not completed!',
                    'status' => 501
                ],200);
            }
            else
            {
                return response()->json([
                    'message' => 'Record not found!',
                    'status' => 501
                ],200);
            }
           
        }
    }

    public function changeStatus($id = null)
    {
        $data = PostJobs::where('id',$id)->first();
        if(!empty($data) && $data->step == 4)
        {
            if($data->status == 1)
            {
                PostJobs::where('id', $id)->update(['status'=>0]);
                return response()->json([
                    'message' => 'Record in-active successfully',
                    'status' => 200
                ],200);
            }
            else if($data->status == 0)
            {
                PostJobs::where('id', $id)->update(['status'=>1]);
                return response()->json([
                    'message' => 'Record active successfully',
                    'status' => 200
                ],200);
            }            
        }
        else
        {
            if($data->step != 4)
            {
                return response()->json([
                    'message' => 'Job is not completed!',
                    'status' => 501
                ],200);
            }
            else
            {
                return response()->json([
                    'message' => 'Record not found!',
                    'status' => 501
                ],200);
            }
        }
    }

    public function delete($id = null)
    {
        $data = PostJobs::where('id',$id)->first();
        if(!empty($data))
        {
            PostJobs::where('id',$id)->delete();
            PostJobTasks::where('post_job_id',$id)->delete();
            PostJobQualifications::where('post_job_id',$id)->delete();
            PostJobBenifits::where('post_job_id',$id)->delete();
            PostJobQuestions::where('post_job_id',$id)->delete();
            return response()->json([
                'message' => 'Record in-active successfully',
                'status' => 200
            ],200);
                   
        }
        else
        {
            return response()->json([
                'message' => 'Record not found!',
                'status' => 501
            ],200);
        }
    }

    public function editPostJob(Request $request, $id = null)
    {
        $id11 = str_replace('jobid=','',$id);
        $id11 = (int)$id11;       
        $dataJobs = PostJobs::with(['postJobUser','postJobTasks','postJobBenifits','PostJobQualifications','PostJobQuestions','postJobCategory'])->where('id',$id11)->first();
        if(!empty($dataJobs))
        {
            return $dataJobs;
        }
        else
        {
            return 0;
        }
        
    }

    public function saveJob(Request $request)
    {       
        $request->validate( 
        [
            'post_job_as'=>'required',
            'title' => 'required|string',
            'location' => 'required',
            'worktype' => 'required',
            'estimated_salary' => 'required',            
        ],
        [
            'title.required' => 'Title is required!',
            'location.required' => 'Location is required!', 
            'worktype.required' => 'Work type is required!', 
            'estimated_salary.required' => 'Estimated Salary is required!',               
            'post_job_as.required' => 'Please select post job as!',
        ]
        );
        $adminId = Auth::user()->id;
        $reqData = $request->all();
        $post = new PostJobs(); 

        $postJobAs = isset($reqData['post_job_as'])?$reqData['post_job_as']:0;
        $planType = isset($reqData['plan_type'])?$reqData['plan_type']:0;
        $addonId =   isset($reqData['addon_id'])?$reqData['addon_id']:0;
        
        $subscriptionPlanId =   isset($reqData['subscription_plan_id'])?$reqData['subscription_plan_id']:0;
        $userSubscriptionPlanId = isset($reqData['user_subscription_plan_id'])?$reqData['user_subscription_plan_id']:0;
        $employerId = isset($reqData['employer_id'])?$reqData['employer_id']:0;     
        
        if($postJobAs == 1 && $employerId > 0)
        {   
            $dataUserSubs = DB::table('user_subscription_plans')->where('id',$userSubscriptionPlanId)->first();
            if(!empty($dataUserSubs))
            {
                if($dataUserSubs->plan_type == 1 || $dataUserSubs->plan_type == 2 ||  $dataUserSubs->plan_type == 5)
                { 
                    $subsUsedQty = $dataUserSubs->used_qty;
                    $subsUsedQty = $subsUsedQty+1;                        
                    if($subsUsedQty == $dataUserSubs->qty)
                    {                            
                        DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['used_qty'=>$subsUsedQty,'active'=>2]);
                        
                    }
                    else
                    {
                        DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['used_qty'=>$subsUsedQty,'active'=>1]);
                    }
                }
                else if($dataUserSubs->plan_type == 3)
                {
                    $subsUsedQty = $dataUserSubs->used_qty;
                    $subsUsedQty = $subsUsedQty+1;                      
                    if($subsUsedQty <= $dataUserSubs->qty)
                    {
                        DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['used_qty'=>$subsUsedQty]);
                    }                     
                }
                $post->user_id = $employerId;
                $post->plan_type =  $dataUserSubs->plan_type;
                $post->user_subscription_plan_id = $dataUserSubs->id;
                if($dataUserSubs->addon_id > 0)
                {
                    $dataAddon = Addons::where('id',$dataUserSubs->addon_id)->first();
                    if(!empty($dataAddon))
                    {
                        if($dataAddon->type == 1)
                        {
                            $post->post_job_type = 1;
                        }
                        else if($dataAddon->type == 2)
                        {
                            $post->post_job_type = 2;
                        }                        
                    }
                    else
                    {
                        $post->post_job_type = 0;
                    }
                }
                else
                {
                    $post->post_job_type = 0;
                }
            }
                    
        }
        else if($postJobAs == 2 && $employerId  == 0)
        {
            $post->user_id = $adminId;   
            $post->plan_type =  $planType;
            $userSubscriptionPlanId = $this->userSubscription($adminId,$planType,$addonId,$subscriptionPlanId);
            $post->user_subscription_plan_id = $userSubscriptionPlanId;
            if($addonId > 0)
            {
                $dataAddon = Addons::where('id',$addonId)->first();
                if(!empty($dataAddon))
                {
                    if($dataAddon->type == 1)
                    {
                        $post->post_job_type = 1;
                    }
                    else if($dataAddon->type == 2)
                    {
                        $post->post_job_type = 2;
                    }
                    
                }
                else
                {
                    $post->post_job_type = 0;
                }
            }
            else
            {
                $post->post_job_type = 0;
            }
        }

        $post->title = isset($reqData['title'])?$reqData['title']:'';
        $post->location = isset($reqData['location'])?$reqData['location']:'';
        $categoryId = isset($reqData['child_category_id'])?$reqData['child_category_id']:0;
        if($categoryId > 0)
        {
            $post->category_id = $categoryId;
        }
        else
        {
            $rdCategory = isset($reqData['rdCategory'])?$reqData['rdCategory']:0;
            if($rdCategory > 0)
            {
                $post->category_id = $rdCategory;
            }
        }
        $post->work_type = isset($reqData['worktype'])?$reqData['worktype']:0;
        $post->estimated_salary = isset($reqData['estimated_salary'])?$reqData['estimated_salary']:0;
        $post->is_hide_salary = isset($reqData['is_hide_salary'])?$reqData['is_hide_salary']:0;
        $post->salary_from = isset($reqData['salary_form'])?$reqData['salary_form']:0;
        $post->salary_to = isset($reqData['salary_to'])?$reqData['salary_to']:0;
        $post->job_reference = isset($reqData['job_reference'])?$reqData['job_reference']:'';       
        $writeJobType = (int)$reqData['write_job_type'];
        if($writeJobType == 1)
        {
            $post->write_job_type = 1;           
        }
        else if($writeJobType == 2)
        {
            $post->write_job_type = 2;
            $post->job_description = isset($reqData['post_job_description'])?$reqData['post_job_description']:'';
        }
        $post->about_business = isset($reqData['about_business'])?$reqData['about_business']:'';
        $post->job_summary = isset($reqData['job_summary'])?$reqData['job_summary']:'';
        $post->step = 4;
        $post->approved = 0;  
        $post->is_expired = 0;
        $post->status = 1;  
        $post->uploaded_by = 2;
        $post->post_job_as = $postJobAs;       
        if($post->save())
        {                       
            if($writeJobType == 1)
            {
                if(!empty($reqData['post_job_task']))
                {
                    $jobId = isset($reqData['jobid'])?$reqData['jobid']:'';
                    if(!empty($jobId))
                    {
                        DB::table('post_job_tasks')->where('post_job_id',$post->id)->delete();
                    }
                    foreach($reqData['post_job_task'] as $key=>$value)
                    {
                        if(isset($value))
                        {
                            $pTasks = new PostJobTasks();
                            $pTasks->post_job_id = $post->id;
                            $pTasks->task = $value;
                            $pTasks->status = 1;
                            $pTasks->save();
                        }
                    }
                }

                if(!empty($reqData['post_job_benifit']))
                {
                    $jobId = isset($reqData['jobid'])?$reqData['jobid']:'';
                    if(!empty($jobId))
                    {
                        DB::table('post_job_benifits')->where('post_job_id',$post->id)->delete();
                    }
                    foreach($reqData['post_job_benifit'] as $key=>$value)
                    {
                        if(isset($value))
                        {
                            $pBenifits = new PostJobBenifits();
                            $pBenifits->post_job_id = $post->id;
                            $pBenifits->benifit = $value;
                            $pBenifits->status = 1;
                            $pBenifits->save();
                        }
                    }
                }

                if(!empty($reqData['post_job_qualification']))
                {
                    $jobId = isset($reqData['jobid'])?$reqData['jobid']:'';
                    if(!empty($jobId))
                    {
                        DB::table('post_job_qualifications')->where('post_job_id',$post->id)->delete();
                    }
                    foreach($reqData['post_job_qualification'] as $key=>$value)
                    {
                        if(isset($value))
                        {
                            $pQua = new PostJobQualifications();
                            $pQua->post_job_id = $post->id;
                            $pQua->qaulification = $value;
                            $pQua->status = 1;
                            $pQua->save();
                        }
                    }
                }       
            }
            $jobId = isset($reqData['jobid'])?$reqData['jobid']:'';
            if(!empty($jobId))
            {
                DB::table('post_job_questions')->where(['post_job_id'=>$post->id])->delete();
            }
            if(!empty($reqData['question_id_rec']))
            {                
                foreach($reqData['question_id_rec'] as $key=>$value)
                {
                    if(is_array($value))
                    {
                        foreach($value as $key11=>$value11)
                        {                          
                            if($value11 > 0)
                            {
                                $quePost = new PostJobQuestions();
                                $quePost->user_id = $post->user_id;
                                $quePost->post_job_id = $post->id;
                                $quePost->question_id = $key;
                                $quePost->option_id = $value11;
                                $quePost->type = 1;
                                $quePost->status = 1;
                                $quePost->save();
                            }
                           
                        }
                    }
                    else
                    {
                        if($key > 0)
                        {
                            $quePost = new PostJobQuestions();
                            $quePost->user_id = $post->user_id;
                            $quePost->post_job_id = $post->id;
                            $quePost->question_id = $key;
                            $quePost->type = 1;
                            $quePost->status = 1;
                            $quePost->save();
                        }
                        
                    }
                    
                }
            }
            if(!empty($reqData['question_id_auto']))
            {                
                foreach($reqData['question_id_auto'] as $key=>$value)
                {
                    if(is_array($value))
                    {
                        foreach($value as $key11=>$value11)
                        {                          
                            if($value11 > 0)
                            {
                                $quePost = new PostJobQuestions();
                                $quePost->user_id = $post->user_id;
                                $quePost->post_job_id = $post->id;
                                $quePost->question_id = $key;
                                $quePost->option_id = $value11;
                                $quePost->type = 2;
                                $quePost->status = 1;
                                $quePost->save();
                            }
                           
                        }
                    }
                    else
                    {
                        if($key > 0)
                        {
                            $quePost = new PostJobQuestions();
                            $quePost->user_id =  $post->user_id;
                            $quePost->post_job_id = $post->id;
                            $quePost->question_id = $key;
                            $quePost->type = 2;
                            $quePost->status = 1;
                            $quePost->save();
                        }
                        
                    }
                    
                }
            }
            return response()->json([
                'message' => 'job updated successfully',
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
    
    public function updateJob(Request $request)
    {
        $request->validate( 
            [                
                'title' => 'required|string',
                'location' => 'required',
                'worktype' => 'required',
                'estimated_salary' => 'required',            
            ],
            [
                'title.required' => 'Title is required!',
                'location.required' => 'Location is required!', 
                'worktype.required' => 'Work type is required!', 
                'estimated_salary.required' => 'Estimated Salary is required!',              
            ]
            );
        $reqData = $request->all();        
        $jobId = isset($reqData['jobid'])?$reqData['jobid']:0;       
        if($jobId > 0 )
        {
            $post = PostJobs::where('id',$jobId)->first();
            if(!empty($post))
            {
                $post->title = isset($reqData['title'])?$reqData['title']:'';
                $post->location = isset($reqData['location'])?$reqData['location']:'';
                $categoryId = isset($reqData['child_category_id'])?$reqData['child_category_id']:0;
                if($categoryId > 0)
                {
                    $post->category_id = $categoryId;
                }
                else
                {
                    $rdCategory = isset($reqData['rdCategory'])?$reqData['rdCategory']:0;
                    if($rdCategory > 0)
                    {
                        $post->category_id = $rdCategory;
                    }
                }
                $post->work_type = isset($reqData['worktype'])?$reqData['worktype']:0;
                $post->estimated_salary = isset($reqData['estimated_salary'])?$reqData['estimated_salary']:0;
                $post->is_hide_salary = isset($reqData['is_hide_salary'])?$reqData['is_hide_salary']:0;
                $post->salary_from = isset($reqData['salary_form'])?$reqData['salary_form']:0;
                $post->salary_to = isset($reqData['salary_to'])?$reqData['salary_to']:0;
                $post->job_reference = isset($reqData['job_reference'])?$reqData['job_reference']:'';       
                $writeJobType = (int)$reqData['write_job_type'];
                if($writeJobType == 1)
                {
                    $post->write_job_type = 1;           
                }
                else if($writeJobType == 2)
                {
                    $post->write_job_type = 2;
                    $post->job_description = isset($reqData['post_job_description'])?$reqData['post_job_description']:'';
                }
                $post->about_business = isset($reqData['about_business'])?$reqData['about_business']:'';
                $post->job_summary = isset($reqData['job_summary'])?$reqData['job_summary']:'';
                if($post->save())
                {                   
                    if($writeJobType == 1)
                    {
                        if(!empty($reqData['post_job_task']))
                        {
                            $jobId = isset($reqData['jobid'])?$reqData['jobid']:'';
                            if(!empty($jobId))
                            {
                                DB::table('post_job_tasks')->where('post_job_id',$post->id)->delete();
                            }
                            foreach($reqData['post_job_task'] as $key=>$value)
                            {
                                if(isset($value))
                                {
                                    $pTasks = new PostJobTasks();
                                    $pTasks->post_job_id = $post->id;
                                    $pTasks->task = $value;
                                    $pTasks->status = 1;
                                    $pTasks->save();
                                }
                            }
                        }

                        if(!empty($reqData['post_job_benifit']))
                        {
                            $jobId = isset($reqData['jobid'])?$reqData['jobid']:'';
                            if(!empty($jobId))
                            {
                                DB::table('post_job_benifits')->where('post_job_id',$post->id)->delete();
                            }
                            foreach($reqData['post_job_benifit'] as $key=>$value)
                            {
                                if(isset($value))
                                {
                                    $pBenifits = new PostJobBenifits();
                                    $pBenifits->post_job_id = $post->id;
                                    $pBenifits->benifit = $value;
                                    $pBenifits->status = 1;
                                    $pBenifits->save();
                                }
                            }
                        }

                        if(!empty($reqData['post_job_qualification']))
                        {
                            $jobId = isset($reqData['jobid'])?$reqData['jobid']:'';
                            if(!empty($jobId))
                            {
                                DB::table('post_job_qualifications')->where('post_job_id',$post->id)->delete();
                            }
                            foreach($reqData['post_job_qualification'] as $key=>$value)
                            {
                                if(isset($value))
                                {
                                    $pQua = new PostJobQualifications();
                                    $pQua->post_job_id = $post->id;
                                    $pQua->qaulification = $value;
                                    $pQua->status = 1;
                                    $pQua->save();
                                }
                            }
                        }       
                    }
                    $jobId = isset($reqData['jobid'])?$reqData['jobid']:'';
                    if(!empty($jobId))
                    {
                        DB::table('post_job_questions')->where(['post_job_id'=>$post->id])->delete();
                    }
                    if(!empty($reqData['question_id_rec']))
                    {                
                        foreach($reqData['question_id_rec'] as $key=>$value)
                        {
                            if(is_array($value))
                            {
                                foreach($value as $key11=>$value11)
                                {                          
                                    if($value11 > 0)
                                    {
                                        $quePost = new PostJobQuestions();
                                        $quePost->user_id =  $post->user_id;
                                        $quePost->post_job_id = $post->id;
                                        $quePost->question_id = $key;
                                        $quePost->option_id = $value11;
                                        $quePost->type = 1;
                                        $quePost->status = 1;
                                        $quePost->save();
                                    }
                                
                                }
                            }
                            else
                            {
                                if($key > 0)
                                {
                                    $quePost = new PostJobQuestions();
                                    $quePost->user_id = $post->user_id;
                                    $quePost->post_job_id = $post->id;
                                    $quePost->question_id = $key;
                                    $quePost->type = 1;
                                    $quePost->status = 1;
                                    $quePost->save();
                                }
                                
                            }
                            
                        }
                    }
                    if(!empty($reqData['question_id_auto']))
                    {                
                        foreach($reqData['question_id_auto'] as $key=>$value)
                        {
                            if(is_array($value))
                            {
                                foreach($value as $key11=>$value11)
                                {                          
                                    if($value11 > 0)
                                    {
                                        $quePost = new PostJobQuestions();
                                        $quePost->user_id =  $post->user_id;
                                        $quePost->post_job_id = $post->id;
                                        $quePost->question_id = $key;
                                        $quePost->option_id = $value11;
                                        $quePost->type = 2;
                                        $quePost->status = 1;
                                        $quePost->save();
                                    }
                                
                                }
                            }
                            else
                            {
                                if($key > 0)
                                {
                                    $quePost = new PostJobQuestions();
                                    $quePost->user_id =  $post->user_id;
                                    $quePost->post_job_id = $post->id;
                                    $quePost->question_id = $key;
                                    $quePost->type = 2;
                                    $quePost->status = 1;
                                    $quePost->save();
                                }
                                
                            }
                            
                        }
                    }
                    return response()->json([
                        'message' => 'job updated successfully',
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
            else
            {
                return response()->json([
                    'message' => 'Record not found!',
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

    public function getEmployers(Request $request)
    {
        $search = $request->query('search');
        $userIds = [];
        $result = array();
        if(!empty($search) &&  strlen($search) >= 3)
        {
            $data = Users::with('userSubscriptionPlans')->whereHas('userSubscriptionPlans', function($q)
            {
                $q->where('active','=',1);
            })->where(['users.role_id'=>2])
            ->Where('users.name', 'LIKE', "%$search%")
            ->get();
            if($data->isNotEmpty())
            {
                $i = 0;
                foreach($data as $key=>$value)
                {
                    //dd($value->userSubscriptionPlans);
                    if($value->userSubscriptionPlans->isNotEmpty())
                    {
                        $result[$i]['id'] = $value->id;
                        $result[$i]['name'] = $value->name;
                        $i++;
                    }                    
                }
            }

            // $data = DB::table('users')
            //     ->select('user_subscription_plans.id','users.id as user_id','users.email','users.name')
            //     ->join('user_subscription_plans', 'users.id', '=', 'user_subscription_plans.user_id')
            //     ->where(['user_subscription_plans.active'=>1,'users.role_id'=>2])
            //     ->orWhere([['users.first_name', 'LIKE', "%$search%"],['users.last_name', 'LIKE', "%$search%"],['users.email','LIKE', "%$search%"],['users.u_id','LIKE', "%$search%"]])                
            //     ->get();
                   
            
        }
        return $result;
    }

    // public function getSubscriptionplans(Request $request)
    // {
    //     $userId = $request->query('userid');
    //     $result = array();
    //     if(!empty($userId))
    //     {
    //         $data = UserSubscriptionPlans::with(['subscriptionPlan','singleJob','addon','offer'])->where('user_id',$userId)->where('active',1)->get();
            
    //         if($data->isNotEmpty())
    //         {
    //             $i = 0;
    //            foreach($data as $key=>$value)
    //            {
    //               $result[$i]['id'] = $value->id;
    //               if($value->plan_type == 1 && $value->single_job_id > 0)
    //               {
    //                 $result[$i]['title'] = $value['singleJob']['title'];
    //               } 
    //               else if($value->plan_type == 2 && $value->addon_id > 0)
    //               {
    //                 $result[$i]['title'] = $value['addon']['title'];
    //               }
    //               else if($value->plan_type == 3 && $value->addon_id > 0)
    //               {
    //                  $result[$i]['title'] = $value['subscriptionPlan']['title'];
    //               }
    //               else if($value->plan_type == 4 && $value->addon_id == 0)
    //               {
    //                 $result[$i]['title'] = $value['subscriptionPlan']['title'];
    //               } 
    //               $i++;
    //            }
    //         }
            
    //     }
    //     return $result;
    // }


    public function getSubscriptionplans(Request $request)
    {
        $result = array();
        $userId = $userId = $request->query('userid');
        $data = UserSubscriptionPlans::with(['subscriptionPlan','singleJob','addon','offer'])->where(['user_id'=>$userId,'active'=>1])->orderBy('plan_qty','desc')->get();
        //dd($data);
        if($data->isNotEmpty())
        {
            foreach($data as $key=>$value)
            {
                if($value->plan_type == 1 && $value->addon_id > 0 && (($value->addon_qty - $value->addon_used_qty) > 0))
                {      
                    if($value['addon']->type == 1)
                    {
                        if(empty($result[1]))
                        {
                            $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                            $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                            $result[1] = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title.'+'.$value['addon']->title);
                        }                       
                    }   
                    else if($value['addon']->type == 2)
                    {
                        if(empty($result[2]))
                        {
                            $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                            $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                            $result[2] = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title.'+'.$value['addon']->title);
                        }
                       
                    }           
                    
                }
                if($value->plan_type == 1 && $value->addon_id > 0 && (($value->addon_qty - $value->addon_used_qty) == 0))
                {      
                    
                    if(empty($result[8]))
                    {
                        $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                        $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                        $result[8] = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title);
                    }                    
                   
                }
                else if($value->plan_type == 1 && $value->addon_id == 0)
                {
                    if(empty($result[3]))
                    {
                        $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                        $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                        $result[3] = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title);
                    }
                    
                }
                else if($value->plan_type == 2 && $value->addon_id > 0)
                {
                    if(empty($result[4]))
                    {
                        $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                        $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                        $result[4] = array('id'=>$value->id,'plan_title'=>$value['addon']->title.'+'.$value['addon']->title);
                    }
                    
                }
                else if($value->plan_type == 3 && $value->addon_id > 0)
                {
                    if($value['addon']->type == 1)
                    {
                        if(empty($result[5]))
                        {
                            $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                            $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                            $result[5] = array('id'=>$value->id,'plan_title'=>$value['subscriptionPlan']->title.'+'.$value['addon']->title);
                        }
                        
                    }
                    else if($value['addon']->type == 2)
                    {
                        if(empty($result[6]))
                        {
                            $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                            $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                            $result[6] = array('id'=>$value->id,'plan_title'=>$value['subscriptionPlan']->title.'+'.$value['addon']->title);
                        }
                        
                    }
                    
                }
                else if($value->plan_type == 4 && $value->addon_id  == 0)
                {
                    if(empty($result[7]))
                    {
                        $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                        $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                        $result[7] = array('id'=>$value->id,'plan_title'=>$value['subscriptionPlan']->title);
                    }
                    
                    
                }
            } 
            //dd($result);
           // response()->json([]);           
            return $result;
        }
        else
        {
           return 0;
        }
    }

    public function getAddon(Request $request)
    {
        $type = $request->query('type');
        if($type == 1)
        {
            $data = Addons::where(['addon_for'=>1,'with_premium'=>1])->get();   
            $dataSubs = SubscriptionPlans::where(['status'=>1])->get();         
            return response()->json([
                'message' => 'Success',
                'status' => 200,
                'addon'=>$data,
                'subscription'=>$dataSubs
            ],200);
        }
        else if($type == 2)
        {
            $data = Addons::where(['addon_for'=>1,'with_premium'=>0])->get();   
            $dataSubs = SubscriptionPlans::where(['status'=>1])->get();         
            return response()->json([
                'message' => 'Success',
                'status' => 200,
                'addon'=>$data,
                'subscription'=>$dataSubs
            ],200);
        }
        else if($type == 3)
        {
            $data = Addons::where(['addon_for'=>2])->get();
            $dataSubs = SubscriptionPlans::where(['status'=>1])->get();
            return response()->json([
                'message' => 'Success',
                'status' => 200,
                'addon'=>$data,
                'subscription'=>$dataSubs
            ],200);
        }
    }

    public function userSubscription($adminId = null,$planType = null,$addonId = null,$subscriptionPlanId = null)
    {
        $tblUserSubs = new UserSubscriptionPlans();
        $tblUserSubs->user_id = $adminId;
        if($planType == 1)
        {
            $dataSingleJob = SingleJob::first();
            $tblUserSubs->plan_type = 1;
            $tblUserSubs->single_job_id  = $dataSingleJob->id;
            $tblUserSubs->addon_id  = $addonId;
            $days = isset($dataSingleJob->plan_duration)?$dataSingleJob->plan_duration:0;
            $tblUserSubs->active  = 2;

        }
        else if($planType == 2)
        {
            $dataSingleJob = SingleJob::first();
            $tblUserSubs->plan_type = 2;
            $tblUserSubs->single_job_id  = $dataSingleJob->id;
            $tblUserSubs->addon_id  = $addonId;
            $days = isset($dataSingleJob->plan_duration)?$dataSingleJob->plan_duration:0;
            $tblUserSubs->active  = 2;            
        }
        else if($planType == 3)
        {
            $dataSubs = DB::table('subscription_plans')->where('id',$subscriptionPlanId)->first();
            $tblUserSubs->plan_type = 3;
            $tblUserSubs->single_job_id  = 0;
            $tblUserSubs->subscription_plan_id  = $subscriptionPlanId;
            $tblUserSubs->addon_id  = $addonId;
            $days = isset($dataSubs->plan_duration)?$dataSubs->plan_duration:0;
            $tblUserSubs->active  = 2;            
        }
        else if($planType == 4)
        {
            $dataSubs = DB::table('subscription_plans')->where('id',$subscriptionPlanId)->first();
            $tblUserSubs->plan_type = 4;
            $tblUserSubs->single_job_id  = 0;
            $tblUserSubs->subscription_plan_id  = $subscriptionPlanId;
            $tblUserSubs->addon_id  = 0;
            $days = isset($dataSubs->plan_duration)?$dataSubs->plan_duration:0;
            $tblUserSubs->active  = 2;            
        }
        $tblUserSubs->qty  = 1;
        $tblUserSubs->amount  = 0;
        $tblUserSubs->used_qty  = 1;
        $startDate =  date('Y-m-d');
        $endDate = date('Y-m-d',strtotime(' + '.$days.' days'));
        $tblUserSubs->plan_start_date  = date('Y-m-d');
        $tblUserSubs->plan_end_date  = date('Y-m-d',strtotime(' + '.$days.' days'));
        if($tblUserSubs->save())
        {                
            return $tblUserSubs->id;
        }
        else
        {
            return 0;
        }
    }

    // public function getQuestion(Request $request)
    // {
    //    $userId = Auth::user()->id;
    //    $jobId = $request->query('jobid');
    //    $result = array();
    //    $selectedQuestions = array();
    //    $selectedOptions = array();
    //    $dataAutoQuestion = PostJobQuestions::with(['question.options'])->where(['post_job_id'=>$jobId,'type'=>2])->get();  
      
    //    $data = Questions::with('options')->where([['is_recommended',1],['status',1],['employer_id',$userId]])->orWhere([['is_recommended',1],['status',1],['uploaded_by',1]])->orderBy('uploaded_by','desc')->get();
    //    $result['question'] = $data;
    //    $result['selectedAuto'] = $dataAutoQuestion;
    //    if($jobId > 0)
    //    {
    //         $dataSelectedQuestion = PostJobQuestions::where(['post_job_id'=>$jobId,'type'=>1])->get();
    //         if(!empty($dataSelectedQuestion))
    //         {               
    //             foreach($dataSelectedQuestion as $key=>$value)
    //             {
    //                 if(isset($value->question_id))
    //                 {
    //                     $selectedQuestions[] = $value->question_id;
    //                 }
    //                 if(isset($value->option_id))
    //                 {
    //                     $selectedOptions[] = $value->option_id;
    //                 }
    //             }
    //             $result['selectedQuestions'] = $selectedQuestions;
    //             $result['selectedOptions'] = $selectedOptions;
    //         }
    //    } 
    //    return $result;      
    // }

    public function getQuestion(Request $request)
    {       
       $jobId = $request->query('jobid');
       $dataPost = DB::table('post_jobs')->where('id',$jobId)->first();
       if(!empty($dataPost))
       {
         $userId = $dataPost->user_id;
       }
       else
       {
         $userId = Auth::user()->id;
       }
       
       $result = array();
       $selectedQuestions = array();
       $selectedOptions = array();
       $dataAutoQuestion = PostJobQuestions::with(['question.options'])->where(['user_id'=>$userId,'type'=>2,'post_job_id'=>$jobId])->get();  
       //$dataPreviousQuestions = PostJobQuestions::with(['question.options'])->where(['user_id'=>$userId,'type'=>2])->orderBy('id','desc')->take(5)->get();  
       $data = Questions::with('options')->where([['is_recommended',1],['status',1],['employer_id',$userId]])->orWhere([['is_recommended',1],['status',1],['uploaded_by',1]])->orderBy('uploaded_by','desc')->get();
       $result['question'] = $data;
       $result['selectedAuto'] = $dataAutoQuestion;
      // $result['dataPreviousQuestions'] = $dataPreviousQuestions;
       if($jobId > 0)
       {
            $dataSelectedQuestion = PostJobQuestions::where(['user_id'=>$userId,'post_job_id'=>$jobId,'type'=>1])->get();
            if(!empty($dataSelectedQuestion))
            {               
                foreach($dataSelectedQuestion as $key=>$value)
                {
                    if(isset($value->question_id))
                    {
                        $selectedQuestions[] = $value->question_id;
                    }
                    if(isset($value->option_id))
                    {
                        $selectedOptions[] = $value->option_id;
                    }
                }
                $result['selectedQuestions'] = $selectedQuestions;
                $result['selectedOptions'] = $selectedOptions;
            }
       } 
       return $result;      
    }
}
