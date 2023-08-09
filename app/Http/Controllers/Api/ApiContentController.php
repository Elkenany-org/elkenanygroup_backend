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
    public function reason($reason_index)
    {
        $reason = Content::where('page_name','careers')->where('type',$reason_index)->first();
        return response()->json($reason, 200);
    }
    public function value($value_index)
    {
        $value = Content::where('page_name','home')->where('type',$value_index)->first();
        return response()->json($value, 200);
    }
    public function ourteam()
    {
        $team = Content::where('page_name','careers')->where('type','ourteam')->first();
        return response()->json($team, 200);
    }
    
    
    public function characteristic($characteristic_index)
    {
        $characteristic = Content::where('page_name','aboutus')->where('type',$characteristic_index)->first();
        return response()->json($characteristic, 200);
    }
    public function ceo()
    {
        $ceo = Content::where('type','ceo')->first();
        return response()->json($ceo, 200);
    }
    public function mission()
    {
        $mission = Content::where('type','mission')->first();
        return response()->json($mission, 200);
    }
    public function vision()
    {
        $vision = Content::where('type','vision')->first();
        return response()->json($vision, 200);
    }
    public function homeactivity($type)
    {
        $content = Content::where('page_name','home')->where('type',$type)->first();
        return response()->json($content, 200);
    }
}
