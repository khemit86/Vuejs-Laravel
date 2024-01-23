<?php

namespace App\Http\Controllers\frontend\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Questions;
use App\Models\Options;
use Auth;

class EmployerQuestionsController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $search = $request->query('search');        
        $query = Questions::query();
        if(!empty($search))
        {            
            $query->where('title', 'LIKE', "%$search%");
        }
        return $query->where('uploaded_by',2)->orderBy('id','DESC')->paginate(10);
        
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate( 
        [
            'title' => 'required|string|max:255',
            'status' => 'required',            
            ],
            [
                'title.required' => 'Question title name is required!',
                'status.required' => 'Status is required!',                
            ]
        );
        if($request->input('is_recommended') == 1)
        {
            $dataCatC = DB::table('questions')->where('is_recommended',1)->where('uploaded_by',2)->get();
            if(count($dataCatC) >= 5)
            {
                return response()->json([
                    'message' => 'Already 5 recommended questions added, please first make un-recommended one of them!',
                    'status' => 500
                ],200);
            }
        }
        $question = new Questions();
        $options = array_filter($request->input('option'));
    	$question->title= $request->input('title');  
        $question->question_type = $request->input('question_type');
        $question->is_recommended = $request->input('is_recommended');
    	$question->status= $request->input('status');
        $question->uploaded_by = 2;
        $question->employer_id = $userId;
       if($question->save())
       {
            if(!empty($options))
            {
                foreach($options as $key=>$value)
                {
                    $option = new Options();
                    $option->title = $value;
                    $option->question_id = $question->id;               
                    $option->status = 1;
                    $option->save();
                }
            }
       }
        return response()->json([
            'message' => 'Record added successfully',
            'status' => 200
        ],200);

    }   
   
    public function edit($id)
    {
        return $data = Questions::where('id',$id)->with('options')->first();
    }
    
    public function update(Request $request,$id = null)
    {   
        $userId = Auth::user()->id;     
        $data = Questions::where('id',$id)->first();  
        if($request->input('is_recommended') == 1 && $data->is_recommended == 0)
        {        
            $dataCatC = DB::table('questions')->where('is_recommended',1)->where('uploaded_by',2)->get();
            if(count($dataCatC) >= 5)
            {
                return response()->json([
                    'message' => 'Already 5 recommended questions added, please first make un-recommended one of them!',
                    'status' => 502
                ],200);
            }
        }       
        if(!empty($data))
        {
            $request->validate( 
                [
                    'title' => 'required|string|max:255',
                    'status' => 'required',
                   
                    ],
                    [
                        'title.required' => 'Question title is required!',
                        'status.required' => 'Status is required!',
                        
                    ]
                );
                $options = array_filter($request->input('option'));
                $data->title = $request->input('title');
                $data->question_type = $request->input('question_type');
                $data->is_recommended = $request->input('is_recommended');
                $data->status=$request->input('status');
                $data->uploaded_by = 2;                               
                if($data->update())
                {
                    Options::where('question_id',$id)->delete();                    
                    if(!empty($options))
                    {
                        foreach($options as $key=>$value)
                        {
                            $option = new Options();
                            $option->title = $value;
                            $option->question_id = $id;               
                            $option->status = 1;
                            $option->save();
                        }
                    }
                    return response()->json([
                        'message' => 'Record updated successfully',
                        'status' => 200
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
   
    public function destroy($id = null)
    {
      
       DB::table('questions')->where('id',$id)->delete();
       return response()->json([
            'message' => 'Record deleted successfully',
            'status' => 200
        ],200);
    }
}
