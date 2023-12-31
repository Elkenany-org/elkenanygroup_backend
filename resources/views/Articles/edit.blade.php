@extends('layouts.app')

@section('content')

<div class="card-styles">
  <div class="card-style-3 mb-30">
      <div class="card-content">            
          <div class="row">
            <form action="{{route('Articles.update',$article->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-12">
                <div class="input-style-1">
                  <label for="language">اللغة</label>
                  <select name="language" class="form-control w-25" >
                    @if ($article->language == "en")
                      <option value="en">انجليزي</option>  
                      <option value="ar">عربي</option>
                    @else
                      <option value="ar">عربي</option>
                      <option value="en">انجليزي</option>  
                    @endif
                  </select>  
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="title">العنوان</label>
                  <input type="text" class="form-control" name="title" value="{{$article->title}}" oninput="countCharacters(this,1)">
                  <div dir="ltr"><span id="1"></span></div>
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
                  <label for="shortdescription">الوصف المختصر</label>
                  <textarea name="shortdescription" id="textarea" oninput="countCharacters(this,20)">{{$article->shortdescription}}</textarea>
                  <div dir="ltr"><span id="20"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="description">الوصف</label>
                  <textarea name="description" id="textarea1" oninput="countCharacters(this,2)">{{$article->description}}</textarea>
                  <div dir="ltr"><span id="2"></span></div>
                </div>
              </div>
              
              <div class="col-12">
                <div class="input-style-1">
                  <label for="name">الصورة</label>
                  <img src="{{$article->image}}" alt="error" style="width: 200px">
                  <input type="file" class="file" id="file" name="image">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="alt_text" dir="ltr">Alt_text</label>
                  <input type="text" class="form-control" name="alt_text" value="{{$article->alt_text}}" oninput="countCharacters(this,3)">
                  <div dir="ltr"><span id="3"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="focus_word" dir="ltr">Focus_keyword</label>
                  <input type="text" class="form-control" name="focus_keyword" value="{{$article->focus_keyword}}" oninput="countCharacters(this,4)">
                  <div dir="ltr"><span id="4"></span></div>
                </div>
              </div>
              
              <br><br>              
              <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="font-weight-bold" style="color: #0d6efd;">Social Media Data</h1>
              </div>
              <br><br>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_title" dir="ltr">Social_title</label>
                  <input type="text" class="form-control" name="social_title" value="{{$article->social_title}}" oninput="countCharacters(this,15)">
                  <div dir="ltr"><span id="15"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_description" dir="ltr">Social_description</label>
                  <textarea type="text" class="form-control" rows="3" name="social_description" oninput="countCharacters(this,5)">{{$article->social_description}}</textarea>
                  <div dir="ltr"><span id="5"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_image" dir="ltr">Social_image</label>
                  @if ($article->social_image != null)
                    <img src="/images/social/articles/{{$article->social_image}}" alt="error" style="width: 200px">  
                  @endif
                  <input type="file" class="file" name="social_image">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_alt_text" dir="ltr">Social_alt_text</label>
                  <input type="text" class="form-control" name="social_alt_text" value="{{$article->social_alt_text}}" oninput="countCharacters(this,6)">
                  <div dir="ltr"><span id="6"></span></div>
                </div>
              </div>
              
              <br><br>              
              <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="font-weight-bold" style="color: #0d6efd;">Meta Data</h1>
              </div>
              <br><br>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="meta_title" dir="ltr">Title_tag</label>
                  <input type="text" class="form-control" name="meta_title" value="{{$article->meta_title}}" oninput="countCharacters(this,7)">
                  <div dir="ltr"><span id="7"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="meta_link" dir="ltr">Meta_link</label>
                  <input type="text" class="form-control" dir="ltr" name="meta_link" value="{{$article->meta_link}}" oninput="countCharacters(this,8)">
                  <div><span id="8"></span></div>
                </div>
              </div>
              
              <div class="col-12">
                <div class="input-style-1">
                  <label for="Meta_decription" dir="ltr">Meta_description</label>
                  <textarea type="text" class="form-control" rows="3" name="meta_description" oninput="countCharacters(this,9)">{{$article->meta_description}}</textarea>
                  <div dir="ltr"><span id="9"></span></div>
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
        selector: "#textarea1",
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

      function countCharacters(inputField , id) {
        var charCountElement = document.getElementById(id);
        charCountElement.innerText = inputField.value.length;
      }
        
    </script>
@endsection

    
  