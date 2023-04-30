<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    
    public function index()
    {
        $all_messages = ContactUs::paginate(10);
        return view('ContactUs.index')->with('all_messages' , $all_messages);
    }

    public function archive()
    {
        $all_messages = ContactUs::onlyTrashed()->paginate(10);
        return view('ContactUs.archive')->with('all_messages',$all_messages);
    }
    
    public function show($id)
    {
        $message = ContactUs::where('id' , $id)->first();
        return view('ContactUs.show')->with('message' , $message); 
    }
    
    

    public function soft_delete($id)
    {
        $message = ContactUs::find($id);
        $message->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $message = ContactUs::find($id);
        $message->restore();
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $message = ContactUs::find($id);
        $message->forceDelete();
        return redirect()->back();
    }
}
