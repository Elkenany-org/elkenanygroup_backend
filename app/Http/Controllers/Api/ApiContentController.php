<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;



class ApiContentController extends Controller
{
    public function home()
    {
        $contents = Content::where([['page_name','home']])->get();
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        foreach($contents as $content)
        {
            $data['ar'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_ar];
            $data['en'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_en];
        }

        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }
    
    public function aboutus()
    {
        $contents = Content::where([['page_name','aboutus']])->get();
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        foreach($contents as $content)
        {
            $data['ar'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_ar];
            $data['en'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_en];
        }

        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }
    public function ourcompanies()
    {
        $contents = Content::where([['page_name','ourcompanies']])->get();
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        foreach($contents as $content)
        {
            $data['ar'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_ar];
            $data['en'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_en];
        }

        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }
    public function careers()
    {
        $contents = Content::where([['page_name','careers']])->get();
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        foreach($contents as $content)
        {
            $data['ar'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_ar];
            $data['en'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_en];
        }

        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }
    public function ordernow()
    {
        $contents = Content::where([['page_name','ordernow']])->get();
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        foreach($contents as $content)
        {
            $data['ar'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_ar];
            $data['en'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_en];
        }

        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }

    public function partnersImage()
    {
        $header = Content::where([['page_name','partners'],['type','header']])->first();
        $data = array();
        $data['ar']['image'] = $header['image_url'];
        $data['en']['image'] = $header['image_url'];
        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }
}
