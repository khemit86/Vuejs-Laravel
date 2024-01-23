<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\CandidateController;
use App\Http\Controllers\Backend\EmployerController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubscriptionPlansController;
use App\Http\Controllers\Backend\AddonsController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\QuestionsController;
use App\Http\Controllers\Backend\OptionsController;
use App\Http\Controllers\Backend\EmployerJobsController;
use App\Http\Controllers\Backend\PaymentsController;
use App\Http\Controllers\Backend\DiscountsController;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\Employer\PostJobController;
use App\Http\Controllers\Frontend\Employer\JobsController;
use App\Http\Controllers\Frontend\Employer\DashboardController;
use App\Http\Controllers\Frontend\Employer\EmployerQuestionsController;
use App\Http\Controllers\Frontend\Employer\EmployerOptionsController;
use App\Http\Controllers\Frontend\Employer\SubscriptionsController;


use App\Http\Controllers\Frontend\Candidate\CandidateAccountController;
use App\Http\Controllers\Frontend\Candidate\CandidateProfileController;


//////////////  admin routes               \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::middleware('auth:sanctum')->group( function () {
   
    Route::get('/admin/dashboard', [BackendController::class,'index']);
    Route::get('admin/candidate/index',  [CandidateController::class,'index'])->name('index');
    Route::get('admin/candidate/add', [CandidateController::class,'add'])->name('add');

    Route::get('admin/candidate/view/{id}', [CandidateController::class,'view']);
    Route::get('admin/candidate/edit/{id}', [CandidateController::class,'edit']);
    Route::post('admin/candidate/update/{id}', [CandidateController::class,'update']);
    Route::delete('admin/candidate/delete/{id}', [CandidateController::class,'destroy']);
    Route::post('admin/candidate/store', [CandidateController::class,'store']);
    Route::post('admin/candidate/export', [CandidateController::class,'export']);
    Route::get('admin/candidate/changeStatus/{id}', [CandidateController::class,'changeStatus']);

    Route::get('admin/employer/index',  [EmployerController::class,'index'])->name('index');
    Route::get('admin/employer/add', [EmployerController::class,'add'])->name('add');
    Route::get('admin/employer/view/{id}', [EmployerController::class,'view']);
    Route::get('admin/employer/edit/{id}', [EmployerController::class,'edit']);
    Route::post('admin/employer/update/{id}', [EmployerController::class,'update']);
    Route::delete('admin/employer/delete/{id}', [EmployerController::class,'destroy']);
    Route::post('admin/employer/store', [EmployerController::class,'store']);
    Route::post('admin/employer/export', [EmployerController::class,'export']);
    Route::get('admin/employer/changeStatus/{id}', [EmployerController::class,'changeStatus']);
    
    

    Route::get('admin/category/index',  [CategoryController::class,'index'])->name('index');  
    Route::get('admin/category/edit/{id}', [CategoryController::class,'edit']);
    Route::post('admin/category/store', [CategoryController::class,'store']);
    Route::post('admin/category/update/{id}', [CategoryController::class,'update']);
    Route::delete('admin/category/delete/{id}', [CategoryController::class,'destroy']);
    Route::get('admin/category/getParentCategory',  [CategoryController::class,'getParentCategory']);
    Route::get('admin/category/getParentCat/{id}', [CategoryController::class,'getParentCat']);


    Route::get('admin/subscription/index',  [SubscriptionPlansController::class,'index'])->name('index');  
    Route::get('admin/subscription/edit/{id}', [SubscriptionPlansController::class,'edit']);
    Route::post('admin/subscription/store', [SubscriptionPlansController::class,'store']);
    Route::post('admin/subscription/update/{id}', [SubscriptionPlansController::class,'update']);
    Route::delete('admin/subscription/delete/{id}', [SubscriptionPlansController::class,'destroy']);
    Route::get('admin/subscription/singleJob',  [SubscriptionPlansController::class,'singleJob']);  
    Route::post('admin/subscription/updateSingleJob',  [SubscriptionPlansController::class,'updateSingleJob']);

    Route::get('admin/addons/index',  [AddonsController::class,'index'])->name('index');  
    Route::get('admin/addons/edit/{id}', [AddonsController::class,'edit']);
    Route::post('admin/addons/update/{id}', [AddonsController::class,'update']);
    Route::get('admin/settings/index',  [SettingsController::class,'index'])->name('index');
    Route::post('admin/settings/store', [SettingsController::class,'store']);   
     Route::get('/admin/dashboard', [BackendController::class,'index']);

     Route::get('admin/question/index',  [QuestionsController::class,'index'])->name('index');  
     Route::get('admin/question/edit/{id}', [QuestionsController::class,'edit']);
     Route::post('admin/question/update/{id}', [QuestionsController::class,'update']);
     Route::delete('admin/question/delete/{id}', [QuestionsController::class,'destroy']);
     Route::post('admin/question/store', [QuestionsController::class,'store']);

     Route::get('admin/option/index',  [OptionsController::class,'index'])->name('index');  
     Route::get('admin/option/edit/{id}', [OptionsController::class,'edit']);
     Route::post('admin/option/update/{id}', [OptionsController::class,'update']);
     Route::delete('admin/option/delete/{id}', [OptionsController::class,'destroy']);
     Route::post('admin/option/store', [OptionsController::class,'store']);
     Route::get('admin/option/getQuestionCategory',  [OptionsController::class,'getQuestionCategory']);


     Route::get('admin/discount/index',  [DiscountsController::class,'index'])->name('index');  
     Route::get('admin/discount/edit/{id}', [DiscountsController::class,'edit']);
     Route::post('admin/discount/update/{id}', [DiscountsController::class,'update']);
     Route::delete('admin/discount/delete/{id}', [DiscountsController::class,'destroy']);
     Route::post('admin/discount/store', [DiscountsController::class,'store']);


     Route::get('admin/job/index',  [EmployerJobsController::class,'index'])->name('index');
     Route::get('admin/job/view/{id}', [EmployerJobsController::class,'view']);
     Route::get('admin/job/changeApproved/{id}',  [EmployerJobsController::class,'changeApproved'])->name('changeApproved');
     Route::get('admin/job/changeStatus/{id}',  [EmployerJobsController::class,'changeStatus'])->name('changeStatus');
     Route::get('admin/job/delete/{id}',  [EmployerJobsController::class,'delete'])->name('delete');
     Route::get('admin/job/editPostJob/{id}',  [EmployerJobsController::class,'editPostJob'])->name('editPostJob');
     Route::post('admin/job/saveJob/',  [EmployerJobsController::class,'saveJob'])->name('saveJob');
     Route::post('admin/job/updateJob',  [EmployerJobsController::class,'updateJob'])->name('updateJob');
     Route::get('admin/job/getEmployers',  [EmployerJobsController::class,'getEmployers'])->name('getEmployers');
     Route::get('admin/job/getAddon',  [EmployerJobsController::class,'getAddon'])->name('getAddon');
     Route::get('admin/job/getSubscriptionplans',  [EmployerJobsController::class,'getSubscriptionplans'])->name('getSubscriptionplans');
     Route::get('admin/job/getQuestion',  [EmployerJobsController::class,'getQuestion'])->name('getQuestion');
    Route::get('admin/payment/index',  [PaymentsController::class,'index'])->name('index');  
    Route::delete('admin/payment/delete/{id}', [PaymentsController::class,'destroy']);
    Route::get('admin/payment/view/{id}', [PaymentsController::class,'view']);
    Route::get('admin/payment/generatePDF/{id}', [PaymentsController::class,'generatePDF']);
});

Route::middleware('auth:sanctum')->get('/admin/checkAuth', function () 
{
    return true;
});

Route::post('admin/logout', [BackendController::class,'logout']);
Route::post('admin/checkAuth', [BackendController::class,'checkAuth']);
Route::post('admin/loginPost', [BackendController::class,'loginPost']);




////////////////////////////////////    Front routes \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::post('front/loginPost', [FrontendController::class,'loginPost']);
Route::get('front/getCategory', [FrontendController::class,'getCategory']);
Route::get('front/getParentCategory', [FrontendController::class,'getParentCategory']);
Route::get('front/getChildCategory/{id}', [FrontendController::class,'getChildCategory']);
Route::get('front/getCategoryEdit/{id}', [FrontendController::class,'getCategoryEdit']);
Route::get('front/getCountries', [FrontendController::class,'getCountries']);
Route::post('front/addSubscription', [FrontendController::class,'addSubscription']);
Route::post('front/candidateRegister', [FrontendController::class,'candidateRegister']);
Route::post('front/employerRegister', [FrontendController::class,'employerRegister']);
Route::post('front/forgotPassword', [FrontendController::class,'forgotPassword']);
Route::get('front/getPricing', [FrontendController::class,'getPricing']);
Route::get('front/getPricing11', [FrontendController::class,'getPricing11']);
Route::post('front/getSingleJobAmounts', [FrontendController::class,'getSingleJobAmounts']);
Route::post('front/checkAuth', [FrontendController::class,'checkAuth']);
Route::get('front/emailVerify/{email}', [FrontendController::class,'emailVerify']);
Route::post('front/verifyOtp', [FrontendController::class,'verifyOtp']);
Route::get('front/checkForgotExpired/{email}', [FrontendController::class,'checkForgotExpired']);
Route::post('front/resetPassword/{email}', [FrontendController::class,'resetPassword']);
Route::post('front/addPricing', [FrontendController::class,'addPricing']);
Route::post('front/checkSubscriptionPackage', [FrontendController::class,'checkSubscriptionPackage']);
Route::post('front/checkSubscriptionPackageFront', [FrontendController::class,'checkSubscriptionPackageFront']);



//////////////////////////////// Candidate (user) ////////////////////////////////////
Route::post('front/candidate/account/changeemail', [CandidateAccountController::class,'changeemail']);
Route::post('front/candidate/account/changePassword', [CandidateAccountController::class,'changePassword']);
Route::post('front/candidate/account/deletePassword', [CandidateAccountController::class,'deletePassword']);
Route::get('front/candidate/account/getCandidate', [CandidateAccountController::class,'getCandidate']);

Route::get('front/candidate/profile/getCandidateProfile', [CandidateProfileController::class,'getCandidateProfile']);
Route::post('front/candidate/profile/uploadCV', [CandidateProfileController::class,'uploadCV']);
Route::post('front/candidate/profile/deleteCV', [CandidateProfileController::class,'deleteCV']);
Route::post('front/candidate/profile/addworkexp', [CandidateProfileController::class,'addworkexp']);
Route::post('front/candidate/profile/deleteWorkExp/{id}', [CandidateProfileController::class,'deleteWorkExp']);
Route::get('front/candidate/profile/getWorkExp/{id}', [CandidateProfileController::class,'getWorkExp']);
Route::post('front/candidate/profile/updateWorkExp', [CandidateProfileController::class,'updateWorkExp']);
Route::post('front/candidate/profile/addSkill', [CandidateProfileController::class,'addSkill']);
Route::get('front/candidate/profile/getSkills', [CandidateProfileController::class,'getSkills']);

////////////////////////////////   Employer                       //////////

Route::get('front/employer/postjob/getQuestion', [PostJobController::class,'getQuestion']);
Route::get('front/employer/postjob/getQuestionInfo', [PostJobController::class,'getQuestionInfo']);
Route::get('front/employer/postjob/getQuestionAutoComplete', [PostJobController::class,'getQuestionAutoComplete']);
Route::get('front/employer/postjob/getOptions/{id}', [PostJobController::class,'getOptions']);
Route::post('front/postjob/getSuggestCategory', [PostJobController::class,'getSuggestCategory']);
Route::post('front/employer/postjob/getBrainToken', [PostJobController::class,'getBrainToken']);
Route::post('front/employer/postjob/payments', [PostJobController::class,'payments']);
Route::post('front/employer/postjob/separatePayments', [PostJobController::class,'separatePayments']);
Route::post('front/employer/postjob/separateAddonPayments', [PostJobController::class,'separateAddonPayments']);
Route::get('front/employer/postjob/getSessionPricing', [PostJobController::class,'getSessionPricing']);
Route::post('front/employer/postjob/savePostJobAjax', [PostJobController::class,'savePostJobAjax']);
Route::post('front/employer/postjob/savePostJobOnPlanChange', [PostJobController::class,'savePostJobOnPlanChange']);
Route::get('front/employer/postjob/checkSubscription', [PostJobController::class,'checkSubscription']);
Route::get('front/employer/postjob/editPostJob/{id}', [PostJobController::class,'editPostJob']);
Route::get('front/employer/jobs/getJobs', [JobsController::class,'getJobs']);
Route::get('front/employer/jobs/deleteRecord/{id}', [JobsController::class,'deleteRecord']);
Route::get('front/employer/jobs/getCurrentPlans', [JobsController::class,'getCurrentPlans']);

Route::post('front/employer/getEmployerData', [DashboardController::class,'getEmployerData']);
Route::post('front/employer/editPersonalInfo', [DashboardController::class,'editPersonalInfo']);
Route::post('front/employer/editCompanyInfo', [DashboardController::class,'editCompanyInfo']);
Route::post('front/employer/uploadLogo', [DashboardController::class,'uploadLogo']);

Route::post('front/employer/question/store', [EmployerQuestionsController::class,'store']);
Route::get('front/employer/question/index', [EmployerQuestionsController::class,'index']);
Route::post('front/employer/question/destroy/{id}', [EmployerQuestionsController::class,'destroy']);
Route::get('front/employer/question/edit/{id}', [EmployerQuestionsController::class,'edit']);
Route::post('front/employer/question/update/{id}', [EmployerQuestionsController::class,'update']);

Route::post('front/employer/option/store', [EmployerOptionsController::class,'store']);
Route::get('front/employer/option/index', [EmployerOptionsController::class,'index']);
Route::post('front/employer/option/destroy/{id}', [EmployerOptionsController::class,'destroy']);
Route::get('front/employer/option/edit/{id}', [EmployerOptionsController::class,'edit']);
Route::post('front/employer/option/update/{id}', [EmployerOptionsController::class,'update']);
Route::get('front/employer/option/getQuestionCategory', [EmployerOptionsController::class,'getQuestionCategory']);

Route::get('front/employer/subscription/getSubscriptionHistory', [SubscriptionsController::class,'getSubscriptionHistory']);
Route::post('front/employer/subscription/getSubscriptionHistoryDetails/{id}', [SubscriptionsController::class,'getSubscriptionHistoryDetails']);
Route::get('front/employer/subscription/generatePDF/{id}', [SubscriptionsController::class,'generatePDF']);


Route::get('front/employer/subscription/getTransactionHistory', [SubscriptionsController::class,'getTransactionHistory']);

Route::middleware('auth:sanctum')->group( function () {

});

