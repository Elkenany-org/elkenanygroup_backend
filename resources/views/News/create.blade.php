@extends('layouts.app')

@section('content')

<div class="p-3">
    <form action="{{route('News.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="fname">العنوان: </label>
        <input type="text" id="fname" name="title"><br><br>
        <label for="fname">القسم: </label>
        <select name="category_id" class="form-control w-25">
          @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
          @endforeach
        </select><br>
        <label for="lname">الوصف: </label>
        <textarea name="description"></textarea>
        <input type="file" id="file" name="image">
        <input type="submit" value="Submit">
    </form> 
</div>

    <script>
      tinymce.init({
        selector: "textarea",
        directionality: 'rtl',
        plugins:
          "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss",
        toolbar:
          "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
        tinycomments_mode: "embedded",
        tinycomments_author: "Author name",
        mergetags_list: [
          { value: "First.Name", title: "First Name" },
          { value: "Email", title: "Email" },
        ],
      });
        
    </script>
@endsection

    
  