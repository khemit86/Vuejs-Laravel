<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');  
        $query = Category::query();
        if(!empty($search))
        {            
            $query->where('name', 'LIKE', "%$search%");
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
        return $query->orderBy('id','DESC')->paginate(10);
        
    }

    public function getParentCategory()
    {
        return DB::table('categories')->where('parent_id',0)->get();
    }

    public function store(Request $request)
    {
        $request->validate( 
        [
            'category_name' => 'required|string|max:255',
            //'status' => 'required',
            ],
            [
                'category_name.required' => 'Category name is required!',
                'status.required' => 'Status is required!',
            ]
        );
        $category = new Category();
    	$category->name= $request->input('category_name');
        if(!empty($request->input('category_parent')))
        {
            $dataCat = DB::table('categories')->where('id',$request->category_parent)->first();
            if(!empty($dataCat))
            {
                $category->parent_category_name = $dataCat->name;
            }
            $category->parent_id = $request->category_parent;
        }
        else
        {
            $category->parent_id=0;
        }	
        $category->keywords=$request->keywords;   
    	$category->status= 1;	
        $category->save();
        return response()->json([
            'message' => 'Record added successfully',
            'status' => 200
        ],200);

    }   
   
    public function edit($id)
    {
       return $data = Category::where('id',$id)->first();
    }
    
    public function update(Request $request,$id = null)
    {   
        $data = Category::where('id',$id)->first();
        if(!empty($data))
        {
            $request->validate( 
                [
                    'category_name' => 'required|string|max:255',
                    'status' => 'required',
                    ],
                    [
                        'category_name.required' => 'Category name is required!',
                        'status.required' => 'Status is required!',
                    ]
                );
                $data->name = $request->input('category_name');
                $data->status=$request->input('status');
                $data->keywords=$request->input('keywords');
    
                if(!empty($request->input('category_parent')))
                {
                   
                    $dataCat = DB::table('categories')->where('id',$request->input('category_parent'))->first();
                    if(!empty($dataCat))
                    {
                        $data->parent_category_name = $dataCat->name;
                    }
                    $data->parent_id= $request->input('category_parent');
                }
                else
                {
                    $data->parent_id = 0;
                }
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
      
       DB::table('categories')->where('id',$id)->delete();
       return response()->json([
            'message' => 'Record deleted successfully',
            'status' => 200
        ],200);
    }
}
