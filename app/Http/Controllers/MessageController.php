<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function AllMessages()
    {
        $messages = Message::latest()->paginate(9);
        return view('admin.messages.message_all',compact('messages'));
        
    } //End Method

    public function DeleteMessage($id){

        Message::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Message Deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);       

     }// End Method 

       public function ReadMessage($id)
    {
        Message::findOrFail($id)->update([
                'is_read' => true,
            ]); 
        $messages = Message::findOrFail($id);
        return view('admin.messages.message_read',compact('messages'));
        
    } //End Method

    public function StoreMessage(Request $request){

            Message::insert([
                'customer_name' => $request->customer_name,  
                'customer_email' => $request->customer_email, 
                'customer_subject' => $request->customer_subject, 
                'customer_message' => $request->customer_message, 
                'customer_phone' => $request->customer_phone, 
                'is_read' => false, 
                'created_at' => Carbon::now(),

            ]); 
            $notification = array(
            'message' => 'Message Sent!', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Method
}