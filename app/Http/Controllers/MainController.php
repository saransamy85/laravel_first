<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function save(Request $request)
    {
        $request->validate([
            "uname"=>"required",
            // "eemail"=>"required|email|unique:admins",
            "eemail"=>"required|email",
            "pwd"=>"required|min:5|max:12"
        ]);

        //insert the data
        $admin=new Admin;
        $admin->name=$request->uname;
        $admin->email=$request->eemail;
        $admin->password=Hash::make($request->pwd);
        $save=$admin->save();

        if($save)
        {
            return back()->with('success','New user has been successfully added to database');

        }else
        {
            return back()->with('fail','Something went wrong try again!!');
        }
    }

    public function check(Request $request)
    {
        $request->validate([
            "uname"=>"required|email",
            "pwd"=>"required|min:5|max:12"
        ]);

        $userinfo=Admin::where('email','=',$request->uname)->first();

        if(!$userinfo)
        {
            return back()->with('fail','We are unable to recognize your mail');
        }
        else
        {
            //password check
            if(Hash::check($request->pwd,$userinfo->password))
            {
                $request->Session()->put('LoggedUser',$userinfo->id);
                return redirect('admin');//denote urlpath
            }
            else{
                return back()->with('fail','Invalid password');
            }
        }
    }

    public function dashboard()
    {
        $data=['Lui'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dashboard',$data);
    }
}