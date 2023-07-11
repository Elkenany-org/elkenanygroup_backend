<?php

namespace App\Http\Controllers;

use App\Models\Title_page;
use Illuminate\Http\Request;

class TitlePageController extends Controller
{
    // public function index()
    // {
    //     $titles = Title_page::paginate(10);
    //     return view('PagesContent.');
    // }
    public function HomeContent()
    {
        $title = Title_page::where('page_name','home')->get();
        return view('PagesContent.home')->with('title',$title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Title_page  $title_page
     * @return \Illuminate\Http\Response
     */
    public function show(Title_page $title_page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title_page  $title_page
     * @return \Illuminate\Http\Response
     */
    public function edit(Title_page $title_page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Title_page  $title_page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title_page $title_page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title_page  $title_page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title_page $title_page)
    {
        //
    }
}
