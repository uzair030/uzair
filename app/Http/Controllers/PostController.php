<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Session;

class PostController extends Controller
{
    public function index(){
        $posts =Post::all();
        return view('post.index',compact('posts'));
    }

    public function create(){
        return view('post.create');
    }

//     public function store(Request $request)
// {
//     // Validate the request data
//     $validatedData = $request->validate([
//         'title' => 'required|string|min:5|max:10',
//         'slug' => 'required|string|min:10|max:20',
//         'content' => 'required|string|min:10|max:20',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         'category_id' => 'required|exists:categories,id'
//     ]);

//     // Create a new Post instance
//     $post = new Post;
//     $post->title = $validatedData['title'];
//     $post->slug = $validatedData['slug'];
//     $post->content = $validatedData['content'];
//     $post->category_id = $validatedData['category_id'];

//     // Handle image upload
//     if ($request->hasFile('image')) {
//         $file = $request->file('image');
//         $image = \Str::uuid() . "." . $file->extension();
//         $post->image = 'save/' . $image;
//         // Store the image
//         $file->storeAs('save', $image, 'public');
//     }

//     // Save the post
//     $saved = $post->save();

//     if ($saved) {
//         Session::flash('success', 'Record has been added successfully!');
//     } else {
//         Session::flash('error', 'Something went wrong!');
//     }

//     return redirect()->route('post.index');
// }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'slug' =>'required',
            'content' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' =>'required'
        ]); 

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            // dd($file);
            $image = \Str::uuid().".". $file->extension();
            $post->image = 'save/'. $image;
            $file->storeAs('save',$image,'public');
        }

        
        $saved =$post->save();
        // return redirect()->route('post.index');
        if($saved){
            Session::flash('success','Record has been Added Successfully!');
        }
        else {
            Session::flash('error','Something went wrong!');
        }
        return redirect()->route('post.index');
    
    }


        public function update(Request $request,$id){
            $post = Post::find($id);
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->category_id = $request->category_id;
            if($request->hasFile('image')){
                $file = $request->file('image');
    
    
                $image = \Str::uuid().".". $file->extension();
                $post->image = 'save/'. $image;
                $file->storeAs('save',$image,'public');
            }       

             $saved = $post->save();
            // return redirect()->route('post.index');
        
    
      if($saved){

           Session::flash('success','Record has been updated');

      }
      else {
          Session::flash('error','Something went wrong!');
      }
          return redirect()->route('post.index');

        }      



        public function edit(Request $request,$id){
            $post =Post::find($id);
            return view('post.edit',compact('post'));
        }


        public function delete($id){
            $post = Post::find($id);
            // dd($post);
            $delete=$post->delete();
            if ($delete){
                Session::flash('success','Record has been deleted successfully');
                return redirect()->route('post.index');
              }
              Session::flash('error','Something Went Wrong');
              return redirect()->route('post.index');
              }

    

            }

    

        