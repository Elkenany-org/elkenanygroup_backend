<?php

namespace App\Http\Controllers;

use App\Models\Title_page;
use Illuminate\Http\Request;

class TitlePageController extends Controller
{
    public function HomeContent()
    {
        $home_title = Title_page::where('page_name','home')->get();
        return view('PagesContent.home')->with('home_title',$home_title);
    }

    public function AboutusContent()
    {
        $aboutus_title = Title_page::where('page_name','aboutus')->get();
        return view('PagesContent.aboutus')->with('aboutus_title',$aboutus_title);
    }

    public function CareersContent()
    {
        $careers_title = Title_page::where('page_name','careers')->get();
        return view('PagesContent.careers')->with('careers_title',$careers_title);
    }
  
    public function update(Request $request, $page_name)
    {
        $page = Title_page::where('page_name',$page_name)->first();

        $request->validate([
            'image' => 'required',
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
