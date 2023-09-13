<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Content;


class ApiPartnerController extends Controller
{
    public function index()
    {
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        $header = Content::where([['page_name','partners'],['type','header']])->first();
        $data['ar']['header_image'] = $header['image_url'];
        $data['en']['header_image'] = $header['image_url'];
        
        $partners = Partner::all();
        
        $data['ar']['partners'] = [];
        $data['en']['partners'] = [];

        foreach($partners as $partner)
        {
            $data['en']['partners'][] = $partner->logo_url;
            $data['ar']['partners'][] = $partner->logo_url;
        }

        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }
    
    public function show($id)
    {
        $job = Job::where('id' , $id)->first();
        
        $data = array();
        
        if($job->language == 'ar')
        {
            $data['ar'] = $job;
            $data['en'] = null;
        }
        else
        {
            $data['en'] = $job;
            $data['ar'] = null;
        }
        return response()->json($job, 200);
    }

    public function search(Request $request)
    {
        $job = Job::where('title', 'LIKE', "%{$request->title}%")->first();
        return response()->json($job, 200);
    }
}
