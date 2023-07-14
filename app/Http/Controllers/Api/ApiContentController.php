<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;



class ApiContentController extends Controller
{
    public function header($page_name)
    {
        $header = Content::where('page_name',$page_name)->get();
        return response()->json($header, 200);
    }
    public function reason($reason_index)
    {
        $reason = Content::where('page_name','careers')->where('type',$reason_index)->first();
        return response()->json($reason, 200);
    }
}
