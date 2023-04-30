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
        $news = News::paginate(10);
        return view('News.index',compact('news'));
    }

    public function archive()
    {
        $news = News::onlyTrashed()->paginate(10);
        return view('News.archive')->with('news',$news);
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
        $query = $request->input('query');
        $news = News::where('title', 'LIKE', '%'.$query.'%')->get();
        return view('News.test')->with('news',$news);
    }


    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $news = News::where('title', 'LIKE', '%'.$query.'%')->get();
    //     return view('News.index', compact('news'));


        // $news = News::where('title' , $request->search_string)->first();
        // echo $request->search_string;
        // // dd($request->search_string->get());
        // return view('News.test')->with('event',$request->search_string);
        // if($news->count()>0)
        // {
        //     // return view('News.index')->with('news',$news)->render();
        //     // return view('News.create');
        // }
        // if($news->count() == 0)
        // {
        //     $news = News::all();
        //     return view('News.index')->with('news',$news);
        // }

    // }

}

    

    