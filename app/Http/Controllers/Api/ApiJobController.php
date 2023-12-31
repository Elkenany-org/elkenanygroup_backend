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
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        $header = Content::where([['page_name','jobs']])->first();
        $data['ar']['header_image'] = "";
        $data['en']['header_image'] = $header['image_url'];

        
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
    public function available_jobs()
    {
        $data = array();
        $data['ar'] = null;
        $data['en'] = null;
        
        $jobs = Job::all()->take(6);
        
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
            $data['en'] = $job;
        }
        else
        {
            $data['en'] = $job;
            $data['ar'] = $job;
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
    public function applyByJobId(Request $request)
    {
        $this->validate($request,[
            'job_id' => 'required',
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
        
        $job = Job::find($request->job_id);
        Newcomer::create([
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'phone' => $request->phone,
            'email' => $request->email,
            'job_title' => $job->title,
            'cv' => $path.'/'.$file_name
        ]);
        return response()->json('creation done',200);
    }
}
