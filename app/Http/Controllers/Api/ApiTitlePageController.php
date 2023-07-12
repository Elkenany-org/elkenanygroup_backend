<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;



class ApiNewsController extends Controller
{
    
    public function show($id)
    {
        $event = News::where('id' , $id)
            ->with(['category' => function ($query) {
            $query->select('id','name_ar','name_en');
        }])
        ->get();
        return response()->json($event, 200);
    }

}
