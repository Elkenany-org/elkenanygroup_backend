@extends('layouts.app')

@section('content')

<div class="p-3">

<form action="{{route('job.update' , $job->id)}}" method="POST">
    @csrf
    <label for="fname">Title: </label>
    <input type="text" id="fname" name="title" value="{{$job->title}}"><br><br>
    
    <label for="fname">Address: </label>
    <input type="text" id="fname" name="address" value="{{$job->address}}"><br><br>

    <label for="lname">Description: </label>
    <input type="text" id="lname" name="description" value="{{$job->description}}"><br><br>
    
    <label for="lname">Details: </label>
    <input type="text" id="lname" name="details" value="{{$job->details}}"><br><br>
    
    <label for="lname">Features: </label>
    <input type="text" id="lname" name="features" value="{{$job->features}}"><br><br>
    
    <input type="submit" value="Submit">
</form> 

</div>

@endsection