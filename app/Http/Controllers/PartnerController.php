<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->paginate(10);
        return view('Partners.index',compact('partners'));
    }

    public function archive()
    {
        $partners = Partner::latest()->onlyTrashed()->paginate(10);
        return view('Partners.archive')->with('partners',$partners);
    }

    public function create()
    {
        return view('Partners.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request , [
            'name'=> 'required',
            'logo'=> 'required',
        ]);
        $image_name = $request->logo->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/main/partners'; 
        $request->logo->move($path , $image_name);
        
        Partner::create([
            'name'=> $request->name,
            'logo'=> $path.'/'.$image_name,
        ]);
        return redirect()->route('Partners.index');
    }
    
    public function edit($id)
    {
        $partner = Partner::where('id' , $id)->first();
        return view('Partners.edit',compact('partner'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $partner = Partner::find($id);
        
        if($request->image != null)
        {
            $image_path = public_path('images/main/partners/'.$partner->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/main/partners';
            $request->image->move($path , $image_name);
            
            $partner->image = $path.'/'.$image_name;
        }
        
        
        $partner->name = $request->name;
        $partner->save();
        
        return redirect()->route('Partners.index');
    }
    
    public function soft_delete($id)
    {
        $partner = Partner::find($id);    
        $partner->delete();
        return redirect()->route('Partners.index');
    }
    public function restore($id)
    {
        $partner = Partner::withTrashed()->find($id);    
        $partner->restore();
        return redirect()->route('Partners.archive');
    }
    
    public function hard_delete($id)
    {
        $partner = Partner::onlyTrashed()->where('id', $id)->first();
        
        $image_path = public_path($partner->logo);
        if(File::exists($image_path)) 
            unlink($image_path);
        
        $partner->forceDelete();
        return redirect()->route('Partners.archive'); 
    }

}
