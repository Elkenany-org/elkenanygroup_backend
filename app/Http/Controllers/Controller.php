<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function description_search(Request $request)
    // {
    //     return view('info.create');
    //     $description = $request->description;
    //     if($description == "")
    //     {
    //         return redirect()->route('News.index')->with('search_flag',false);
    //     }
    //     $words = explode(" ", $description);
    //     $flag = false;
    //     $arr = array();
    //     $indecies_of_words = array();
    //     $index_of_max = array();
    //     $ids = News::pluck('id');
        
        
    //     for ($i = 0; $i < count($ids); $i++)
    //     {
    //         array_push($arr ,[$ids[$i],0]);
            
    //     }
    //     $c = 0;
    //     for ($i = 0; $i < count($words); $i++)
    //     {
    //         $index = News::where('description', 'LIKE', '%'.$words[$i].'%')->pluck('id');
    //         for ($x = 0; $x < count($index); $x++)
    //         {
    //             for ($m = 0; $m < count($ids); $m++)
    //             {
    //                 if($index[$x] == $ids[$m])
    //                 {
    //                     $arr[$m][1]++;
    //                     $indecies_of_words[ $ids[$m] ][$c] = $words[$i];
    //                     $c++;
    //                 }
    //             }        
    //         }                
    //     }
    //     foreach ($indecies_of_words as &$row) {
    //         $row = array_values($row);
    //     }
        
        
    //     if($index->count() == 0)
    //         return redirect()->route('News.index')->with('search_flag',false);
    //     dd($description);
        
    //     $max = 0;
    //     for($j = 0; $j < count($ids); $j++)
    //     {
    //         $i = 0;
    //         foreach($arr as $element)
    //         {
    //             if($element[1] > $max)
    //             {
    //                 $flag = true;
    //                 $max = $element[1];
    //                 $index = $i;
    //             }
    //             $i++;
    //         }
    //         if($flag)
    //             array_push($index_of_max,$arr[$index][0]);
    //         $arr[$index][1] = -100000;
    //         $max = 0;
    //         $flag = false;
    //     }
        
    //     $news = News::whereIn('id',$index_of_max)
    //         ->orderByRaw(News::raw("FIELD(id, ".implode(",", $index_of_max).")"))
    //         ->paginate(10);
        
    //     return view('News.index')->with('news',$news)->with('search_flag',true)
    //         ->with('indecies_of_words',$indecies_of_words);
    // }
}
