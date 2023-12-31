<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Partner;
use App\Models\Employee;
use App\Models\Info;



class ApiContentController extends Controller
{
    public function home()
    {
        $contents = Content::where([['page_name','home']])->get();
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        $partners = Partner::all();
        
        $data['ar']['partners'] = [];
        $data['en']['partners'] = [];
        
        $employees = Employee::all();
        
        $data['ar']['employees'] = [];
        $data['en']['employees'] = [];

        foreach($partners as $partner)
        {
            $data['en']['partners']['name'] = $partner->name;
            $data['en']['partners']['image'] = $partner->logo_url;
        }
        foreach($employees as $employee)
        {
            $data['en']['employees'][] = ['name'=>$employee->name ,
                    'position'=>$employee->position ,
                    'image' => $employee->image_url
                ];
        }

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
    public function contactus()
    {
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        $header = Content::where([['page_name','contactus'],['type','header']])->first();
        $data['ar']['header_image'] = $header['image_url'];
        $data['en']['header_image'] = $header['image_url'];

        $types = ['--لا شئ--' , 'عنوان' , 'ايميل' , 'رقم تليفون' ];

        $all_info = Info::all();
        foreach($all_info as $info)
        {
            if($info->type == 'رقم تليفون')
                $info->type = 'phone';
            elseif($info->type == 'ايميل')
                $info->type = 'email';
            elseif($info->type == 'عنوان')
                $info->type = 'title';
        
            $data['ar']['info'][$info->type] = $info->description;
            $data['en']['info'][$info->type] = $info->description;
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

    
}
