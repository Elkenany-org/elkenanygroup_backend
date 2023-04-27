<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::paginate(3);
        return view('Jobs.index')->with('jobs' , $jobs);
    }

    public function archive()
    {
        $jobs = Job::onlyTrashed()->paginate(3);
        return view('Jobs.archive')->with('jobs',$jobs);
    }

    
    public function create()
    {
        return view('Jobs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'address'=>'required',
            'description'=>'required',
            'details'=>'required',
            'features'=>'required',
        ]);
        Job::create([
            'title'=>$request->title,
            'address'=>$request->address,
            'description'=>$request->description,
            'details'=>$request->details,
            'features'=>$request->features,
        ]);
        return redirect()->route('Jobs.index');
    }

    
    public function show(Job $job)
    {
        $job = Job::where('id' , $id)->first();
        return view('Jobs.show')->with('job' , $job);
    }
    
    
    public function edit($id)
    {
        $job = Job::find($id)->first();
        return view('Jobs.edit')->with('job' , $job);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'address'=>'required',
            'description'=>'required',
            'details'=>'required',
            'features'=>'required',
        ]);
        $job = Job::find($id);
        $job->title = $request->title;
        $job->address = $request->address;
        $job->description = $request->description;
        $job->details = $request->details;
        $job->features = $request->features;
        $job->save();

        return redirect()->route('Jobs.index');
    }

    public function soft_delete($id)
    {
        $job = Job::find($id);    
        $job->delete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $job = Job::withTrashed()->find($id);    
        $job->restore();
        return redirect()->back();
    }

    public function hard_delete($id)
    {
        Job::where('id', $id)->forceDelete();
        return redirect()->back(); 
    }
}
