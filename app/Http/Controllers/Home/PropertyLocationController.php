<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyLocation;
use Carbon\Carbon;

class PropertyLocationController extends Controller
{
    public function AllPropLocation(){

        $proplocation = PropertyLocation::first()->paginate(9);
        return view('admin.prop_location.prop_location_all',compact('proplocation'));

    } // End Method

    public function AddPropLocation(){
        return view('admin.prop_location.prop_location_add');
    } // End Method

    public function StorePropLocation(Request $request){

         $request->validate([
            'prop_location' => 'required' 

        ],[
            'prop_location.required' => 'Property Location Name is Required',

        ]);
            PropertyLocation::insert([
                'name' => $request->prop_location,
                'created_at' => Carbon::now(),               

            ]); 
            $notification = array(
            'message' => 'Propperty Location Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.prop.location')->with($notification);

    } // End Method

    public function EditPropLocation($id){

        $proplocation = PropertyLocation::findOrFail($id);
        return view('admin.prop_location.prop_location_edit',compact('proplocation'));

    } // End Method

    public function UpdatePropLocation(Request $request,$id){

         PropertyLocation::findOrFail($id)->update([
                'name' => $request->prop_location,     
                'updated_at' => Carbon::now(),  

            ]); 

            $notification = array(
            'message' => 'Property Location Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.prop.location')->with($notification);

    } // End Method

    public function DeletePropLocation($id){

        PropertyLocation::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Property Location Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);       

    } // End Method
}