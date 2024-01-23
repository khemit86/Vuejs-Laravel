<?php

namespace App\Http\Controllers\frontend\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Options;
use App\Models\Questions;
use App\Models\PostJobs;
use App\Models\PostJobTasks;
use App\Models\PostJobBenifits;
use App\Models\PostJobQualifications;
use App\Models\PostJobQuestions;
use App\Models\UserSubscriptionPlans;
use DB;
use Session;
use Auth;
class JobsController extends Controller
{
    	
    public function __construct()
    {

    }
    
    public function getJobs(Request $request)
    {
        $userId = Auth::user()->id;
        $search = $request->query('search');
        $type = $request->query('type');
        $query = PostJobs::query();
        if(!empty($search))
        {           
            $query->where('title', 'LIKE', "%$search%");
        }
        if(!empty($type))
        {
            if($type == 1)
            {
                $query->where('step', 4)->where('is_expired',0);
            }
            else if($type == 2)
            {
                $query->where('step', 4)->where('is_expired',1);
            }
            else if($type == 3)
            {
                $query->where('step','!=' ,4);
            }
            
        }
        else
        {

        }
        return $query->with(['userSubscriptionPlan.addon'])->where('user_id',$userId)->orderBy('id','DESC')->paginate(10);
    }

    public function deleteRecord($id = null)
    {
        DB::table('post_jobs')->where('id', $id)->delete();
        DB::table('post_job_tasks')->where('post_job_id', $id)->delete();
        DB::table('post_job_benifits')->where('post_job_id', $id)->delete();
        DB::table('post_job_qualifications')->where('post_job_id', $id)->delete();
        DB::table('post_job_questions')->where('post_job_id', $id)->delete();
        return 1; die;
    }
    
    public function getCurrentPlans()
    {
        $result = array();
        $userId = Auth::user()->id;
        $data = UserSubscriptionPlans::with(['subscriptionPlan','singleJob','addon','offer'])->where(['user_id'=>$userId,'active'=>1])->orderBy('plan_qty','desc')->get();
        
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
                            $result[1] = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                        }
                        else
                        {
                            $planQty = $value->plan_qty - $value->plan_used_qty;
                            $addonQty = $value->addon_qty - $value->addon_used_qty;

                            $oldPlanQty = $result[1]['plan_qty'];
                            $newPlanQty = $oldPlanQty+$planQty;

                            $oldAddonQty = $result[1]['addon_qty'];
                            $newAddonQty = $oldAddonQty+$addonQty;
                            $result[1]  = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                        }
                    }   
                    else if($value['addon']->type == 2)
                    {
                        if(empty($result[2]))
                        {
                            $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                            $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                            $result[2] = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                        }
                        else
                        {
                            $planQty = $value->plan_qty - $value->plan_used_qty;
                            $addonQty = $value->addon_qty - $value->addon_used_qty;

                            $oldPlanQty = $result[2]['plan_qty'];
                            $newPlanQty = $oldPlanQty+$planQty;

                            $oldAddonQty = $result[2]['addon_qty'];
                            $newAddonQty = $oldAddonQty+$addonQty;
                            
                            $result[2] = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                        }
                    }           
                    
                }
                if($value->plan_type == 1 && $value->addon_id > 0 && (($value->addon_qty - $value->addon_used_qty) == 0))
                {      
                    
                    if(empty($result[8]))
                    {
                        $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                        $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                        $result[8] = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title,'addon_title'=>'-','plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                    }
                    else
                    {
                        $planQty = $value->plan_qty - $value->plan_used_qty;
                        $addonQty = $value->addon_qty - $value->addon_used_qty;

                        $oldPlanQty = $result[8]['plan_qty'];
                        $newPlanQty = $oldPlanQty+$planQty;

                        $oldAddonQty = $result[8]['addon_qty'];
                        $newAddonQty = $oldAddonQty+$addonQty;                       
                        $result[1]  = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title,'addon_title'=>'-','plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                    }
                   
                }
                else if($value->plan_type == 1 && $value->addon_id == 0)
                {
                    if(empty($result[3]))
                    {
                        $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                        $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                        $result[3] = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title,'addon_title'=>'-','plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                    }
                    else
                    {
                        $planQty = $value->plan_qty - $value->plan_used_qty;
                        $addonQty = $value->addon_qty - $value->addon_used_qty;

                        $oldPlanQty = $result[3]['plan_qty'];
                        $newPlanQty = $oldPlanQty+$planQty;

                        $oldAddonQty = $result[3]['addon_qty'];
                        $newAddonQty = $oldAddonQty+$addonQty;
                        $result[3]  = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title,'addon_title'=>'-','plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                    }
                }
                else if($value->plan_type == 2 && $value->addon_id > 0)
                {
                    if(empty($result[4]))
                    {
                        $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                        $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                        $result[4] = array('id'=>$value->id,'plan_title'=>$value['addon']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                    }
                    else
                    {
                        $planQty = $value->plan_qty - $value->plan_used_qty;
                        $addonQty = $value->addon_qty - $value->addon_used_qty;

                        $oldPlanQty = $result[4]['plan_qty'];
                        $newPlanQty = $oldPlanQty+$planQty;

                        $oldAddonQty = $result[4]['addon_qty'];
                        $newAddonQty = $oldAddonQty+$addonQty;
                        $result[4]  = array('id'=>$value->id,'plan_title'=>$value['addon']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
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
                            $result[5] = array('id'=>$value->id,'plan_title'=>$value['subscriptionPlan']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                        }
                        else
                        {
                            $planQty = $value->plan_qty - $value->plan_used_qty;
                            $addonQty = $value->addon_qty - $value->addon_used_qty;

                            $oldPlanQty = $result[5]['plan_qty'];
                            $newPlanQty = $oldPlanQty+$planQty;

                            $oldAddonQty = $result[5]['addon_qty'];
                            $newAddonQty = $oldAddonQty+$addonQty;
                            $result[5]  = array('id'=>$value->id,'plan_title'=>$value['subscriptionPlan']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                        }
                    }
                    else if($value['addon']->type == 2)
                    {
                        if(empty($result[6]))
                        {
                            $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                            $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                            $result[6] = array('id'=>$value->id,'plan_title'=>$value['subscriptionPlan']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                        }
                        else
                        {
                            $planQty = $value->plan_qty - $value->plan_used_qty;
                            $addonQty = $value->addon_qty - $value->addon_used_qty;

                            $oldPlanQty = $result[6]['plan_qty'];
                            $newPlanQty = $oldPlanQty+$planQty;

                            $oldAddonQty = $result[6]['addon_qty'];
                            $newAddonQty = $oldAddonQty+$addonQty;
                            $result[6]  = array('id'=>$value->id,'plan_title'=>$value['singleJob']->title,'addon_title'=>$value['addon']->title,'plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                        }
                    }
                    
                }
                else if($value->plan_type == 4 && $value->addon_id  == 0)
                {
                    if(empty($result[7]))
                    {
                        $newPlanQty = $value->plan_qty - $value->plan_used_qty;
                        $newAddonQty = $value->addon_qty - $value->addon_used_qty;
                        $result[7] = array('id'=>$value->id,'plan_title'=>$value['subscriptionPlan']->title,'addon_title'=>'-','plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
                    }
                    else
                    {
                        $planQty = $value->plan_qty - $value->plan_used_qty;
                            $addonQty = $value->addon_qty - $value->addon_used_qty;

                            $oldPlanQty = $result[7]['plan_qty'];
                            $newPlanQty = $oldPlanQty+$planQty;

                            $oldAddonQty = $result[7]['addon_qty'];
                            $newAddonQty = $oldAddonQty+$addonQty;
                        $result[7]  = array('id'=>$value->id,'plan_title'=>$value['subscriptionPlan']->title,'addon_title'=>'-','plan_type'=>$value->plan_type,'addon_id'=>$value->addon_id,'subscription_id'=>$value->subscription_id,'single_job_id'=>$value->single_job_id,'addon_qty'=>$newAddonQty,'amount'=>$value->amount,'plan_qty'=>$newPlanQty);
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
}
