<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Content;
use App\Models\Newcomer;


class ApiJobController extends Controller
{
    public function index()
    {
        $contents = Content::where([['page_name','careers']])->get();
        
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        foreach($contents as $content)
        {
            $data['ar']['content'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_ar];
            $data['en']['content'][$content->type] = ['image' => $content->image_url ,'desc' => $content->description_en];
        }
        
        $jobs = Job::all();
        
        $data['ar']['jobs'] = [];
        $data['en']['jobs'] = [];

        foreach($jobs as $job)
        {
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
    public function apply(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'secondname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'cv' => 'required'
        ]);
        $file_name = $request->cv->getClientOriginalName();
        $file_name = time().$file_name;
        $path = 'images/main/CVs'; 
        $request->cv->move($path , $file_name);
        
        Newcomer::create([
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'phone' => $request->phone,
            'email' => $request->email,
            'cv' => $path.'/'.$file_name
        ]);
        return response()->json('creation done',200);
    }
}
