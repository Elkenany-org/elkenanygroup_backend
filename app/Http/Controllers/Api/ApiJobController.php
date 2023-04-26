<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;


class ApiJobController extends Controller
{
    public function index()
    {
        $Jobs = Job::all();
        return response()->json($Jobs, 200);
    }

    public function show($id)
    {
        $Job = Job::where('id' , $id)->first();
        return response()->json($Job, 200);
    }
}
