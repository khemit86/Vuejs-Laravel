<?php

namespace App\Http\Controllers\frontend\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSubscriptionPlans;
use DB;
use Session;
use Auth;
use App\Models\Payments;
use PDF;
class SubscriptionsController extends Controller
{
    	
    public function __construct()
    {

    }
    
    public function getSubscriptionHistory(Request $request)
    {
        $userId = Auth::user()->id;
        $data = UserSubscriptionPlans::with(['payment','subscriptionPlan','addon','singleJob','offer'])->where('user_id',$userId)->orderBy('active','asc')->orderBy('id','desc')->get();
        return $data;
    }

    public function getTransactionHistory(Request $request)
    {
        $userId = Auth::user()->id;
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');       
        $query = Payments::query();

        if(isset($startDate) && $startDate != 'null')
        {
            $startdate1 = date('Y-m-d',strtotime($startDate));
            if(isset($endDate) && $endDate != 'null')
            {      
               
                $enddate1 = date('Y-m-d',strtotime($endDate));
                $query->where('created_at','>=',$startdate1.' 00:00:00');
                $query->where('created_at','<=',$enddate1.' 23:59:59'); 
            }
            else
            {
               
                $query->where('created_at','>=',$startdate1.' 00:00:00');
                $query->where('created_at','<=',$startdate1.' 23:59:59');
            }            
            
        }        
        $data = $query->with(['userSubscriptionPlan.subscriptionPlan','userSubscriptionPlan.addon','userSubscriptionPlan.singleJob'])->where('user_id',$userId)->orderBy('id','desc')->paginate(10);
       return $data;
    }

    public function getSubscriptionHistoryDetails($id = null)
    {
        $data = UserSubscriptionPlans::with(['subscriptionPlan','addon','singleJob','offer'])->where('id',$id)->first();
        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return 0;
        }
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

    public function generatePDF($id = null)
    {        
       $result = array();
       $result['plan_title'] = '';
       $result['plan_amount'] = '';
       $result['plan_qty'] = '';
       $result['plan_used_qty'] = '';
       $result['plan_grand_totale'] = '';
       $result['plan_type'] = '';
       $result['vat_per'] = '';
       $result['vat_amount'] = '';

        $result['user_name'] = '';
        $result['company_name'] = '';
        $result['vat_no'] = '-';
        $result['email'] = '';
        $result['uid'] = '';
        $result['mobile'] = '';
        $result['location'] = '';
        $result['logo_icon'] = 'http://proslipsi.com/img/email_logo-new.png';
        $result['mail_icon'] = 'http://proslipsi.com/img/mail.png';
        $result['phone_icon'] = 'http://proslipsi.com/img/call-512.png';
        //dd($result);
       $data = Payments::with(['user','userSubscriptionPlan.subscriptionPlan','userSubscriptionPlan.addon','userSubscriptionPlan.singleJob'])->where('user_subscription_plan_id',$id)->first();
       if(!empty($data))
       {
            $result['date'] = date('d-M-Y');
            if(!empty($data->user))
            {
                $result['user_name'] = $data->user->name;
                $result['company_name'] = $data->user->company_name;
                $result['email'] = $data->user->email;
                $result['uid'] = $data->user->u_id;
                $result['mobile'] = $data->user->mobile;
               
                if(!empty($data->user->address))
                {
                    $result['location'] = $data->user->address;
                }
                else
                {
                    $result['location'] = $data->user->location;
                }
                if(!empty($data->user->vat_no))
                {                   
                    $result['vat_no'] = $data->user->vat_no;
                }
                
            }
            

            $result['transaction_id'] = $data->transaction_id;
            $result['invoice_number'] = $data->invoice_number;
            $result['amount'] = $data->amount;            
            
            if(!empty($data->userSubscriptionPlan))
            {
                if($data->userSubscriptionPlan->plan_type == 1 && $data->userSubscriptionPlan->addon_id > 0)
                {
                    $result['plan_title'] = $data->userSubscriptionPlan->singleJob->title;
                    $result['plan_qty'] = $data->userSubscriptionPlan->plan_qty;

                    $result['addon_title'] = $data->userSubscriptionPlan->addon->title;
                    $result['addon_qty'] = $data->userSubscriptionPlan->addon_qty;
                    $result['plan_type'] = 'Single Job With Addon'; 
                }
                else if($data->userSubscriptionPlan->plan_type == 1 && $data->userSubscriptionPlan->addon_id == 0)
                {
                    $result['plan_title'] = $data->userSubscriptionPlan->singleJob->title;
                    $result['plan_qty'] = $data->userSubscriptionPlan->plan_qty;

                    $result['addon_title'] = '';
                    $result['addon_qty'] = 0;
                    $result['plan_type'] = 'Single Job Without Addon'; 
                }
                else if($data->userSubscriptionPlan->plan_type == 2 && $data->userSubscriptionPlan->addon_id > 0)
                {
                    $result['plan_title'] = '';
                    $result['plan_qty'] = 0;

                    $result['addon_title'] = $data->userSubscriptionPlan->addon->title;
                    $result['addon_qty'] = $data->userSubscriptionPlan->addon_qty;
                    $result['plan_type'] = 'Addon Without Single job'; 
                }
                else if($data->userSubscriptionPlan->plan_type == 3 && $data->userSubscriptionPlan->addon_id > 0 &&  $data->userSubscriptionPlan->is_addon_seprate == 0 )
                {
                    $result['plan_title'] = $data->userSubscriptionPlan->subscriptionPlan->title;
                    $result['plan_qty'] = $data->userSubscriptionPlan->plan_qty;

                    $result['addon_title'] = $data->userSubscriptionPlan->addon->title;
                    $result['addon_qty'] = $data->userSubscriptionPlan->addon_qty;
                    $result['plan_type'] =  'Subscription With Addon';
                }
                else if($data->userSubscriptionPlan->plan_type == 3 && $data->userSubscriptionPlan->addon_id > 0 &&  $data->userSubscriptionPlan->is_addon_seprate == 1 )
                {
                    $result['plan_title'] = '';
                    $result['plan_qty'] = 0;

                    $result['addon_title'] = $data->userSubscriptionPlan->addon->title;
                    $result['addon_qty'] = $data->userSubscriptionPlan->addon_qty;
                    $result['plan_type'] = 'Subscription With Addon';
                }
                else if($data->userSubscriptionPlan->plan_type == 4)
                {
                    $result['plan_title'] = $data->userSubscriptionPlan->subscriptionPlan->title;
                    $result['plan_qty'] = $data->userSubscriptionPlan->plan_qty;

                    $result['addon_title'] = '';
                    $result['addon_qty'] = 0;
                    $result['plan_type'] = 'Subscription Without Addon';
                }               
                $result['plan_used_qty'] = $data->userSubscriptionPlan->used_qty;
                $result['plan_amount'] = $data->userSubscriptionPlan->plan_amount;
                $result['addon_amount'] = $data->userSubscriptionPlan->addon_amount;
                $result['total'] = $data->userSubscriptionPlan->amount;
                $result['plan_grand_totale'] = $data->userSubscriptionPlan->grand_total;
                $result['vat_per'] = $data->userSubscriptionPlan->amount;
                $result['vat_amount'] = $data->userSubscriptionPlan->vat_amount;
            }
            
            $path = INVOICE.'invoice.pdf';
            $pdf = PDF::setOptions(['isRemoteEnabled' => true])->loadView('invoicePDF',$result)->save($path);
            //$pdf = PDF::loadView('invoicePDF',$result);                     
            //$pdf->save($path);
            $showpath = $path = url('/').'/uploads/invoice/invoice.pdf';
            return response()->json([
                'message' => 'successfully',
                'status' => 200,
                'path'=>$showpath
            ],200);
       }
       else
       {
        return response()->json([
            'message' => 'Record not found!',
            'status' => 501,
            'path'=>''
        ],200);
       }
       
    }

}
