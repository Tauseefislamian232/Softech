<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{

    public function home_view()
    {
        if(Auth::id()){

            $id = Auth::id();
            $data =User::find($id);
            if(Auth::User()->user_type =='1'){

                return view('admin.master',compact('data'));
            }
            if(Auth::User()->user_type =='0'){

                return view('front-end.home');
            }
        }
        return view('front-end.home');
    }
    public function create_login()
    {
        return view('auth.login');
    }



    public function check_login(Request $request)
    {
        return view('admin.master');

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }




    public function create_register()
    {
        return view('auth.registration');
    }


    public function store_register(Request $request)
    {
        $request->validate([

            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required|min:5',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

        $data = $request->all();

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/users/', $filename);
            $data['image'] = "$filename";
            // dd('image inserted');
        }
        //  dd($data);
        $check = $this->createUser($data);
        return redirect("dashboard")->withSuccess('Successfully logged-in!');
    }


    public function createUser(array $data)
    {

      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'address' => $data['address'],
        'password' => Hash::make($data['password']),
        'confirm_password' => $data['confirm_password'],
        'image' => $data['image'],
        'user_type' => '0',
      ]);
    }


    public function dashboardView()
    {
        if(Auth::id()){

            $id = Auth::id();
            // dd($id);

            // dd($user);
            if(Auth::User()->user_type =='1'){
                $data = User::find($id);
                //return view('dashboard');
                return view('admin.master',compact('data'));
            }
            if(Auth::User()->user_type =='0'){

                return view('front-end.home');
            }
        }
        else{
            return redirect("login")->withSuccess('Access is not permitted');
        }
    }


    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

    public function front_end(){

        return view('front-end.home');
    }
} //custom-auth controller
