<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::paginate(3);
        return view('Complaints.index')->with('complaints',$complaints);
    }
    public function show($id)
    {
        $complaint = Complaint::where('id',$id)->first();
        return view('Complaints.show',compact('compaint'));
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    public function soft_delete($id)
    {
        $complaint = Complaint::find($id);    
        $complaint->delete();
        return redirect()->route('Complaints.index');
    }
    public function restore($id)
    {
        $complaint = Complaint::withTrashed()->find($id);    
        $complaint->restore();
        return redirect()->route('Complaints.archive');
    }

    public function hard_delete($id)
    {
        Complaint::where('id', $id)->forceDelete();
        return redirect()->route('Complaints.archive'); 
    }
}
