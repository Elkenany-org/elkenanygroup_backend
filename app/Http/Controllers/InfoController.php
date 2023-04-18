<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;


class InfoController extends Controller
{
    
    public function index()
    {
        $all_info = Info::all();
        return view('Info.index')->with('all_info' , $all_info);
    }

    public function create()
    {
        return view('Info.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'type' => 'required',
            'description' => 'required'
        ]);

        Post::create([
            'type' => $request->type,
            'description' => $request->description
        ]);
        return redirect()->route('Info.index');
    }

    
    public function show($id)
    {
        $info = Info::where('id' , $id)->first();
        return view('Info.show')->with('info' , $info);
    }


    public function edit($id)
    {
        $info = Info::where('id' , $id)->first();
        return view('Info.edit')->with('info',$info);
    }

    public function update(Request $request ,$id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $info = Info::find($id);
        $info->type = $request->type;
        $info->description = $request->description;
        $info->save();

        return redirect()->route('Info.index'); 
    }

    public function destroy($id)
    {
        $info = Info::find($id);
        $info->delete();
    }

    public function hardDelete($id)
    {
        $info = Info::find($id);
        $info->forceDelete();
        return redirect()->back();
    }
}
