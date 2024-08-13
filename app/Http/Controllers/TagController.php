<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Session;

class TagController extends Controller
{
    public function index(){
        $tags =Tag::all();
        return view('tag.index',compact('tags'));
    }

    public function create(){
        return view('tag.create');
    }

    public function store(Request $request){
        $request->validate([
            'tag'=>'required|min:5|max:20'
        ]);
        $tag=Tag::create([
            'tag' =>$request->tag
        ]);
        if($tag){
            Session::flash('success','Record has been Added Successfully!');
        }
        else {
            Session::flash('error','Something went wrong!');
        }
        return redirect()->route('tag.index');
    }

    public function edit(Request $request ,$id){
        $tag =Tag::find($id);

        // dd($tag);
        return view('tag.edit',compact('tag'));
    }

    public function delete($id){
        $tag = Tag::find($id);
        $delete=$tag->delete();
        if ($delete){
            Session::flash('success','Record has been deleted successfully');
            return redirect()->route('tag.index');
          }
          Session::flash('error','Something Went Wrong');
          return redirect()->route('tag.index');
          }

          public function update(Request $request, $id){
            $tag = Tag::find($id);
            $tag->update([
              'tag' => $request->tag
            ]);
            // $pet->title = $request->title;
            // $pet->Company_name = $request->Company_name;
            // $pet->Company_address = $request->Company_address;
            // $saved = $pet->save();
            // dd($tag);
      if($tag){

           Session::flash('success','Record has been updated');

      }
      else {
          Session::flash('error','Something went wrong!');
      }
          return redirect()->route('tag.index');
    }
    }
    

