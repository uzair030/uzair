<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::all();
        return view('category.index',compact('category'));
    }

    
    public function create()
    {
        return view('category.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5|max:20'
        ]);
        $category=Category::create([
            'name' =>$request->name
            
        ]);
        if($category){
            Session::flash('success','Record has been Added Successfully!');
        }
        else {
            Session::flash('error','Something went wrong!');
        }
        return redirect()->route('category.index');
    }
    

    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    
   
     public function delete($id){
        $category = Category::find($id);
        $delete=$category->delete();
        if ($delete){
            Session::flash('success','Record has been deleted successfully');
            return redirect()->route('category.index');
          }
          Session::flash('error','Something Went Wrong');
          return redirect()->route('category.index');
          }


          public function update(Request $request, $id){
            $category = Category::find($id);
            // dd($id);
            $category->update([
              'name' => $request->name
            ]);
            // $pet->title = $request->title;
            // $pet->Company_name = $request->Company_name;
            // $pet->Company_address = $request->Company_address;
            // $saved = $pet->save();
            // dd($tag);
      if($category){

           Session::flash('success','Record has been updated');

      }
      else {
          Session::flash('error','Something went wrong!');
      }
          return redirect()->route('category.index');
    }
}