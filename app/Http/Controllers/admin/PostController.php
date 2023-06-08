<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PostFormRequest;
class PostController extends Controller

{
    public function index(){
        $posts=Post::all();

        return view('admin.posts.index',compact('posts'));
    }

    public function create(){
        $category=Category::where('status','0')->get();
        return view('admin.posts.add-post',compact('category'));
    }


    public function store(PostFormRequest $request){
        //CategoryFormRequest is used to validat all the data
        $data=$request->validated();
        $post=new Post;
        $post->category_id=$data['category_id'];
        $post->name=$data['name'];
        $post->slug=Str::slug($data['slug']);
        $post->description=$data['description'];
        $post->yt_iframe=$data['y_iframe'];
        $post->meta_title=$data['meta_title'];
        $post->meta_description=$data['meta_description'];
        $post->meta_keyword=$data['meta_keyword'];
        $post->status=$request->status==true?'1':'0';
        $post->created_by=Auth::user()->id;

        $post->save();
        return redirect()->back()->with('message','Post Added Successfully');
    }


    public function delete($id){
        $post=Post::find($id);
        if($post){
          
            $post->delete();
            return redirect('admin/posts')->with('message','Post Deleted Successfully');
        }
        else{
            return redirect('admin/posts')->with('message','Post ID not found');
        }

    }


    public function edit($id){
        $category=Category::where('status','0')->get();
        $post=Post::find($id);
        return view('admin.posts.edit',compact('post','category'));
    }

    public function update(PostFormRequest $request,$id){
        //CategoryFormRequest is used to validat all the data
        $data=$request->validated();
        $post=Post::find($id);
        $post->category_id=$data['category_id'];
        $post->name=$data['name'];
        $post->slug=Str::slug($data['slug']);
        $post->description=$data['description'];
        $post->yt_iframe=$data['y_iframe'];
        $post->meta_title=$data['meta_title'];
        $post->meta_description=$data['meta_description'];
        $post->meta_keyword=$data['meta_keyword'];
        $post->status=$request->status==true?'1':'0';
        $post->created_by=Auth::user()->id;

        $post->update();
        return redirect()->back()->with('message','Post Updatted Successfully');
    }


}


