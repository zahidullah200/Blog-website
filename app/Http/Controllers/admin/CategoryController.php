<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){
        //CategoryFormRequest is used to validat all the data
        $data=$request->validated();
        $category=new Category;
        $category->name=$data['name'];
        $category->slug=Str::slug($data['slug']);
        $category->description=$data['description'];
     
        if($request->hasfile('image')){
            $file=$request->file('image');
            $filename=time(). '.' .$file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image=$filename;
        }
        $category->meta_title=$data['meta_title'];
        $category->meta_description=$data['meta_description'];
        $category->meta_keyword=$data['meta_keyword'];
        $category->navbar_status=$request->navbar_status==true?'1':'0';
        $category->status=$request->status==true?'1':'0';
        $category->created_by=Auth::user()->id;

        $category->save();
        return redirect()->back()->with('message','Category Save Successfully');
    }


    public function edit($category_id){
        $category=Category::find($category_id);
        return view('admin.category.edit',compact('category'));
    }




    public function update(CategoryFormRequest $request, $category_id){
        //CategoryFormRequest is used to validat all the data
        $data=$request->validated();
        $category=Category::find($category_id);
        //$category=new Category;
        $category->name=$data['name'];
        $category->slug=Str::slug($data['slug']);
        $category->description=$data['description'];
     
        if($request->hasfile('image')){
            $destination='uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('image');
            $filename=time(). '.' .$file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image=$filename;
        }
        $category->meta_title=$data['meta_title'];
        $category->meta_description=$data['meta_description'];
        $category->meta_keyword=$data['meta_keyword'];
        $category->navbar_status=$request->navbar_status==true?'1':'0';
        $category->status=$request->status==true?'1':'0';
        $category->created_by=Auth::user()->id;

        $category->update();
        return redirect()->back()->with('message','Category Updated Successfully');
    }


    
    public function delete(Request $request){
        $category=Category::find($request->delete_category_id);
        if($category){
            $destination='uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            //here posts is a built in function which is available in category model
            $category->posts()->delete();
            $category->delete();

            return redirect('admin/category')->with('message','Category Deleted with its posts Successfully');
        }
        else{
            return redirect('admin/category')->with('message','Category ID not found');
        }
       
    }

}
