<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyAdress;
use App\Models\PropertyCategory;
use App\Models\User;
use App\Models\PropertyLocation;
use App\Models\PropertyImages;
use App\Models\PropertyOwner;
use App\Models\PropertyTitle;
use App\Models\PropertyContract;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{


    // Frontend Page ----------------------------
    public function HomePropSell()
    {
        $props = Property::where('is_sell', '1')
            ->where('is_active', '1')
            ->latest()->paginate(12);
        return view('frontend.property.prop_sell_page', compact('props'));
    } //End Method


    public function HomePropRent()
    {
        $props = Property::where('is_rent', '1')
            ->where('is_active', '1')
            ->latest()->paginate(12);
        return view('frontend.property.prop_rent_page', compact('props'));
    } //End Method


    public function HomePropList()
    {
        $props = Property::where('is_active', '1')->latest()->paginate(12);
        return view('frontend.property.prop_view_list_page', compact('props'));
    } //End Method


    public function HomePropAll()
    {
        $props = Property::where('is_active', '1')->latest()->paginate(12);
        return view('frontend.property.properties_page', compact('props'));
    } //End Method


    public function PropDetails($id)
    {

        $infos = Property::findOrFail($id);
        $multiImage = PropertyImages::where('property_id', $id)->get();
        $neightbors = Property::where('location_id', $infos->location_id)
            ->where('is_active', '1')
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(3)
            ->get();;

        return view('frontend.property.prop_details', compact('infos', 'multiImage', 'neightbors'));
    } // End Method 





    public function PropertySearch(Request $request)
    {

        if ($request->location_id) {
            $purpose_word = "";

            if ($request->purpose_id == 1) {
                $purpose_word = "ขาย";

                $props = Property::where('is_sell', '1')->where('is_active', 1)->latest()->get();
                if ($props->count() > 0) {
                    $props = Property::where('category_id', $request->category_id)
                        ->where('is_sell', 1)->where('is_active', 1)->latest()->get();
                    if ($props->count() > 0) {
                        $props = Property::where('category_id', $request->category_id)
                            ->where('is_sell', 1)->where('location_id', $request->location_id)->latest()->paginate(12);
                        if ($props->count() > 0) {
                            $props->appends(array('location_id' => $request->location_id, 'purpose_id' => $request->purpose_id, 'category_id' => $request->category_id));
                            return view('frontend.property.prop_search', compact('props', 'purpose_word'));
                        } else {
                            $notification = array(
                                'message' => 'No Property Found!!',
                                'alert-type' => 'warning'
                            );
                            return redirect()->route('home')->with($notification);
                        }
                    } else {
                        $notification = array(
                            'message' => 'No Property Found!!',
                            'alert-type' => 'warning'
                        );
                        return redirect()->route('home')->with($notification);
                    }
                } else {
                    $notification = array(
                        'message' => 'No Property Found!!',
                        'alert-type' => 'warning'
                    );
                    return redirect()->route('home')->with($notification);
                }
            } else {
                $purpose_word = "ให้เช่า";
                $props = Property::where('is_rent', '1')->where('is_active', 1)->latest()->get();
                if ($props->count() > 0) {
                    $props = Property::where('category_id', $request->category_id)
                        ->where('is_rent', 1)->where('is_active', 1)->latest()->get();
                    if ($props->count() > 0) {
                        $props = Property::where('category_id', $request->category_id)
                            ->where('is_rent', 1)->where('location_id', $request->location_id)->latest()->paginate(12);
                        if ($props->count() > 0) {
                            $props->appends(array('location_id' => $request->location_id, 'purpose_id' => $request->purpose_id, 'category_id' => $request->category_id));
                            return view('frontend.property.prop_search', compact('props', 'purpose_word'));
                        } else {
                            $notification = array(
                                'message' => 'No Property Found!!',
                                'alert-type' => 'warning'
                            );
                            return redirect()->route('home')->with($notification);
                        }
                    } else {
                        $notification = array(
                            'message' => 'No Property Found!!',
                            'alert-type' => 'warning'
                        );
                        return redirect()->route('home')->with($notification);
                    }
                } else {
                    $notification = array(
                        'message' => 'No Property Found!!',
                        'alert-type' => 'warning'
                    );
                    return redirect()->route('home')->with($notification);
                }
            }
        } else
            return redirect()->route('home');
    }

    public function PropCategory($id)
    {
        if (Property::where('category_id', $id)->latest()->exists()) {
            $props = Property::where('category_id', $id)->latest()->paginate(12);
            return view('frontend.property.prop_cat', compact('props'));
        } else {
            $notification = array(
                'message' => 'No Property!!',
                'alert-type' => 'warning'
            );
            return redirect()->route('home')->with($notification);
        }
    }



    // End of Frontend Page -------



    public function AllProperty()
    {

        $props = Property::latest()->paginate(12);
        return view('admin.props.props_all', compact('props'));
    } //End Method

    public function AddProperty()
    {

        $agents = User::first()->get();
        $categories = PropertyCategory::first()->get();
        $locations = PropertyLocation::first()->get();

        return view('admin.props.props_add', compact('locations', 'agents', 'categories'));
    } //End Method






    public function StoreProperty(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required',
            'address' => 'required',
            'agent_id' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'description' => 'required',
            'cover_photo' => 'required',
            'multi_img' => 'required',
            'owner_name' => 'required|max:220',
            'owner_phone' => 'required|max:220',
        ]);


        $property_id = Property::insertGetId([

            'category_id' => $request->category_id,
            'is_sell' => $request->is_sell,
            'is_rent' => $request->is_rent,

            'selling_price' => $request->selling_price,
            'renting_price' => $request->renting_price,

            'bed' => $request->bed,
            'bath' => $request->bath,
            'land' => $request->land,
            'area' => $request->area,
            'built_year' => $request->built_year,

            'location_id' => $request->location_id,
            'agent_id' => $request->agent_id,
            'is_featured' => $request->is_featured,

            'is_active' => $request->is_active,
            'agent_id' => $request->agent_id,
            'is_featured' => $request->is_featured,

            'created_at' => now(),

        ]);

        $image = $request->file('cover_photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        // read image from file system
        $imgg = $manager->read($image);

        $imgg->scale(width: 730);

        $path = public_path('upload/properties/' . $property_id . '/cover' . '/');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $imgg->save('upload/properties/' . $property_id . '/cover' . '/' . $name_gen);
        $save_url = 'upload/properties/' . $property_id . '/cover' . '/' . $name_gen;

        Property::findOrFail($property_id)->update([
            'cover_photo' => $save_url,
        ]);

        // Multiple Images Upload
        $images = $request->file('multi_img');
        foreach ($images as $img) {

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            // create image manager with desired driver
            $manager7 = new ImageManager(new Driver());
            // read image from file system
            $imgg7 = $manager7->read($img);
            // resize image proportionally
            $imgg7->scale(width: 730);

            $path2 = public_path('upload/properties/' . $property_id . '/multi' . '/');

            if (!File::isDirectory($path2)) {
                File::makeDirectory($path2, 0777, true, true);
            }


            // save modified image in new format 
            $imgg7->save('upload/properties/' . $property_id . '/multi' . '/' . $make_name);
            $uploadPath = 'upload/properties/' . $property_id . '/multi' . '/' . $make_name;

            PropertyImages::insert([

                'property_id' => $property_id,
                'photo_name' => $uploadPath,
                'created_at' => now(),
            ]);
        }
        // Multiple Images Upload End


        // Property Title Insert
        PropertyTitle::insert([
            'property_id' => $property_id,
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => now(),
        ]);

        // Property Address Insert
        PropertyAdress::insert([
            'property_id' => $property_id,
            'address' => $request->address,
            'created_at' => now(),
        ]);

        // Property Owner Insert
        PropertyOwner::insert([
            'property_id' => $property_id,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Property Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.prop')->with($notification);
    } //End Method








    public function EditProperty($id)
    {
        $multiImg = PropertyImages::where('property_id', $id)->get();
        $agents = User::first()->get();
        $categories = PropertyCategory::first()->get();
        $locations = PropertyLocation::first()->get();
        $props = Property::findOrFail($id);
        return view('admin.props.props_edit', compact('agents', 'categories', 'locations', 'props', 'multiImg'));
    } //End Method

    public function UpdateProperty(Request $request)
    {


        $validateData = $request->validate([
            'title' => 'required',
            'address' => 'required',
            'agent_id' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'description' => 'required',
            'owner_name' => 'required|max:220',
            'owner_phone' => 'required|max:220',
        ]);

        $property_id = $request->id;
        Property::findOrFail($property_id)->update([

            'category_id' => $request->category_id,
            'is_sell' => $request->is_sell,
            'is_rent' => $request->is_rent,

            'selling_price' => $request->selling_price,
            'renting_price' => $request->renting_price,

            'bed' => $request->bed,
            'bath' => $request->bath,
            'land' => $request->land,
            'area' => $request->area,
            'built_year' => $request->built_year,

            'location_id' => $request->location_id,
            'agent_id' => $request->agent_id,
            'is_featured' => $request->is_featured,
            'is_active' => $request->is_active,
            'agent_id' => $request->agent_id,
            'is_featured' => $request->is_featured,

            'updated_at' => now(),

        ]);

        // Property Title Update
        PropertyTitle::where('property_id', $property_id)->update([

            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => now(),
        ]);

        // Property Address Update
        PropertyAdress::where('property_id', $property_id)->update([

            'address' => $request->address,
            'updated_at' => now(),
        ]);

        // Property Owner Update
        PropertyOwner::where('property_id', $property_id)->update([

            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'updated_at' => now(),
        ]);


        $notification = array(
            'message' => 'Property Updated without Images Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method

    public function UpdatePropertyCover(Request $request)
    {
        $pro_id = $request->id;
        $oldImag = $request->old_img;

        $image = $request->file('cover_photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        // read image from file system
        $imgg = $manager->read($image);
        // resize image proportionally
        $imgg->scale(width: 730);
        // save modified image in new format 
        $imgg->save('upload/properties/' . $pro_id . '/cover' . '/' . $name_gen);
        $save_url = 'upload/properties/' . $pro_id . '/cover' . '/' . $name_gen;


        if (file_exists($oldImag)) {
            unlink($oldImag);
        }
        Property::findOrFail($pro_id)->update([
            'cover_photo' => $save_url,
            'updated_at' => now(),
        ]);
        $notification = array(
            'message' => 'Property Cover Photo Updated Successfully' . $name_gen,
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method

    public function UpdatePropertyMulti(Request $request)
    {
        $prop_Id = $request->id;

        $imgs = $request->multi_img;
        if ($imgs) {
            foreach ($imgs as $id => $img) {
                $imgDel = PropertyImages::findOrFail($id);
                unlink($imgDel->photo_name);

                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

                // create image manager with desired driver
                $manager7 = new ImageManager(new Driver());
                // read image from file system
                $imgg7 = $manager7->read($img);
                // resize image proportionally
                $imgg7->scale(width: 730);
                // save modified image in new format 

                $imgg7->save('upload/properties/' . $prop_Id . '/multi' . '/' . $make_name);
                $save_url = 'upload/properties/' . $prop_Id . '/multi' . '/' . $make_name;


                PropertyImages::where('id', $id)->update([
                    'photo_name' => $save_url,
                    'updated_at' => now(),
                ]);
            }

            $notification = array(
                'message' => 'Property MultiImages Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back();
        }
    } // End Method

    public function MultiImageDelete($id)
    {
        $oldImg = PropertyImages::findOrFail($id);
        unlink($oldImg->photo_name);

        PropertyImages::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method

    public function StorePropertyMorePhoto(Request $request)
    {
        $property_id = $request->id;

        // Multiple Images Upload
        $images = $request->file('multi_img');
        foreach ($images as $img) {

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            // create image manager with desired driver
            $manager7 = new ImageManager(new Driver());
            // read image from file system
            $imgg7 = $manager7->read($img);
            // resize image proportionally
            $imgg7->scale(width: 730);

            $path2 = public_path('upload/properties/' . $property_id . '/multi' . '/');

            if (!File::isDirectory($path2)) {
                File::makeDirectory($path2, 0777, true, true);
            }


            // save modified image in new format 
            $imgg7->save('upload/properties/' . $property_id . '/multi' . '/' . $make_name);
            $uploadPath = 'upload/properties/' . $property_id . '/multi' . '/' . $make_name;

            PropertyImages::insert([
                'property_id' => $property_id,
                'photo_name' => $uploadPath,
                'created_at' => now(),
            ]);
        }

        $notification = array(
            'message' => 'More Images Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method

    public function DeleteProperty($id)
    {
        $prop = Property::findOrFail($id);

        Property::findOrFail($id)->delete();
        PropertyImages::where('property_id', $id)->delete();
        PropertyTitle::where('property_id', $id)->delete();
        PropertyAdress::where('property_id', $id)->delete();
        PropertyTitle::where('property_id', $id)->delete();
        $path2 = public_path('upload/properties/' . $id);
        File::deleteDirectory($path2);


        $notification = array(
            'message' => 'Property Deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method



    public function AllPropertyFeatured()
    {
        $props = Property::where('is_featured', '1')->paginate(12);
        return view('admin.props.props_all_featured', compact('props'));
    } // End Method


    public function AllPropertyContract()
    {
        $props = PropertyContract::latest()->paginate(12);
        return view('admin.prop_contract.props_all_contract', compact('props'));
    } // End Method

    public function AddPropertyContract()
    {
        return view('admin.prop_contract.props_add_contract');
    } // End Method

    public function StorePropContract(Request $request)
    {

        $validateData = $request->validate([
            'property_id' => 'required',
            'start' => 'required',
            'end' => 'required',

        ]);
        $start = date($request->start . " " . "00-00-00");
        $end = date($request->end . " " . "00-00-00");


        $prop = Property::where('id', $request->property_id)->get();
        if ($prop->count() > 0) {
            PropertyContract::insert([
                'property_id' => $request->property_id,
                'start' => $start,
                'end' => $end,
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'created_at' => now(),
            ]);

            $notification = array(
                'message' => 'Contract Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.prop.contract')->with($notification);
        } else {
            $notification = array(
                'message' => 'Wrong Property Id!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    } // End Method

    public function EditPropContract($id)
    {
        $cont = PropertyContract::findOrFail($id);
        return view('admin.prop_contract.props_edit_contract', compact('cont'));
    }

    public function UpdatePropContract(Request $request)
    {
        $validateData = $request->validate([
            'property_id' => 'required',
            'start' => 'required',
            'end' => 'required',

        ]);
        $start = date($request->start . " " . "00-00-00");
        $end = date($request->end . " " . "00-00-00");
        $id = $request->id;
        PropertyContract::findOrFail($id)->update([

            'property_id' => $request->property_id,
            'start' => $start,
            'end' => $end,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'updated_at' => now(),

        ]);
        $notification = array(
            'message' => 'Contract Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.prop.contract')->with($notification);
    }

    public function DeletePropertyContract($id)
    {
        PropertyContract::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Property Contract Deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method


    public function SearchPropertyById(Request $request)
    {

        $validateData = $request->validate([
            'search_id' => 'required',
        ]);

        $id = $request->search_id;
        // if($id < 0 || $id == null)
        // {
        //      $notification = array(
        //     'message' => 'Enter Property Id!',
        //     'alert-type' => 'warning'
        // );
        // return redirect()->route('all.prop')->with($notification);
        // }
        $props = Property::where('id', 'LIKE', "%$id%")->latest()->paginate(12);
        $props->appends(array('search_id' => $id));
        return view('admin.props.props_all_id', compact('props', 'id'));
    } // End Method

}
