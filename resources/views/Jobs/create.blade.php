@extends('layouts.app')

@section('content')

<div class="p-3">

<form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="fname">اسم الوظيفة: </label>
    <input type="text" id="fname" name="title"><br><br>
    
    <label for="fname">Address: </label>
    <input type="text" id="fname" name="address"><br><br>

    <label for="lname">Description: </label>
    <input type="text" id="lname" name="description"><br><br>
    
    <label for="lname">Details: </label>
    <input type="text" id="lname" name="details"><br><br>
    
    <label for="lname">Features: </label>
    <input type="text" id="lname" name="features"><br><br>
    
    <input type="submit" value="Submit">
</form> 
  
@endsection

    
  