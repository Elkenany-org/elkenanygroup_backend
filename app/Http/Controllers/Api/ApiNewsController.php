<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;



class ApiNewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return response()->json($news, 200);
    }

    public function show($id)
    {
        $event = News::where('id' , $id)->first();
        return response()->json($event, 200);
    }

}
