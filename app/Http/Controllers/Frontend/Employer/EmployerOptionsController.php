<?php

namespace App\Http\Controllers\frontend\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Questions;
use App\Models\Options;

class EmployerOptionsController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Options::query();
        if(!empty($search))
        {            
            $query->where('title', 'LIKE', "%$search%");
        }
        $data = $query->with('Questions')->whereHas('questions', function($q) {
            $q->where('uploaded_by', '=', 2);
        })->orderBy('id','DESC')->paginate(10);
        return $data;
    }

    public function getQuestionCategory()
    {
        return DB::table('questions')->where('status',1)->where('uploaded_by',2)->get();
    }

    public function store(Request $request)
    {
       
        $request->validate( 
        [
            'title' => 'required',
            'status' => 'required',
            'question_id' => 'required',
            ],
            [
                'title.required' => 'Question  is required!',
                'status.required' => 'Status is required!',
                'question_id.required' => 'Please select question!',
               
            ]
        );
        $input = $request->all();
        $question = new Options();  
        $question->title = $request->input('title');
        $question->question_id = $request->input('question_id');	
        
        $question->status = $request->input('status');
        $question->save();
        return response()->json([
            'message' => 'Record added successfully',
            'status' => 200
        ],200);

    }   
   
    public function edit($id)
    {
       return $data = Options::where('id',$id)->first();
    }
    
    public function update(Request $request,$id = null)
    {   
        $data = Options::where('id',$id)->first();
        if(!empty($data))
        {
            $request->validate( 
                [
                    'title' => 'required|string|max:255',
                    'status' => 'required',
                    'question_id' => 'required',
                    ],
                    [
                        'title.required' => 'Question is required!',
                        'status.required' => 'Status is required!',
                        'question_id.required' => 'Please select question!',
                    ]
                );
                $data->title = $request->input('title');
                $data->question_id = $request->input('question_id');
                $data->status = $request->input('status');
                $data->update();
                return response()->json([
                    'message' => 'Record updated successfully',
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

   
    public function destroy($id = null)
    {
      
       DB::table('options')->where('id',$id)->delete();
       return response()->json([
            'message' => 'Record deleted successfully',
            'status' => 200
        ],200);
    }
}
