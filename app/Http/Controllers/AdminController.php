<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Logout Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    } // End of Method

    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    } // End of Method

    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    } // End of Method

    

    public function StoreProfile(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->line = $request->line;

        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);

    }// End Method
    

     public function ChangePassword(){

        return view('admin.admin_change_password');

    }// End Method

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

           return redirect()->back()->with('message', 'Password Updated Successfully');
            
        } else{
            return redirect()->back()->with('message', 'Old password is not match');
           
        }
        
    }// End Method


     public function AddAgent(){

        return view('admin.admin_add_agent');

    }// End Method

    public function StoreAgent(Request $request){


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('dashboard', absolute: false))->with('message', 'Agent Added!');
        
    }// End Method

      public function AllAgent(){

        $agents = User::get();
        return view('admin.admin_all_agent', compact('agents'));

    }// End Method

    public function DeleteAgent($id)
    {

        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Agent Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
}