<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index(){
        $setting=Setting::find(1);
        return view('admin.setting.index',compact('setting'));
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'website_name'=>'required|max:255',
            'logo'=>'nullable',
            'favicon'=>'nullable',
            'description'=>'nullable',
            'meta_title'=>'required|max:255',
            'meta_keyword'=>'nullable',
            'meta_descrition'=>'nullable'
        ]);
        if($validator->fails()){
            return redirect()->back()->with($validator);
        }

        $setting=Setting::where('id','1')->first();

        if($setting){
            //$setting=new Setting;
            $setting->website_name=$request->website_name;

            if($request->hasfile('logo')){
                $destination='uploads/settings/'.$setting->logo;
                if(File::exists($destination)){
                    File::delete($destination);
                }


                $file=$request->file('logo');
                $filename=time(). '.' .$file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->logo=$filename;
            }
           // $setting->favicon=$request->cavicon;

            if($request->hasfile('favicon')){

                $destination='uploads/settings/'.$setting->favicon;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file=$request->file('favicon');
                $filename=time(). '.' .$file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->favicon=$filename;
            }
            $setting->description=$request->description;
            $setting->meta_title=$request->meta_title;
            $setting->meta_keyword=$request->meta_keyword;
            $setting->meta_descrition=$request->meta_descrition;

            $setting->save();
            return redirect()->back()->with('message','Settings added...');

        }
        else{
            $setting=new Setting;
            $setting->website_name=$request->website_name;

            if($request->hasfile('logo')){
                $file=$request->file('logo');
                $filename=time(). '.' .$file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->logo=$filename;
            }
           // $setting->favicon=$request->cavicon;

            if($request->hasfile('favicon')){
                $file=$request->file('favicon');
                $filename=time(). '.' .$file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->favicon=$filename;
            }
            $setting->description=$request->description;
            $setting->meta_title=$request->meta_title;
            $setting->meta_keyword=$request->meta_keyword;
            $setting->meta_descrition=$request->meta_descrition;

            $setting->save();
            return redirect()->back()->with('message','Settings added...');

        }
    }

}
