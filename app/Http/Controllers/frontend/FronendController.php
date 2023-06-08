<?php

namespace App\Http\Controllers\frontend;
use App\Models\Post;
use App\Models\Setting;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FronendController extends Controller
{
    public function index(){
        $setting=Setting::find(1);
        $all_categories=Category::where('status','0')->get();
        $latest_post=Post::where('status','0')->orderBy('created_at','DESC')->get()->take(15);
        return view('frontend.index',compact('all_categories','latest_post','setting'));
    }

    public function viewCategoryPost($category_slug){
        $category=Category::where('slug',$category_slug)->where('status','0')->first();
        if($category){
            $post=Post::where('category_id',$category->id)->where('status','0')->paginate(10);
            //if not comming pagination go to app\providers\AppServiceProvide and add  Paginator::useBootstrap();
            return view('frontend.post.index',compact('post','category'));
            
        }
        else{
            return redirect('/');

        }
       

    }
    public function viewpost(string $category_slug, string $post_slug){
        $category=Category::where('slug',$category_slug)->where('status','0')->first();
        if($category){
            $post=Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','0')->first();
            $latest_post=Post::where('category_id',$category->id)->where('status','0')->orderBy('created_by','DESC')->get()->take(10);
            //if not comming pagination go to app\providers\AppServiceProvide and add  Paginator::useBootstrap();
            return view('frontend.post.view',compact('post','latest_post'));
            
        }
        else{
            return redirect('/');

        }

    }
}
