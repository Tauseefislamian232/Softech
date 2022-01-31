<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $data = User::find($id);
        return view('admin.employee.create',compact('data'));
    }
    public function search(){

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:5|max:100',
            'address' => 'required|min:5|max:200',
            'password' => 'required',
        ]);

        if($validator->fails()){

            return response()->json([

                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $emp = new Employee;
            $emp->name =  $request->input('name');
            $emp->email = $request->input('email');
            $emp->phone = $request->input('phone');
            $emp->address = $request->input('address');
            $emp->password = $request->input('password');
            $emp->image = $request->input('image');
            $emp->save();
            return response()->json([
                'status' => 200,
                'message' => 'Employee added Successfully!',
            ]);
        }

    } //store-employee function closed here

    public function fetch(){

        $employees = Employee::all();
        return response()->json([
            'employees'=> $employees,
        ]);
    } // fetch-employee function closed here

    public function edit($id){

        $employees = Employee::find($id);

        if($employees){

            return response()->json([
                'status'=> 200,
                'employees'=> $employees,
            ]);
        }
        else{

            return response()->json([
                'status'=> 404,
                'employees'=> 'Record Not Found!',
            ]);
        }
    } // edit function closed here

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:5|max:100',
            'address' => 'required|min:5|max:200',
            'password' => 'required',
        ]);

        if($validator->fails()){

            return response()->json([

                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } //validator-fails
        else{

            $employees = Employee::find($id);

            if($employees){

                $employees->name =  $request->input('name');
                $employees->email = $request->input('email');
                $employees->phone = $request->input('phone');
                $employees->address = $request->input('address');
                $employees->password = $request->input('password');
                $employees->image = $request->input('image');
                $employees->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Updated Successfully!',
                ]);
            } //if response closed
            else{

                return response()->json([
                    'status'=> 404,
                    'message'=> 'Record Not Found!',
                ]);
            } //else response closed



        } //else-validator passed

    }   //update function closed here


    public function destroy($id){

        $employees = Employee::find($id);
        $employees->delete();
        dd($employees);
        return response()->json([
            'status'=>200,
            'message'=>'Record deleted Successfully!',
        ]);
    }

}
