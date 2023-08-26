<?php

namespace App\Http\Controllers;

use App\Models\Newcomer;
use Illuminate\Http\Request;
use File;

class NewcomerController extends Controller
{
    public function index()
    {
        $newcomers = Newcomer::latest()->paginate(10);
        return view('Newcomers.index')->with('newcomers' , $newcomers);
    }
    
    public function show($id)
    {
        $newcomer = Newcomer::find($id)->first();
        $newcomer->read = '1';
        $newcomer->save();
        return view('Newcomers.show')->with('newcomer' , $newcomer); 
    }

    public function destroy($id)
    {
        $newcomer = Newcomer::find($id)->first();
        
        $file_path = public_path($newcomer->cv);
        if(File::exists($file_path)) 
            unlink($file_path);
        
        $newcomer->delete();
        return redirect()->route('Newcomers.index');
    }
}
