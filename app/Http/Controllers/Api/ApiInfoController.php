<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;


class ApiInfoController extends Controller
{
    public function index()
    {
        $infos = Info::all();
        return response()->json($infos, 200);
    }

    public function show($id)
    {
        $info = Info::where('id' , $id)->first();
        return response()->json($info, 200);
    }
}
