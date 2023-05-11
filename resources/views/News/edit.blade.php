@extends('layouts.app')

@section('content')

<div class="card-styles">
  <div class="card-style-3 mb-30">
      <div class="card-content">            
          <div class="row">
            <form action="{{route('News.update',$event->id)}}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="col-12">
                <div class="input-style-1">
                  <label for="title">العنوان</label>
                  <input type="text" class="form-control" name="title" value="{{$event->title}}">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="category_id">القسم</label>
                  <select name="category_id" class="form-control w-25">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                    @endforeach
                  </select>  
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="description">الوصف</label>
                  <textarea name="description">{{$event->description}}</textarea>
                </div>
              </div>
              
              <div class="col-12">
                <div class="input-style-1">
                  <label for="name">الصورة</label>
                  <img src="/images/news/{{$event->image}}" alt="error" style="width: 200px">
                  <input type="file" class="file" id="file" name="image" value="/images/{{$event->image}}">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="alt_text">alt_text</label>
                  <input type="text" class="form-control" name="alt_text" value="{{$event->alt_text}}">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="focus_word">Focus_keyword</label>
                  <input type="text" class="form-control" name="focus_keyword" value="{{$event->focus_keyword}}">
                </div>
              </div>
              
              <br><br>              
              <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="font-weight-bold">Social Media Data</h1>
              </div>
              <br><br>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_title">Social_title</label>
                  <input type="text" class="form-control" name="social_title" value="{{$event->social_title}}">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_description">Social_decription</label>
                  <input type="text" class="form-control" name="social_description" value="{{$event->social_description}}">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_image">Social_image</label>
                  <input type="file" class="file" name="social_image" value="{{$event->social_image}}">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_alt_text">Social_alt_text</label>
                  <input type="text" class="form-control" name="social_alt_text" value="{{$event->social_alt_text}}">
                </div>
              </div>
              
              <br><br>              
              <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="font-weight-bold">Meta Data</h1>
              </div>
              <br><br>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="meta_title">Title_tag</label>
                  <input type="text" class="form-control" name="meta_title" value="{{$event->meta_title}}">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="meta_link">Meta_link</label>
                  <input type="text" class="form-control" name="meta_link" value="{{$event->meta_link}}">
                </div>
              </div>
              
              <div class="col-12">
                <div class="input-style-1">
                  <label for="Meta_decription">Meta_decription</label>
                  <input type="text" class="form-control" name="meta_description" value="{{$event->meta_decription}}">
                </div>
              </div>

              <div class="col-12">
                  <div class="button-group d-flex justify-content-center flex-wrap">
                    <input class="main-btn primary-btn btn-hover w-25 text-center" type="submit" value="تعديل">
                  </div>
              </div>
              </div>
            </form> 
      </div>
  </div>
</div>

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

    
  