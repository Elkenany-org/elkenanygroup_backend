<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;



class ApiArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $data = array();
        
        foreach($articles as &$article)
        {
            if($article->language == 'ar')
            {
                $data['ar'] = $article;
                $data['en'] = null;
            }
            else
            {
                $data['en'] = $article;
                $data['ar'] = null;
            }
        }
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $article = Article::where('id' , $id)->first();
        $data = array();
        
        if($article->language == 'ar')
        {
            $data['ar'] = $article;
            $data['en'] = null;
        }
        else
        {
            $data['en'] = $article;
            $data['ar'] = null;
        }
        return response()->json($data, 200);
    }


}
