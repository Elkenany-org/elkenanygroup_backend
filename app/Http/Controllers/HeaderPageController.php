<?php

namespace App\Http\Controllers;

use App\Models\Header_page;
use Illuminate\Http\Request;
use File;

class HeaderPageController extends Controller
{
    public function content($page_name)
    {
        $header = Header_page::where('page_name',$page_name)->first();
        return view('PagesContent.edit')->with('header',$header);
    }
    public function HomeContent()
    {
        $home_header = Header_page::where('page_name','home')->get();
        return view('PagesContent.home')->with('home_header',$home_header);
    }

    public function AboutusContent()
    {
        $aboutus_header = Header_page::where('page_name','aboutus')->get();
        return view('PagesContent.aboutus')->with('aboutus_header',$aboutus_header);
    }

    public function CareersContent()
    {
        $careers_header = Header_page::where('page_name','careers')->get();
        return view('PagesContent.careers')->with('careers_header',$careers_header);
    }
  
    public function update(Request $request, $page_name)
    {
        $page = Header_page::where('page_name',$page_name)->first();

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
}
