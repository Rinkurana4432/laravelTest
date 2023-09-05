<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use HasFactory;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	 public function index(){
		 $users = DB::table('users')->where('user_type', 0)->get();
		 return view('admin/users', ['users'=>$users]);
    }
	
	public function add(){
		return view('admin/adduser');
	}
	
	public function saveuser(Request $request){
		
		
		$validatedData = $request->validate([
            'name' => 'required',
			'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
			// 'password' => [
            // 'required',
            // 'string',
            // 'min:10',             // must be at least 10 characters in length
            //'regex:/[a-z]/',      // must contain at least one lowercase letter
           // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
            //'regex:/[0-9]/',      // must contain at least one digit
           // 'regex:/[@$!%*#?&]/', // must contain a special character
        // ],
		//'picture' => 'required|max:10000|mimes:doc,docx,csv'
		
		'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
		if($request->hasFile('picture')) {
			$img_ext = $request->file('picture')->getClientOriginalExtension();
			$filename = 'user-picture-' . time() . '.' . $img_ext;
			$path = $request->file('picture')->move(public_path().'/uploads/', $filename);//image save public folder
		  }
		DB::table('users')->insert(
			 array(
					'name'  	 =>   $request->name,
					'email'   	 =>   $request->email,
					'password'   =>   Hash::make($request->password),
					'picture'   =>   $filename,
			 )
		);
		
		Session::flash('message', "User added Successfully");
		return redirect('users');		
	}
	
	public function edit($id){
		$user = User::find($id);
		return view('admin/edit', compact('user'));
	}
	
	public function upateuser(Request $request, $id){
		
		$user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
       
		if($request->hasFile('picture')) {
			$img_ext = $request->file('picture')->getClientOriginalExtension();
			$filename = 'user-picture-' . time() . '.' . $img_ext;
			$path = $request->file('picture')->move(public_path().'/uploads/', $filename);//image save public folder
			 $user->picture = $filename;
		  }
       
        $user->update();
        //return redirect()->back()->with('status','Student Updated Successfully');
		return redirect('users')->with('status','Student Updated Successfully');;		
		
	}
	
	
	
	
}
