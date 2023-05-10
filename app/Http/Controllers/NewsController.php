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
        $search_flag = false;
        return view('News.index',compact('news'))->with('search_flag',$search_flag);
    }

    public function archive()
    {
        $news = News::latest()->onlyTrashed()->paginate(10);
        $search_flag = false;
        return view('News.archive')->with('news',$news)->with('search_flag',$search_flag);
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
        $path = 'images/news';
        $request->image->move($path , $image_name);
        
        News::create([
            'title'=> $request->title,
            'category_id'=> $request->category_id,
            'image'=> $image_name,
            'description'=> $request->description,
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
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);
        $event = News::find($id);
        $image_path = 'images/news/'.$event->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        
        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/news';
        $request->image->move($path , $image_name);
        
        $event->title = $request->title;
        $event->image = $image_name;
        $event->category_id = $request->category_id;
        $event->description = $request->description;
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
        $image_path = 'images/news/'.$event->image;
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
        $index = 0;
        $arr = array();
        $index_of_max = array();
        $ids = News::pluck('id');
        for ($i = 0; $i < count($ids); $i++)
        {
            array_push($arr ,[$ids[$i],0]);
        }
        
        for ($i = 0; $i < count($words); $i++)
        {
            $index = News::where('description', 'LIKE', '%'.$words[$i].'%')->pluck('id');
            for ($x = 0; $x < count($index); $x++)
            {
                for ($m = 0; $m < count($ids); $m++)
                {
                    if($index[$x] == $ids[$m])
                        $arr[$m][1]++;
                }
            }                
        }
        
        $max = 0;
        $flag = false;
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
            // $search_flag = true;
        return view('News.index')->with('news',$news)->with('search_flag',true);
    }

}

    

    