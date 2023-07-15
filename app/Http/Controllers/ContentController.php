<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    
    public function header($page_name)
    {
        $header = Content::where('page_name',$page_name)->first();
        return view('Content.header')->with('header',$header);
    }
    public function reason($reason_index)
    {
        $reason = Content::where('page_name','careers')->where('type',$reason_index)->first();
        return view('Content.reasons')->with('reason',$reason);
    }
    public function ourteam()
    {
        $team = Content::where('page_name','careers')->where('type','ourteam')->first();
        dd();
        return view('Content.ourteam')->with('team',$team);
    }

    public function headerupdate(Request $request, $page_name)
    {
        $page = Content::where('page_name',$page_name)->first();

        $request->validate([
            'description_en' => 'required',
            'description_ar' => 'required'
        ]);
        
        if($request->image != null)
        {
            $image_path = public_path('images/content/'.$page->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/content';
            $request->image->move($path , $image_name);
            
            $page->image = $image_name;
        }
        
        $page->description_en = $request->description_en;
        $page->description_ar = $request->description_ar;
        
        $page->save();

        return redirect()->route('home');
    }
    public function reasonupdate(Request $request, $type)
    {
        $reason = Content::where('page_name','careers')->where('type',$type)->first();

        $request->validate([
            'description_en' => 'required',
            'description_ar' => 'required'
        ]);
        
        $reason->description_en = $request->description_en;
        $reason->description_ar = $request->description_ar;
        
        $reason->save();

        return redirect()->route('home');
    }
}
