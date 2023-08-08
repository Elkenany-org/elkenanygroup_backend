<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Content;


class ApiJobController extends Controller
{
    public function index()
    {
        $content = Content::where([['page_name','careers'],['type','header']])->first();

        $jobs = Job::all();
        
        $ret = array();
        $data = array();
        
        $data['ar']['content']['image'] = $content->image_url;
        $data['ar']['content']['desc'] = $content->description_ar;
        $data['ar']['jobs'] = [];

        foreach($jobs as $job)
        {
            $data['en']['content']['image'] = $content->image_url;
            $data['en']['content']['desc'] = $content->description_en;
            $data['en']['jobs'][] = $job;
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
