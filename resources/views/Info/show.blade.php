{{-- @extends('layouts.app')

@section('content') --}}
<style>
    .button1
    {
        position: relative;
        left: 80%;
    }
    .button2
    {
        position: relative;
        left: 56%;
        background-color: gray;
    }
    .button3
    {
        background-color: lightgrey;
        border-radius: 10px;
        border-color: lightgrey;
        padding-left: 127px;
        padding-right: 127px;
        padding-top: 10px;
        padding-bottom: 10px;
        text-decoration: none;
    }
    .buttonChecked
    {
        background-color: lightgrey;
        border-radius: 10px;
        border-color: lightgrey;
        padding-left: 127px;
        padding-right: 127px;
        padding-top: 10px;
        padding-bottom: 10px;
        text-decoration: none;
    }
    .button3:hover {
        background-color: rgb(170, 165, 165);
    }
    .textArea
    {
        border-radius: 10px;
        padding-left:8px;
        size: 20px;
    }
    .comment
    {
        border-style: ridge;
        border-radius: 10px;
        padding-left: 8px;
    }
    .reply
    {
        position: relative;
        left: 7%;
    }
</style>
<div class="container" style="font-size: 1.2rem; color: green ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <div class="header">
                    <h2 class="text-center text-primary">show</h2>
                    <br>
                    <h1 style="color: darkgray"><b>{{$info->type}}</b></h1>
                    <p style="border-style: groove; color: rgb(92, 83, 83); border-radius: 8px; height:150px ; padding-left: 6px">
                        {{$info->description}}
                    </p>
                    &nbsp;
                    <br>
                    <a class="button1" href="{{route('info.edit' , $info->id)}}"><b>edit</b></a>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
      


