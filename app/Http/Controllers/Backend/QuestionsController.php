<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Questions;
use App\Models\Options;
class QuestionsController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');  
        $query = Questions::query();
        if(!empty($search))
        {            
            $query->where('title', 'LIKE', "%$search%");
        }
        if(isset($startDate) && $startDate != 'null')
        {
            $startdate1 = date('Y-m-d',strtotime($startDate));            
            $startdate1 = date('Y-m-d',strtotime($startDate));
            if(isset($endDate) && $endDate != 'null')
            {              
                $query->where('created_at','>=',$startdate1);
            }
            else
            {
                $query->where('created_at','>=',$startdate1.' 00:00:00');
                $query->where('created_at','<=',$startdate1.' 23:59:59');
            }   
        }
        if(isset($endDate) && $endDate != 'null')
        {          
            $enddate1 = date('Y-m-d',strtotime($endDate));
            $query->where('created_at','<=',$enddate1);
        }   
        return $query->where('uploaded_by',1)->orderBy('id','DESC')->paginate(10);
        
    }

    public function store(Request $request)
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
        if($request->input('is_recommended') == 1)
        {
            $dataCatC = DB::table('questions')->where('is_recommended',1)->where('uploaded_by',1)->get();
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
        $question->uploaded_by = 1;
        $question->employer_id = 0;	
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
        $data = Questions::where('id',$id)->first();
        if($request->input('is_recommended') == 1 && $data->is_recommended == 0)
        {
            $dataCatC = DB::table('questions')->where('is_recommended',1)->where('uploaded_by',1)->get();
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
                $data->uploaded_by = 1;
                $data->employer_id = 0;              
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
