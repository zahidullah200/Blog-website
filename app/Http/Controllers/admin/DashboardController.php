<?php

namespace App\Http\Controllers\admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $catagories=Category::count();
        $posts=Post::count();
        $users=User::where('roll_as','0')->count();
        $admins=User::where('roll_as','1')->count();
        return view('admin.dashboard',compact('catagories','posts','users','admins'));
    }
}
