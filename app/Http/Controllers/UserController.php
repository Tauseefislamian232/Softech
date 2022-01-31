<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        $id = Auth::id();
        $data = User::find($id);
        return view('admin.user.create',compact('data'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([

            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'

        ]);
        // dd(2);
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $password = $request->input('password');
        $hashed = Hash::make($password);
        $user->password =$hashed;
        $user->confirm_password=$request->input("confirm_password");
        // dd($request->input());

        if($request->hasfile('image'))
        {
            // dd(2);
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/users/', $filename);
            $user->image = $filename;
            // dd('image inserted');
        }
        else{
            // dd('no image found!');
            return redirect()->back()->with('status','No Image found!');
        }

        $data = $user->save();
        // dd($data);
        return redirect('show-user')->with('status','User Added Successfully');
}

    public function fetch()
    {
        $id = Auth::id();
        $data = User::find($id);

         $user = User::paginate(3);
        // dd($user);
        return view('admin.user.fetch', compact('user','data'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data = User::find($id);
        return view('admin.user.edit', compact('user','data'));
    }

    public function update(Request $request, $id)
    {
        // dd(2);
        $user = User::find($id);
        $validated = $request->validate([

            'name' => 'min:3|max:50',
            'email' => 'email',
            'phone' => 'min:10',
            'address' => 'min:5',
            'image'   =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'min:6',


        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $password = $request->input('password');
        $hashed = Hash::make($password);
        $user->password =$hashed;
        $user->confirm_password=$request->input("confirm_password");

        // dd($request->input());
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/users/', $filename);
            $user->image = $filename;
        }
        else{
            unset($request->image);
        }
        // dd($request->input());
        $user->update();
        return redirect('show-user')->with('status','User Updated Successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('status','Student Deleted Successfully');
    }

    public function search(Request $request){

        $id = Auth::id();
        $data = User::find($id);

        $search = $request->search;
        // dd($search);

        $user = DB::table('users')->where('name','Like','%'.$search.'%')
                        ->orWhere('email','Like','%'.$search.'%')
                        ->orWhere('phone','Like','%'.$search.'%')
                        ->orWhere('user_type','Like','%'.$search.'%')
                        ->paginate('3');

        return view('admin.user.fetch',compact('user','data'));

    } //user-search-bar

	/**
	 */
	function __construct() {
	}
}
