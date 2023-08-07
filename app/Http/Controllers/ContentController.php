<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use File;

class ContentController extends Controller
{
    
    public function header(Request $request)
    {
        $header = Content::where([['page_name',$request->page_name],['type',$request->type]])->first();
        return view('Content.header')->with('header',$header);
    }
    public function content(Request $request)
    {
        $content = Content::where([['page_name',$request->page_name],['type',$request->type]])->first();
        return view('Content.content')->with('content',$content);
    }
    public function update(Request $request)
    {
        $content = Content::where([['page_name',$request->page_name],['type',$request->type]])->first();
        
        $request->validate([
            'description_en' => 'required',
            'description_ar' => 'required'
        ]);
        

        if($request->image != null)
        {
            $image_path = public_path('images/content/'.$content->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/content';
            $request->image->move($path , $image_name);
            
            $content->image = $path.'/'.$image_name;
        }
        
        $content->description_en = $request->description_en;
        $content->description_ar = $request->description_ar;
        
        $content->save();

        return redirect()->route('home');
    }
    
}
