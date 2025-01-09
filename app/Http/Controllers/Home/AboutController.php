<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
     public function HomeAbout()
    {
        $abouts = AboutPage::find(1);
        return view('frontend.about_page',compact('abouts'));
    } //End Method

    public function AboutPageSetting()
    {
        $abouts = AboutPage::find(1);
        return view('admin.about_page.about_setting',compact('abouts'));
    } //End Method

    public function UpdateAboutPage(Request $request)
    {
         $validateData = $request->validate([
            'title' => 'required',    
            'description' => 'required', 
            'title_why' => 'required',    
            'description_why' => 'required', 
        ]);

        $id = $request->id;
        $oldImag = $request->old_img;

        $image = $request->file('cover_photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        // read image from file system
        $image2 = $manager->read($image);
        $image2->scale(width: 540);

        $image2->save('upload/about/' . $name_gen);
        $save_url = 'upload/about/' . $name_gen;

          if (file_exists($oldImag)) {
            unlink($oldImag);
        }


        AboutPage::findOrFail($id)->update([

            'title' => $request->title,
            'description' => $request->description,
            'title_why' => $request->title_why,
            'description_why' => $request->description_why,

            'title_reason_1' => $request->title_reason_1,
            'title_reason_2' => $request->title_reason_2,
            'title_reason_3' => $request->title_reason_3,

            'reason_1' => $request->reason_1,
            'reason_2' => $request->reason_2,
            'reason_3' => $request->reason_3,

            'photo_name' => $save_url,
            'updated_at' => now(),
        ]);

        $notification = array(
            'message' => 'About Page Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //End Method

}