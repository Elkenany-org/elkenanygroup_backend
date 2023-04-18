<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    
    public function index()
    {
        $all_messages = ContactUs::all();
        return view('ContactUs.index')->with('all_messages' , $all_messages);
    }

    public function create()
    {
        return view('ContactUs.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'second_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);
        Post::create([
            'company_name' => $request->company_name,
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        return redirect()->route('ContactUs.index');
    }

    
    public function show($id)
    {
        $message = ContactUs::where('id' , $id)->first();
        return view('posts.show')->with('message' , $message); 
    }
    
    public function destroy($id)
    {
        $message = ContactUs::find($id);
        $message->delete();
    }

    public function hardDelete($id)
    {
        $message = ContactUs::find($id);
        $message->forceDelete();
        return redirect()->back();
    }
}
