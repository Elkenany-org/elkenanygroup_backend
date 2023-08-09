<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Content;


class ApiArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        $ret = array();
        $data = array();
        
        $content = Content::where([['page_name','blog'],['type','header']])->first();
        $data['content']['image'] = $content['image_url']; 

        $data['ar']['articles'] = null;
        $data['en']['articles'] = null;
        foreach($articles as $article)
        {
            if($article->language == 'ar')
            {   
                $data['ar']['articles'][] = $article;   
            }
            else
            {
                $data['en']['articles'][] = $article;   
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
        $article = Article::where('id' , $id)->first();
        $data = array();
        $data['ar'] = null;   
        $data['en'] = null;   
        
        if($article->language == 'ar')
        {
            $data['ar'] = $article;   
        }
        else
        {
            $data['en'] = $article;   
        }
        return response()->json([
            'error'=>'',
            'message'=>'',
            'data'=>$data
        ], 200);
    }


}
