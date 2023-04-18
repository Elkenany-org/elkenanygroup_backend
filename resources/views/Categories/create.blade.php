@extends('layouts.app')

@section('content')


<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="fname">الاسم:</label><br>
    <input type="text" id="fname" name="name_ar" required><br>
    <label for="lname">name:</label><br>
    <input type="text" id="lname" name="name_en" required><br><br>
    <input type="submit" value="Submit">
</form> 

@endsection