<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;


class ApiContactUsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'company' => 'required',
            'country' => 'required',
            'message' => 'required'
        ]);
        $ret = ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'country' => $request->country,
            'message' => $request->message,
        ]);
        if($ret != null)
        {
            return response()->json('The message was added successfully',200);
        }
        else
        {
            return response()->json(404);
        }
    }

}
