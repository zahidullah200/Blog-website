<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.users.index',compact('users'));
        
    }

    public function edit($id){
        $users=User::find($id);
        return view('admin.users.edit',compact('users'));
        
    }
    public function update(Request $request,$id){
        $users=User::find($id);
        if($users){
            $users->roll_as=$request->roll_as;
            $users->update();
            return redirect()->back()->with('message','User Updated Successfully');
        }
        else{
            return redirect()->back()->with('message','UserNot Found');
        }
     
        
    }
}
