<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Header_Page;



class ApiHeaderPageController extends Controller
{
    public function show($page_name)
    {
        $header = Header_page::where('page_name',$page_name)->get();
        return response()->json($header, 200);
    }
}
