<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Content;



class ApiNewsController extends Controller
{
    public function index()
    {
        $news = News::with(['category' => function ($query) {
            $query->select('id','name_ar','name_en');
        }])
        ->get();
        $ret = array();
        $data = array();
        
        $content = Content::where([['page_name','events'],['type','header']])->first();
        $data['content']['image'] = $content['image_url']; 

        $data['ar']['events'] = null;
        $data['en']['events'] = null;
        foreach($news as $event)
        {
            if($event->language == 'ar')
            {
                $data['ar']['events'][] = $event;   
            }
            else
            {
                $data['en']['events'][] = $event;   
            }
        }
        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }

    public function show($id)
    {
        $event = News::where('id' , $id)
            ->with(['category' => function ($query) {
            $query->select('id','name_ar','name_en');
        }])
        ->first();
        $data = array();


        $data['en'] = null;
        $data['ar'] = null;
        
        if($event->language == 'ar')
        {
            $data['ar'] = $event;
        }
        else
        {
            $data['en'] = $event;
        }
        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }

    public function search(Request $request)
    {
        $event = News::where('description', 'LIKE', "%{$request->description}%")->first();
        return response()->json($event, 200);
    }

}
