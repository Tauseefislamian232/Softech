<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Device;

class DeviceController extends Controller
{

  public function add(Request $request){

    $device = new Device;
    $device->title = $request->title;
    $device->brand = $request->brand;
    $device->price = $request->price;
    $device->quantity = $request->quantity;
    $device->description = $request->description;
    $device->image = $request->image;
    $result = $device->save();

    if($result){

      return ["Result"=> "Data has been saved!"];
    }
    else{

      return ["Result"=> "Insertion Failed"];

    }

  } //add function closed here

    public function show($id=null){

      $record = $id?Device::find($id):Device::all();

      return response()->json(
          [

          'data'=> [

              "status" => true,
              "message" => "Data Retrieved Successsfully",
               "data" => $record
              // "data" => $request->all()
              ]
          ],
          200
      );

    } //show function closed here

    public function update(Request $request){

        $device = Device::find($request->id);
        $device->title = $request->title;
        $device->brand = $request->brand;
        $device->price = $request->price;
        $device->quantity = $request->quantity;
        $device->description = $request->description;
        $result =$device->save();

        if($result){

          return ["Result"=> "Data Updated Successfully!"];
        }
        else{

          return ["Result"=> "Data Updation Failed"];

        }

    } //api-update function closed here

    public function delete($id){

      $device = Device::find($id);
      $result = $device->delete();

      if($result){

        return ["Result"=> "Data Deleted Successfully!".$id];
      }
      else{

        return ["Result"=> "Data Deletion Failed"];

      }


    } //API-delete function closed here

    public function search($title){

      return Device::where("title","like","%".$title."%")->get();
      // return Device::where("title",$title)->get();
    }

    public function upload(Request $request){

        $result =$request->file('file')->store('uploaded_files');
        return ["Result"=>$result];
    }

} //API-DeviceController class closed here
