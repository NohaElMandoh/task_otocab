<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin\login');
    }
    public function checkLogin(Request $request)
    {

        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            flash('Message')->error($validator->errors());
            // return responseJson(0,$validator->errors()->first(),$validator->errors());
            return redirect()->back();
        }
        $admin = Admin::where('name', $request->name)->first();
        $credentials = $request->only(['name', 'password']);
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                if (Auth::guard('admin')->attempt($credentials))
                    return redirect()->intended(route('admin.users'));
            } else {
                flash('Message')->error('please ensure your name and password');
                // return redirect('/admin');
                return redirect()->back();
            }
        } else {
            flash('Message')->error('please ensure your name and password');
            return redirect('/admin');
        }
    }
    public function users()
    {

        $users = User::all();
        return view('Users.index', compact('users'));
    }
    public function updateUserStatus(Request $request)
    {

        $user = User::where('id', $request->user_id)->first();
        if ($user->status == 1)
        User::where('id', $request->user_id)->update(['status' => 0]);
        else
        User::where('id', $request->user_id)->update(['status' => 1]);

        return response()->json(['success' => true, 'message' => 'Done']);

      
    }
    public function updateActivity(Request $request)
    {

        $user = User::where('id', $request->user_id)->first();
        if ($user->activity == 1)
        User::where('id', $request->user_id)->update(['activity' => 0]);
        else
        User::where('id', $request->user_id)->update(['activity' => 1]);

        return response()->json(['success' => true, 'message' => 'Done']);

      
    }
    public function profile(Request $request){
return view('Users.profile');
    }
    public function updateProfile(Request $request){
        return view('Users.profile');
            }
    
}
