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
use App\Models\Payments;
use DB;
use Braintree_Transaction;
use Braintree\ClientToken;
use Braintree\Transaction;
use Session;
use Auth;
class PostJobController extends Controller
{
    	
    public function __construct()
    {

    }
    
    public function getSuggestCategory(Request $request)
    {
        $keyword = $request->input('keyword');
        $result = array();
        $data = Categories::where('parent_id',0)->where('status',1)->Where('name', 'LIKE', "%$keyword%")->orWhere('keywords', 'LIKE', "%$keyword%")->limit(3)->get();
        //dd($data);
        if($data->isNotEmpty())
        {
            $i = 0;
            foreach($data as $key=>$value)
            {
                $result[$i]['parent'] = array('id'=>$value->id,'name'=>$value->name);
                $dataChild = Categories::where('status',1)->where('parent_id',$value->id)->limit(3)->get();
                if(!empty($dataChild))
                {
                    foreach($dataChild as $key11=>$value11)
                    {
                        $result[$i]['parent']['child'][] = array('id'=>$value11->id,'name'=>$value11->name);
                    }
                }                
                $i++;
            }            
            return $result;
        }
        else
        {
            
            $data = Categories::where('parent_id','>',0)->where('status',1)->where('name', 'LIKE', "%$keyword%")->orwhere('keywords', 'LIKE', "%$keyword%")->limit(5)->get();            
            if($data->isNotEmpty())
            {
                $i = 0;
                foreach($data as $key=>$value)
                {
                    $dataParent = Categories::where('status',1)->where('id',$value->parent_id)->first();
                    if(!empty($dataParent))
                    {
                        $result[$i]['parent'] = array('id'=>$dataParent->id,'name'=>$dataParent->name);
                        $result[$i]['parent']['child'][] = array('id'=>$value->id,'name'=>$value->name);
                    }
                    $i++;
                }
                return $result;
            }
            else
            {
                $data = Categories::where('status',1)->where('parent_id',0)->limit(3)->get();
                if($data->isNotEmpty())
                {
                    $i = 0;
                    foreach($data as $key=>$value)
                    {
                        $result[$i]['parent'] = array('id'=>$value->id,'name'=>$value->name);
                        $dataChild = Categories::where('status',1)->where('parent_id',$value->id)->limit(2)->get();
                        if(!empty($dataChild))
                        {
                            foreach($dataChild as $key11=>$value11)
                            {
                                $result[$i]['parent']['child'][] = array('id'=>$value11->id,'name'=>$value11->name);
                            }
                        }                
                        $i++;
                    }    
                    return $result;                  
                }
            }
        }
    }

    public function getQuestion(Request $request)
    {
       $userId = Auth::user()->id;
       $jobId = $request->query('jobid');
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

    public function getBrainToken()
    {
        $data = ClientToken::generate(array('customerId' => ""));
        return $data;
        // if(!empty($data))
        // {
        //     return response()->json([
        //         'message' => 'Payment not done!',
        //         'data'=>$data,
        //         'status' => 200,               
        //     ]);
        // }
        // else
        // {
        //     return response()->json([
        //         'message' => 'Braintree token not created',
        //         'data'=>'',
        //         'status' => 500,               
        //     ]);
        // }
        
    }

    public function getQuestionAutoComplete()
    {
        $result = array();
        $data = Questions::with('options')->where('status',1)->where('is_recommended',0)->get();
        if($data->isNotEmpty())
        {
            $i = 0;
            foreach($data as $key=>$value)
            {
                $result[$i] = array('id'=>$value->id,'label'=>$value->title);
                $i++;
            }
            return json_encode($result,JSON_HEX_APOS);
            //return $result;
        }
        else
        {
            return 0;
        }
    }

    public function getOptions($id = null)
    {
        $dataOtions = Questions::with('options')->where('id',$id)->get();
        $html = '';
        if(!empty($dataOtions))
        {
            $html .= '<div id="autoaccordion" class="panel-group driving-license-settings">';
            $i = mt_rand(100000, 999999);
            foreach($dataOtions as $key=>$value)
            {
                $html .= '<div class="panel panel-default">
                <div class="panel-heading">
                   <h4 class="panel-title">
                      <div data-toggle="collapse" data-parent="#autoaccordion" data-target="#collapseAuto'.$i.'" class="checkbox">
                        <input type="checkbox" data-id="'.$i.'" name="question_id_auto['.$value->id.']" value="'.$value->id.'" id="chkMainAuto'.$i.'" class="ui-checkbox chkMainAuto mainCheckBox"> <label for="chkMainAuto'.$i.'">'.$value->title.'</label>
                      </div>
                   </h4>
                </div>
                <div id="collapseAuto'.$i.'" class="panel-collapse collapse">
                   <div class="panel-body">
                      <div class="driving-license-kind">';
                      if($value->question_type == 1)
                      {
                         $html .= '<span>I will accept any of these answers:</span>';
                         if(!empty($value->options))
                         {
                             $j = mt_rand(100000, 999999);;
                             foreach($value->options as $key11=>$value11)
                             {
                                $html .= '<div class="checkbox">
                                            <input type="checkbox" name="question_id_auto['.$value11->id.']" value="'.$value11->id.'" id="chkOptionAuto_'.$value11->id.'" class="ui-checkbox"> 
                                            <label for="chkOptionAuto_'.$value11->id.'">'.$value11->title.'</label></div>';
                                $j++;
                             }
                         }
                      }
                      else if($value->question_type == 2)
                      {
                         $html .= 'I will only accept this answer:';
                         if(!empty($value->options))
                         {
                             $j = mt_rand(100000, 999999);
                             foreach($value->options as $key11=>$value11)
                             {
                                $html .= '<div class="col-md-6 form-group radio-plan steps-radio">
                                <input type="radio" id="chkOption'.$value11->id.'" value="'.$value11->id.'" name="question_id_auto['.$value->id.'][]">
                               <label for="chkOption'.$value11->id.'">'.$value11->title.'</label></div>';
                                $j++;
                             }
                         }
                      }
                      $html .= '</div></div></div></div>';
             $i++;
            }
            $html .= '</div>';             
            return $html;   
        }
        else
        {
            return 0;
        }
    }


    public function getQuestionInfo()
    {
        $data = DB::table('settings')->where('name','question_info')->first();
        if(!empty($data))
        {
           return $data->val;
        }
        else
        {
            return 0;
        }
    }

    public function getSessionPricing()
    {
        return Session::get('dataPricing');
    }

    public function separatePayments(Request $request)
    {
        $reqData = $request->all();   
        
        $dataPricingData =  Session::get('dataPricing');
        //dd(json_decode($reqData['payload'],true));
        //dd($dataPricingData);
        if(!empty($reqData['payload']))
        {
            $payload  = json_decode($reqData['payload'],true);
        }
        else
        {
            $payload  = '';
        }
      
        $userSubscriptionId = $this->userSubscription();       
        if($userSubscriptionId > 0)
        {
            $nonce = $payload['nonce'];           
            if(!empty($nonce))
            {
                $vatAmount = $dataPricingData['vat']*$dataPricingData['amount']/100;
                $grandTotal = (float)$dataPricingData['amount'] + (float)($vatAmount);
                $brainResponse = Transaction::sale([
                    'amount' => $grandTotal,
                    'paymentMethodNonce' => $nonce,
                    'options' => [
                        'submitForSettlement' => True
                    ]
                ]);                
                if($brainResponse->success == true)
                {
                    $tblPayment = new Payments();
                    $tblPayment->user_id = Auth::user()->id;
                    $tblPayment->user_subscription_plan_id = $userSubscriptionId;
                    $tblPayment->transaction_id = $brainResponse->transaction->id;
                    $tblPayment->amount = $grandTotal;
                    $tblPayment->status = 1;
                    if($tblPayment->save())
                    {
                        $invoice = 'PR-'.sprintf("%'.05d\n", $tblPayment['id']);                            
                        DB::table('payments')->where('id',$tblPayment['id'])->update(['invoice_number'=>$invoice]);
                        Session::forget('dataPricing');
                        return response()->json([
                            'message' => 'Payment done successfully',
                            'status' => 200,               
                        ]);
                    }
                    else
                    {
                        return response()->json([
                            'message' => 'Payment not done!',
                            'status' => 500,               
                        ]);
                    }
                    
                }
                else if($brainResponse->success == false)
                {
                    return response()->json([
                        'message' => 'Payment not done!',
                        'status' => 500,               
                    ]);
                }                
            }
            else
            {
                echo 0; die;
            }
        }        
    }


    public function separateAddonPayments(Request $request)
    {
        $reqData = $request->all();   
        $dataPricingData =  Session::get('dataPricing');
        $userSubscriptionId = 0;
        if(!empty($reqData['payload']))
        {
            $payload  = json_decode($reqData['payload'],true);
        }
        else
        {
            $payload  = '';
        }      
        $planId =  0;
        $userSubsId = $reqData['user_subscription_id'];
        $dataOldSubs = DB::table('user_subscription_plans')->where('id',$userSubsId)->where('active',1)->first();
        $dataAddon = DB::table('addons')->where('id',$dataPricingData['addonId'])->first();
        if(!empty($dataOldSubs) && !empty($dataAddon))
        {            
            if($dataOldSubs->plan_type == 3 || $dataOldSubs->plan_type == 4)
            {
                $postSubs = new UserSubscriptionPlans();
                $postSubs->user_id = Auth::user()->id;
                $postSubs->plan_type = 3;
                $postSubs->single_job_id = $dataOldSubs->single_job_id;
                $postSubs->offer_id = $dataOldSubs->offer_id;
                $postSubs->subscription_plan_id = $dataOldSubs->subscription_plan_id;
                $postSubs->addon_id = $dataPricingData['addonId'];
                $postSubs->plan_qty = $dataOldSubs->plan_qty;
                $postSubs->addon_qty = $dataPricingData['addon_qty'];
                $postSubs->amount = $dataPricingData['amount'];
                $postSubs->vat_amount = $dataPricingData['amount']*$dataPricingData['vat']/100;
                $postSubs->grand_total = $dataPricingData['amount']+$dataPricingData['amount']*$dataPricingData['vat']/100;
                $postSubs->plan_used_qty = 0;
                $postSubs->addon_used_qty = 0;
                $postSubs->plan_start_date = $dataOldSubs->plan_start_date;
                $postSubs->plan_end_date = $dataOldSubs->plan_end_date;
                $postSubs->parent_id = $dataOldSubs->id;
                $postSubs->is_addon_seprate = 1;
                $postSubs->active = 1;
                if($postSubs->save())
                {
                    $planId = $postSubs->id;
                    $userSubscriptionId = $postSubs->id;
                }
                DB::table('user_subscription_plans')->where('id',$userSubsId)->update(['active'=>2]);
            } 
            else if($dataOldSubs->plan_type == 1)
            {
                $oldCatAmount = $dataOldSubs->vat_amount;
                $oldAmount = $dataOldSubs->amount;
                $oldGrandTotal =  $dataOldSubs->grand_total;

                $newAmount = $oldAmount+$dataPricingData['amount'];
                $newVatAmount = $newAmount*$dataPricingData['vat']/100;
                $newGroundTotal = $newAmount+$newVatAmount;
                $addonQty = $dataPricingData['addon_qty'];
                $planAmount = $dataOldSubs->plan_amount;
                $addonAmount = $dataPricingData['amount'];
                UserSubscriptionPlans::where('id',$dataOldSubs->id)->update(['addon_id'=>$dataAddon->id,'plan_amount'=>$planAmount,'addon_amount'=>$addonAmount,'amount'=>$newAmount,'vat_amount'=>$newVatAmount,'grand_total'=>$newGroundTotal,'addon_qty'=>$addonQty]);
                $userSubscriptionId = $dataOldSubs->id;
            }           
            if($userSubscriptionId > 0)
            {          
                $nonce = $payload['nonce'];
                if(!empty($nonce))
                {
                    $vatAmount = $dataPricingData['vat']*$dataPricingData['amount']/100;
                    $grandTotal = (float)$dataPricingData['amount'] + (float)($vatAmount);
                    $brainResponse = Transaction::sale([
                        'amount' => $grandTotal,
                        'paymentMethodNonce' => $nonce,
                        'options' => [
                            'submitForSettlement' => True
                        ]
                    ]);
                    if($brainResponse->success == true)
                    {
                        $tblPayment = new Payments();
                        $tblPayment->user_id = Auth::user()->id;
                        $tblPayment->user_subscription_plan_id = $userSubscriptionId;
                        $tblPayment->transaction_id = $brainResponse->transaction->id;
                        $tblPayment->amount = $grandTotal;
                        $tblPayment->status = 1;
                        if($tblPayment->save())
                        {
                            $invoice = 'PR-'.sprintf("%'.05d\n", $tblPayment['id']);                            
                            DB::table('payments')->where('id',$tblPayment['id'])->update(['invoice_number'=>$invoice]);
                            Session::forget('dataPricing');
                            return response()->json([
                                'message' => 'Payment done successfully',
                                'status' => 200, 
                                'id'=>$userSubscriptionId,              
                            ]);
                        }
                        else
                        {
                            return response()->json([
                                'message' => 'Payment not done!',
                                'status' => 500,               
                            ]);
                        }
                        
                    }
                    else if($brainResponse->success == false)
                    {
                        return response()->json([
                            'message' => 'Payment not done!',
                            'status' => 500,               
                        ]);
                    }                
                }
                else
                {
                    return response()->json([
                        'message' => 'Braintree token not found!',
                        'status' => 500,               
                    ]);
                }
            }
        }
        else
        {
            return response()->json([
                'message' => 'Old subscription plan not found!',
                'status' => 500,               
            ]);
        }        
    }

    public function payments(Request $request)
    {
        $reqData = $request->all();          
        $dataPricingData =  Session::get('dataPricing');
        if(!empty($reqData['payload']))
        {
            $payload  = json_decode($reqData['payload'],true);
        }
        else
        {
            $payload  = '';
        }         
       $userSubscriptionId = $this->userSubscription();
       $savePostJob = $this->savePostJob($reqData,$userSubscriptionId);
       if($savePostJob == 1)
       {           
           if($userSubscriptionId > 0)
           {
                $nonce = $payload['nonce'];
                if(!empty($nonce))
                {
                    $vatAmount = $dataPricingData['vat']*$dataPricingData['amount']/100;
                    $grandTotal = (float)$dataPricingData['amount'] + (float)($vatAmount);
                    $brainResponse = Transaction::sale([
                        'amount' => $grandTotal,
                        'paymentMethodNonce' => $nonce,
                        'options' => [
                            'submitForSettlement' => True
                        ]
                        ]);
                    if($brainResponse->success == true)
                    {
                        $tblPayment = new Payments();
                        $tblPayment->user_id = Auth::user()->id;
                        $tblPayment->user_subscription_plan_id = $userSubscriptionId;
                        $tblPayment->transaction_id = $brainResponse->transaction->id;
                        $tblPayment->amount = $grandTotal;
                        $tblPayment->status = 1;
                        if($tblPayment->save())
                        {
                            $invoice = 'PR-'.sprintf("%'.05d\n", $tblPayment['id']);                            
                            DB::table('payments')->where('id',$tblPayment['id'])->update(['invoice_number'=>$invoice]);
                            Session::forget('dataPricing');
                            return response()->json([
                                'message' => 'Payment done successfully',
                                'status' => 200,               
                            ]);
                        }
                        else
                        {
                            return response()->json([
                                'message' => 'Payment not done!',
                                'status' => 500,               
                            ]);
                        }
                        
                    }
                    else if($brainResponse->success == false)
                    {
                        return response()->json([
                            'message' => 'Payment not done!',
                            'status' => 500,               
                        ]);
                    }
                }
           }
           else
           {
                return response()->json([
                    'message' => 'User subscription plan not saved!',
                    'status' => 500,               
                ]);
           }
       }
       else
       {
            return response()->json([
                'message' => 'Post job not saved!',
                'status' => 500,               
            ]);
       }
    }

    public function savePostJob($reqData = null,$userSubscriptionId=null)
    {       
        $userId = Auth::user()->id;
        $dataPricingData = Session::get('dataPricing');
        $jobId = isset($reqData['jobid'])?$reqData['jobid']:0;
        $lastshow = isset($reqData['lastshow'])?$reqData['lastshow']:0;
        if($jobId > 0)
        {
            $post = PostJobs::where('id',$jobId)->first();
            if(empty($post))
            {
                return 2; 
            }
        }
        else
        {
            $post = new PostJobs();
        }
        $post->user_id = $userId;
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
        // if(!empty($dataPricingData))
        // {
        //     $addonType = isset($dataPricingData['addon_type'])?$dataPricingData['addon_type']:0;
        //     if($addonType > 0)
        //     {
        //         $post->post_job_type = $addonType;                
        //     }
        // }
        $step = isset($reqData['step'])?$reqData['step']:4;
        $post->step = $step;
        $post->approved = 0;
        $post->status = 1;
        //dd($post);
        if($post->save())
        {
            $dataUserSubs =  UserSubscriptionPlans::with('addon')->where('id',$userSubscriptionId)->first();                    
            if(($jobId == 0 && $step == 4) || $lastshow == 1)
            {        
                if(!empty($dataUserSubs))
                {                    
                    if($dataUserSubs->plan_type == 1 || $dataUserSubs->plan_type == 2)
                    { 
                        if($dataUserSubs->plan_type == 1)
                        {                           
                            if($dataUserSubs->addon_id > 0)
                            {
                                $subsUsedQtyAddon = $dataUserSubs->addon_used_qty;
                                $subsUsedQtyAddon = $subsUsedQtyAddon+1;  
                            }
                            else
                            {
                                $subsUsedQtyAddon = 0;
                            }
                            $subsUsedQtyPlan = $dataUserSubs->plan_used_qty;
                            $subsUsedQtyPlan = $subsUsedQtyPlan+1;  
                            if($subsUsedQtyPlan == $dataUserSubs->plan_qty)
                            {                            
                                DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['plan_used_qty'=>$subsUsedQtyPlan,'addon_used_qty'=>$subsUsedQtyAddon,'active'=>2]);                           
                            }
                            else
                            {
                                DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['plan_used_qty'=>$subsUsedQtyPlan,'addon_used_qty'=>$subsUsedQtyAddon,'active'=>1]);
                            }

                        }
                        else if($dataUserSubs->plan_type == 2)
                        {
                            $subsUsedQtyAddon = $dataUserSubs->addon_used_qty;
                            $subsUsedQtyAddon = $subsUsedQtyAddon+1;                        
                            if($subsUsedQtyAddon == $dataUserSubs->addon_qty)
                            {                            
                                DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['plan_used_qty'=>$subsUsedQtyAddon,'addon_used_qty'=>$subsUsedQtyAddon,'active'=>2]);                           
                            }
                            else
                            {
                                DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['plan_used_qty'=>$subsUsedQtyAddon,'addon_used_qty'=>$subsUsedQtyAddon,'active'=>1]);
                            }
                        }
                       
                    }
                    else if($dataUserSubs->plan_type == 3)
                    {
                        $subsUsedQtyAddon = $dataUserSubs->addon_used_qty;
                        $subsUsedQtyAddon = $subsUsedQtyAddon+1;                      
                        if($subsUsedQtyAddon <= $dataUserSubs->addon_qty)
                        {
                            DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['addon_used_qty'=>$subsUsedQtyAddon]);
                        }
                        else
                        {
                            return 0;
                        }                       
                    }                 
                    
                }
                
            }
            if(!empty($dataUserSubs))
            {
                $addonType = 0;
                if(!empty($dataUserSubs['addon']))
                {
                    if($dataUserSubs['addon']->type == 1)
                    {
                        $addonType  = 1;
                    }
                    else if($dataUserSubs['addon']->type == 2)
                    {
                        $addonType  = 2;
                    }
                  
                }
                PostJobs::where('id',$post->id)->update(['user_subscription_plan_id'=>$dataUserSubs->id,'plan_type'=>$dataUserSubs->plan_type,'post_job_type'=>$addonType]);
            }
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

                // if(!empty($reqData['post_job_qualification']))
                // {
                //     foreach($reqData['post_job_qualification'] as $value=>$key)
                //     {
                //         if(isset($value))
                //         {
                //             $pQua = new PostJobQualifications();
                //             $pQua->post_job_id = $result->id;
                //             $pQua->qaulification = $value;
                //             $pQua->save();
                //         }
                //     }
                // }
                
            }
            return 1;
        }
        else
        {
            return 0;
        }
    }


    public function savePostJobAjax(Request $request)
    {        
      
       $userId = Auth::user()->id;
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
         
        $dataPricingData = Session::get('dataPricing');
        $jobId = isset($reqData['jobid'])?$reqData['jobid']:0;  
        $lastshow = isset($reqData['lastshow'])?$reqData['lastshow']:0; 
        $planId = isset($reqData['planid'])?$reqData['planid']:0; 
        if($jobId > 0)
        {
            $post = PostJobs::where('id',$jobId)->first();
            if(empty($post))
            {
                return 2; 
            }
        }
        else
        {
            $post = new PostJobs();
        }        
        $post->user_id = $userId;
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
        // if(!empty($dataPricingData))
        // {
        //     $addonType = isset($dataPricingData['addon_type'])?$dataPricingData['addon_type']:0;
        //     if($addonType > 0)
        //     {
        //         $post->post_job_type = $addonType;                
        //     }
        // }
        $step = isset($reqData['step'])?$reqData['step']:4;
        $post->step = $step;
        $post->approved = 0;  
        $post->status = 0;      
        if($post->save())
        {            
            $dataUserSubs = UserSubscriptionPlans::with('addon')->where('id',$planId)->where('user_id',$userId)->where('active',1)->first();           
            if(($jobId == 0 && $step == 4) || $lastshow == 1)
            {                
                if(!empty($dataUserSubs))
                {                    
                    if($dataUserSubs->plan_type == 1 || $dataUserSubs->plan_type == 2)
                    { 
                        if($dataUserSubs->plan_type == 1)
                        {                           
                            if($dataUserSubs->addon_id > 0)
                            {
                                $subsUsedQtyAddon = $dataUserSubs->addon_used_qty;
                                $subsUsedQtyAddon = $subsUsedQtyAddon+1;  
                            }
                            else
                            {
                                $subsUsedQtyAddon = 0;
                            }
                            $subsUsedQtyPlan = $dataUserSubs->plan_used_qty;
                            $subsUsedQtyPlan = $subsUsedQtyPlan+1;  
                            if($subsUsedQtyPlan == $dataUserSubs->plan_qty)
                            {                            
                                DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['plan_used_qty'=>$subsUsedQtyPlan,'addon_used_qty'=>$subsUsedQtyAddon,'active'=>2]);                           
                            }
                            else
                            {
                                DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['plan_used_qty'=>$subsUsedQtyPlan,'addon_used_qty'=>$subsUsedQtyAddon,'active'=>1]);
                            }

                        }
                        else if($dataUserSubs->plan_type == 2)
                        {
                            $subsUsedQtyAddon = $dataUserSubs->addon_used_qty;
                            $subsUsedQtyAddon = $subsUsedQtyAddon+1;                        
                            if($subsUsedQtyAddon == $dataUserSubs->addon_qty)
                            {                            
                                DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['plan_used_qty'=>$subsUsedQtyAddon,'addon_used_qty'=>$subsUsedQtyAddon,'active'=>2]);                           
                            }
                            else
                            {
                                DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['plan_used_qty'=>$subsUsedQtyAddon,'addon_used_qty'=>$subsUsedQtyAddon,'active'=>1]);
                            }
                        }
                       
                    }
                    else if($dataUserSubs->plan_type == 3)
                    {
                        $subsUsedQtyAddon = $dataUserSubs->addon_used_qty;
                        $subsUsedQtyAddon = $subsUsedQtyAddon+1;                      
                        if($subsUsedQtyAddon <= $dataUserSubs->addon_qty)
                        {
                            DB::table('user_subscription_plans')->where('id',$dataUserSubs->id)->update(['addon_used_qty'=>$subsUsedQtyAddon]);
                        }
                        else
                        {
                            return 0;
                        }                       
                    }                 
                    
                }
                
            }
            if(!empty($dataUserSubs))
            {
                $addonType = 0;
                if(!empty($dataUserSubs['addon']))
                {
                    if($dataUserSubs['addon']->type == 1)
                    {
                        $addonType  = 1;
                    }
                    else if($dataUserSubs['addon']->type == 2)
                    {
                        $addonType  = 2;
                    }
                  
                }
                PostJobs::where('id',$post->id)->update(['user_subscription_plan_id'=>$dataUserSubs->id,'plan_type'=>$dataUserSubs->plan_type,'post_job_type'=>$addonType]);
            }
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
                                $quePost->user_id = $userId;
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
                            $quePost->user_id = $userId;
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
                                $quePost->user_id = $userId;
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
                            $quePost->user_id = $userId;
                            $quePost->post_job_id = $post->id;
                            $quePost->question_id = $key;
                            $quePost->type = 2;
                            $quePost->status = 1;
                            $quePost->save();
                        }
                        
                    }
                    
                }
            }
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function savePostJobOnPlanChange(Request $request)
    {        
        $userId = Auth::user()->id;
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
               
        $dataPricingData = Session::get('dataPricing');
        $jobId = isset($reqData['jobid'])?$reqData['jobid']:0;       
        if($jobId > 0 )
        {
            $post = PostJobs::where('id',$jobId)->first();
            if(empty($post))
            {
                return 2; 
            }
        }
        else
        {
            $post = new PostJobs();
        }        
        $post->user_id = $userId;
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
        // if(!empty($dataPricingData))
        // {
        //     $addonType = isset($dataPricingData['addon_type'])?$dataPricingData['addon_type']:0;
        //     if($addonType > 0)
        //     {
        //         $post->post_job_type = $addonType;
        //     }
        // }
        $post->step = 3;
        $post->approved = 0;  
        $post->status = 1;     
        if($post->save())
        {
            
            $dataUserSubs = UserSubscriptionPlans::with('addon')->where('user_id',$userId)->where('active',1)->first();            
            if(!empty($dataUserSubs))
            {
                $addonType = 0;
                if(!empty($dataUserSubs['addon']))
                {
                    if($dataUserSubs['addon']->type == 1)
                    {
                        $addonType  = 1;
                    }
                    else if($dataUserSubs['addon']->type == 2)
                    {
                        $addonType  = 2;
                    }
                  
                }
                PostJobs::where('id',$post->id)->update(['user_subscription_plan_id'=>$dataUserSubs->id,'plan_type'=>$dataUserSubs->plan_type,'post_job_type'=>$addonType]);
            }
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
                                $quePost->user_id = $userId;
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
                            $quePost->user_id = $userId;
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
                                $quePost->user_id = $userId;
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
                            $quePost->user_id = $userId;
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
                'message' => 'success',
                'jobid' => $post->id,
                'jobtype'=>'draft',
                'step'=>3,
                'status' => 200,               
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'fail',
                'status' => 500,               
            ]);
        }
    }

    public function userSubscription()
    {
        $userId = Auth::user()->id;
        $dataPricingData = Session::get('dataPricing');
        $addonId = isset($dataPricingData['addonId'])?$dataPricingData['addonId']:0;        
        $days = 0;
        $usedQyt = 1;
        //dd($dataPricingData);
        if(!empty($dataPricingData))
        {          
            if($dataPricingData['plan_type'] == 1)
            {
                $dataUserSubs = UserSubscriptionPlans::where(['user_id'=>$userId,'plan_type'=>1,'status'=>1])->first();
            }            
            else if($dataPricingData['plan_type'] == 2)
            {
                $dataUserSubs = UserSubscriptionPlans::where(['user_id'=>$userId,'plan_type'=>2,'status'=>1])->first();
            }
            else if($dataPricingData['plan_type'] == 3)
            {
                $dataUserSubs = UserSubscriptionPlans::where(['user_id'=>$userId,'plan_type'=>3,'status'=>1])->first();
            }      

            if(!empty($dataUserSubs))
            {
                $oldQty = $dataUserSubs->plan_qty;
                $newQty = $oldQty+$dataPricingData['plan_qty'];

                $oldPlanAmount = $dataUserSubs->plan_amount;
                $newPlanAmount = $dataPricingData['plan_amount']+$oldPlanAmount;

                $oldAddonAmount = $dataUserSubs->addon_amount;
                $newAddonAmount = $dataPricingData['addon_amount']+$oldAddonAmount;

                $newAmount = $newPlanAmount+$newAddonAmount;
                $newVatAmount = $newAmount*$dataPricingData['vat']/100;

                $newGrandTotal = $newAmount+$newVatAmount;

                $dataUserSubs->plan_qty = $newQty;
                $dataUserSubs->plan_amount = $newPlanAmount;
                $dataUserSubs->addon_amount = $newAddonAmount;
                $dataUserSubs->amount = $newAmount;
                $dataUserSubs->vat_amount = $newVatAmount;
                $dataUserSubs->grand_total = $newGrandTotal;
                $dataUserSubs->update();                
            }
            else
            {
                $tblUserSubs = new UserSubscriptionPlans();
                if($dataUserSubs->plan_type == 1)
                {
                    $tblUserSubs->plan_type = 1;
                }
                else if($dataUserSubs->plan_type == 2)
                {
                    $tblUserSubs->plan_type = 2;
                }
                else if($dataUserSubs->plan_type == 3)
                {
                    $tblUserSubs->plan_type = 3;
                }
            }
            
            
            $tblUserSubs->user_id = $userId;
            $id = $dataPricingData['id'];
            if($dataPricingData['plan_type'] == 1)
            {                
                $tblUserSubs->plan_type = 1;
                $tblUserSubs->single_job_id  = $dataPricingData['id'];
                $tblUserSubs->addon_id  = $dataPricingData['addonId'];
                $dataSingle = DB::table('single_job')->where('id',$id)->first();
                $days = isset($dataSingle->plan_duration)?$dataSingle->plan_duration:0;
            }
            else if($dataPricingData['plan_type'] == 2)
            {
                $tblUserSubs->plan_type = 2;
                $tblUserSubs->addon_id  = $id;
                $dataAddon = DB::table('addons')->where('id',$id)->first();
                if($dataAddon->type == 1)
                {
                    $days = 365; 
                }
                else if($dataAddon->type == 2)
                {
                    $days = 365;
                }
            }
            else if($dataPricingData['plan_type'] == 3)
            {
                $tblUserSubs->plan_type = 3;
                $tblUserSubs->addon_id  = $dataPricingData['addonId'];
                $tblUserSubs->subscription_plan_id  = $dataPricingData['id'];
                $dataSubs = DB::table('subscription_plans')->where('id',$id)->first();
                $days = isset($dataSubs->plan_duration)?$dataSubs->plan_duration:0;
                $tblUserSubs->active  = 1;
            }
            else if($dataPricingData['plan_type'] == 4)
            {
                $tblUserSubs->plan_type = 4;
                $tblUserSubs->addon_id  = $dataPricingData['addonId'];
                $tblUserSubs->subscription_plan_id  = $dataPricingData['id'];
                $dataSubs = DB::table('subscription_plans')->where('id',$id)->first();
                $days = isset($dataSubs->plan_duration)?$dataSubs->plan_duration:0;
                $tblUserSubs->active  = 1;
            }
           
            $tblUserSubs->active  = 1;
            $tblUserSubs->plan_qty  = $dataPricingData['plan_qty'];
            $tblUserSubs->addon_qty  = $dataPricingData['addon_qty'];
            $tblUserSubs->plan_amount  = $dataPricingData['plan_amount'];
            $tblUserSubs->addon_amount  = $dataPricingData['addon_amount'];
            $tblUserSubs->amount  = $dataPricingData['amount'];
            $tblUserSubs->vat_amount =  $dataPricingData['amount']*$dataPricingData['vat']/100;
            $tblUserSubs->grand_total =  (float)$dataPricingData['amount']+ (float)$dataPricingData['amount']*$dataPricingData['vat']/100;
            $tblUserSubs->plan_used_qty  = 0; 
            $tblUserSubs->addon_used_qty  = 0;           
            
            $startDate =  date('Y-m-d');
            $endDate = date('Y-m-d',strtotime(' + '.$days.' days'));
            $tblUserSubs->plan_start_date  = date('Y-m-d');
            $tblUserSubs->plan_end_date  = date('Y-m-d',strtotime(' + '.$days.' days'));
            if($tblUserSubs->save())
            {          
                $data = UserSubscriptionPlans::where(['user_id'=>$userId,'active'=>1])->where('id','!=',$tblUserSubs->id)->whereIn('plan_type',[3,4])->update(['active'=>2]);      
                return $tblUserSubs->id;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
        
        //$tblUserSubs->
    }

    public function checkSubscription(Request $request)
    {
        $userId = Auth::user()->id;
        $planid = $request->query('planid');
        if($planid != 'null')
        {
            $userPlanId = $planid;
        }
        else
        {
            $userPlanId = 0;
        }
        if($userId > 0)
        {
             $dataSubscription = DB::table('user_subscription_plans')->where('id',$userPlanId)->where('user_id',$userId)->where('active',1)->first();
             if(!empty($dataSubscription))
             {
                return response()->json([
                    'message' => 'success',
                    'status' => 200,
                    'isPlan'=>  1,
                    'planid' => $userPlanId,  
                ]);
             }
             else
             {
                $dataPricingData = Session::get('dataPricing');                
                if(!empty($dataPricingData))
                {
                    return response()->json([
                        'message' => 'success',
                        'status' => 200,
                        'isPlan'=>  0,
                        'planid' => 0,   
                    ]);
                }
                else
                {
                    return response()->json([
                        'message' => 'success',
                        'status' => 0,
                        'isPlan'=>  0, 
                        'planid' => 0,  
                    ]);
                }               
             }
        }
        else
        {
            return response()->json([
                'message' => 'success',
                'status' => 2,
                'isPlan'=>  0,   
            ]);
        }
    }

    public function editPostJob(Request $request, $id = null)
    {
        $userId = Auth::user()->id;
        $id11 = str_replace('jobid=','',$id);
        $id11 = (int)$id11;
        $jobtype = $request->query('jobtype');
        $dataJobs = PostJobs::with(['postJobTasks','postJobBenifits','PostJobQualifications','PostJobQuestions','postJobCategory'])->where('id',$id11)->where('user_id',$userId)->first();
        if(!empty($dataJobs))
        {
            return $dataJobs;
        }
        else
        {
            return 0;
        }
        
    }

}
