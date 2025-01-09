<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPage;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function HomeContatct()
    {
        $contacts = ContactPage::find(1);
        return view('frontend.contact_page',compact('contacts'));
    } //End Method

    public function ContactPageSetting()
    {
        $contacts = ContactPage::find(1);
        return view('admin.contact_page.contact_setting',compact('contacts'));
    } //End Method

    public function UpdateContactPage(Request $request)
    {
         $validateData = $request->validate([
            'address' => 'required',    
            'phone' => 'required', 
            'email' => 'required',    
        ]);

        $id = $request->id;
        $oldImag = $request->old_img;

        $image = $request->file('map');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        // read image from file system
        $image2 = $manager->read($image);
     

        $image2->save('upload/contact/' . $name_gen);
        $save_url = 'upload/contact/' . $name_gen;

          if (file_exists($oldImag)) {
            unlink($oldImag);
        }

        ContactPage::findOrFail($id)->update([

            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'map_link' => $request->map_link,
            'map' => $save_url,
      
        ]);

        $notification = array(
            'message' => 'Contact Page Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //End Method
}