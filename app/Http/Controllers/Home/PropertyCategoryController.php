<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use Carbon\Carbon;


class PropertyCategoryController extends Controller
{
    public function AllPropCategory(){

        $propcategory = PropertyCategory::latest()->get();
        return view('admin.prop_category.prop_category_all',compact('propcategory'));

    } // End Method

    public function AddPropCategory(){
        return view('admin.prop_category.prop_category_add');
    } // End Method

    public function StorePropCategory(Request $request){

         $request->validate([
            'prop_category' => 'required' 

        ],[
            'prop_category.required' => 'Property Cateogry Name is Required',

        ]);
            PropertyCategory::insert([
                'name' => $request->prop_category,
                'created_at' => Carbon::now(),               

            ]); 
            $notification = array(
            'message' => 'Propperty Category Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.prop.category')->with($notification);

    } // End Method

    public function EditPropCategory($id){

        $propcategory = PropertyCategory::findOrFail($id);
        return view('admin.prop_category.prop_category_edit',compact('propcategory'));

    } // End Method

    public function UpdatePropCategory(Request $request,$id){

         PropertyCategory::findOrFail($id)->update([
                'name' => $request->prop_category,     
                'updated_at' => Carbon::now(),  

            ]); 

            $notification = array(
            'message' => 'Property Category Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.prop.category')->with($notification);

    } // End Method

    public function DeletePropCategory($id){

        PropertyCategory::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Property Category Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);       

    } // End Method
}