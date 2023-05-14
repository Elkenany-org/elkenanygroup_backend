<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use File;


class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('News.index',compact('news'))->with('search_flag',false);
    }

    public function archive()
    {
        $news = News::latest()->onlyTrashed()->paginate(10);
        return view('News.archive')->with('news',$news)->with('search_flag',false);
    }

    public function create()
    {
        $categories = Category::all();
        return view('News.create',compact('categories'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request , [
            'title'=> 'required',
            'category_id'=> 'required',
            'image'=> 'required',
            'description'=> 'required',
        ]);
        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/main/news';
        $request->image->move($path , $image_name);
        
        $social_image_name = "";
        if($request->social_image != null)
        {
            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/news';
            $request->social_image->move($path , $social_image_name);
        }
        
        
        News::create([
            'title'=> $request->title,
            'category_id'=> $request->category_id,
            'image'=> $image_name,
            'description'=> $request->description,
            'alt_text'=> $request->alt_text,
            'focus_keyword'=> $request->focus_keyword,

            'social_title'=> $request->social_title,
            'social_image'=> $social_image_name,
            'social_decription'=> $request->social_decription,
            'social_alt_text'=> $request->social_alt_text,

            'meta_title'=> $request->meta_title,
            'meta_link'=> $request->meta_link,
            'meta_decription'=> $request->meta_decription,
        ]);
        return redirect()->route('News.index');
    }
    
    public function show($id)
    {
        $event = News::where('id' , $id)->first();
        $event->description = $this->remove_tags($event->description); 
        return view('News.show')->with('event' , $event);
    }

    public function edit($id)
    {
        $event = News::where('id' , $id)->first();
        $categories = Category::all();
        return view('News.edit',compact('categories'))->with('event' , $event);
    }
    
    public function update(Request $request, $id)
    {
        // dd($event->image);
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);
        $event = News::find($id);
        $image_path = public_path('images/main/news/'.$event->image);
        if(File::exists($image_path))
            unlink($image_path);
        
        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/main/news';
        $request->image->move($path , $image_name);
        
        
        $event->title = $request->title;
        $event->image = $image_name;
        $event->category_id = $request->category_id;
        $event->description = $request->description;
        $event->focus_keyword = $request->focus_keyword;
        $event->alt_text = $request->alt_text;
        
        
        $event->social_title = $request->social_title;
        $event->social_description = $request->social_description;
        if($request->social_image != null)
        {
            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/news';
            $request->social_image->move($path , $social_image_name);
            $event->social_image = $social_image_name;

            $image_path = public_path('images/main/news/'.$event->image);
            $image_path = public_path('images/social/news/'.$event->social_image);
            if(File::exists($image_path))
                unlink($image_path);
        }
        $event->social_alt_text = $request->social_alt_text;
        
        
        $event->meta_title = $request->meta_title;
        $event->meta_link = $request->meta_link;
        $event->meta_description = $request->meta_description;

        $event->save();
        
        return redirect()->route('News.index');
    }
    
    public function soft_delete($id)
    {
        $event = News::find($id);    
        $event->delete();
        return redirect()->route('News.index');
    }
    public function restore($id)
    {
        $event = News::withTrashed()->find($id);    
        $event->restore();
        return redirect()->route('News.archive');
    }
    
    public function hard_delete($id)
    {
        $event = News::onlyTrashed()->where('id', $id)->first();
        $image_path = 'images/main/news/'.$event->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $event->forceDelete();
        return redirect()->route('News.archive'); 
    }
    public function search(Request $request)
    {
        $title = $request->title;
        $news = News::where('title', 'LIKE', '%'.$title.'%')->paginate(10);
        return view('News.index')->with('news',$news);
    }
    public function archive_search(Request $request)
    {
        $title = $request->title;
        $news = News::onlyTrashed()->where('title', 'LIKE', '%'.$title.'%')->paginate(10);
        return view('News.archive')->with('news',$news);
    }
    public function description_search(Request $request)
    {
        $description = $request->description;
        if($description == "")
        {
            return redirect()->route('News.index')->with('search_flag',false);
        }
        $words = explode(" ", $description);
        $flag = false;
        $arr = array();
        $indecies_of_words = array();
        $index_of_max = array();
        $ids = News::pluck('id');
     
        
        for ($i = 0; $i < count($ids); $i++)
        {
            array_push($arr ,[$ids[$i],0]);
            
        }
        $c = 0;
        for ($i = 0; $i < count($words); $i++)
        {
            $index = News::where('description', 'LIKE', '%'.$words[$i].'%')->pluck('id');
            for ($x = 0; $x < count($index); $x++)
            {
                for ($m = 0; $m < count($ids); $m++)
                {
                    if($index[$x] == $ids[$m])
                    {
                        $arr[$m][1]++;
                        $indecies_of_words[ $ids[$m] ][$c] = $words[$i];
                        $c++;
                    }
                }        
            }                
        }
        foreach ($indecies_of_words as &$row) {
            $row = array_values($row);
        }

        
        // dd($indecies_of_words[5][0]);
        if($index->count() == 0)
            return redirect()->route('News.index')->with('search_flag',false);

        $max = 0;
        for($j = 0; $j < count($ids); $j++)
        {
            $i = 0;
            foreach($arr as $element)
            {
                if($element[1] > $max)
                {
                    $flag = true;
                    $max = $element[1];
                    $index = $i;
                }
                $i++;
            }
            if($flag)
                array_push($index_of_max,$arr[$index][0]);
            $arr[$index][1] = -100000;
            $max = 0;
            $flag = false;
        }
        
        $news = News::whereIn('id',$index_of_max)
            ->orderByRaw(News::raw("FIELD(id, ".implode(",", $index_of_max).")"))
            ->paginate(10);

        return view('News.index')->with('news',$news)->with('search_flag',true)
            ->with('indecies_of_words',$indecies_of_words);
    }

}

    

    