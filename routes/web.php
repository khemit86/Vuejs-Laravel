<?php
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Auth', 'middleware' => 'guest'], function () 
{
    
    Route::get('/login', [LoginController::class,'login'])->name('login');
    
    Route::get('/candidate_register',[RegisterController::class,'candidateRegister'])->name('candidateRegister');
    Route::post('postCandidateRegister',[RegisterController::class,'postCandidateRegister'])->name('postCandidateRegister');
   
     Route::get('employerRegister',[RegisterController::class,'employerRegister'])->name('employerRegister');
   
    Route::post('postEmployerRegister',[RegisterController::class,'postEmployerRegister'])->name('postEmployerRegister');  
   
   Route::get('/login', [LoginController::class,'login'])->name('login');
   Route::post('loginPost', [LoginController::class,'loginPost'])->name('loginPost');
    
});

// Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
//     Route::get('/', 'FrontendController@index')->name('index');
//     Route::get('home', 'FrontendController@index')->name('home');
//     Route::get('search', 'FrontendController@listing')->name('search');
//     Route::group(['middleware' => ['auth']], function () 
//     {
//         Route::get('postjob',[FrontendController::class,'postjob'])->name('postjob');
        

//     });
// });

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () 
{
    Route::get('/', function ()  
    {
        return view('frontend.index');
       
    });  
    
    Route::get('/login', function ()  
    {
        return view('frontend.index');
       
    })->name('login');
    Route::get('/candidate_register', function ()  
    {
        return view('frontend.index');
       
    }); 
    
    Route::get('/forgot', function ()  
    {
        return view('frontend.index');
       
    }); 
    Route::get('/emailVerify/{email}', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('/otpverify', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('/resetpassword/{email}', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('/search', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('/job_details', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('/employer_register', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('/pricing', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('candidate/profile', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('candidate/account/edit_details', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('candidate/profile/add_work_exp', function ()  
    {
        return view('frontend.index');
       
    });
    Route::get('candidate/profile/edit_work_exp/{id}', function ()  
    {
        return view('frontend.index');
       
    });

    Route::get('candidate/profile/add_skills', function ()  
    {
        return view('frontend.index');       
    });

    Route::get('candidate/profile/candidate_info', function ()  
    {
        return view('frontend.index');       
    });

    
    

    ///////// Employer //////////////////////////
    Route::get('employer/postjob', function ()  
    {
        return view('frontend.index');
       
    });

    Route::get('employer/index', function ()  
    {
        return view('frontend.employer');
       
    });
    Route::get('employer/jobs', function ()  
    {
        return view('frontend.employer');
       
    });

    Route::get('employer/question/index', function ()  
    {
        return view('frontend.employer');
       
    });
    Route::get('employer/question/add', function ()  
    {
        return view('frontend.employer');
       
    });
    Route::get('employer/question/edit/{id}', function ()  
    {
        return view('frontend.employer');
       
    });

    Route::get('employer/option/index', function ()  
    {
        return view('frontend.employer');
       
    });
    Route::get('employer/option/add', function ()  
    {
        return view('frontend.employer');
       
    });
    Route::get('employer/option/edit/{id}', function ()  
    {
        return view('frontend.employer');
       
    });
    Route::get('employer/subscription/index', function ()  
    {
        return view('frontend.employer');
       
    });
    
    Route::get('employer/subscription/view/{id}', function ()  
    {
        return view('frontend.employer');
       
    });
    Route::get('employer/transaction/index', function ()  
    {
        return view('frontend.employer');
       
    });
    Route::get('employer/profile', function ()  
    {
        return view('frontend.employer');
       
    });

    Route::get('employer/pricing', function ()  
    {
        return view('frontend.employer');       
    });

    Route::get('employer/payment', function ()  
    {
        return view('frontend.employer');       
    });

    Route::get('employer/add_addon', function ()  
    {
        return view('frontend.employer');       
    });
    
    
});

Route::group(['namespace' => 'Backend', 'as' => 'backend.'], function () {    

    Route::get('/admin/{any}', function ()  
    {
        return view('backend.index');
       
    });
    Route::get('/admin/{any}/{id}', function ()  
    {
        return view('backend.index');
       
    });
    Route::get('/admin/{any}/{id}/{id1}', function ()  
    {
        return view('backend.index');
       
    });
    Route::get('/admin', function ()  
    {
        return view('backend.index');
        
    });
    Route::get('admin/', function ()  
    {
        return view('backend.index');
        
    });
    
});
//  Route::get('logout', [LoginController::class,'logout'])->name('logout');




