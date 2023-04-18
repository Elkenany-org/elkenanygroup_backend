<div class="row">  
    <div class="container">
      <form action="{{route('contactus.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          
            <div class="from-group">
                <label for="exampleFromControlInput1">Company Name</label>
                <input type="text" name="company_name" class="form-control" required>
            </div>    
            <br><br>

            <div class="from-group">
                <label for="content" >First Name</label>
                <textarea class="from-control" rows="3" cols="130" name="description" required></textarea>
            </div>    
            <br><br>

            <div class="from-group">
                <label for="content" >First Name</label>
                <textarea class="from-control" rows="3" cols="130" name="description" required></textarea>
            </div>    
            <br><br>

            <div class="from-group">
                <label for="exampleFromControlInput1"></label>
                <input type="text" name="title" class="form-control" required>
            </div>    
            <br><br>

          <button class="btn btn-success" type="submit">Save</button>
      </form>
    </div>
  </div>


  @section('content')
	<div class="row">
		<div class="col-sm-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0" style="display: inline;">اسم الشركة<i class="fas fa-exclamation-circle" style="cursor: pointer;color:#FFC107" data-toggle="modal" data-target="#modal-secondary"></i></h5>
            </div>
            <div class="card-body">
            	<form action="{{route('contactus.store')}}" method="post" enctype="multipart/form-data" novalidate>
					{{csrf_field()}}
					<div class="row">

						{{--  title and image  --}}
						<div class="col-sm-12">
							<div class="row">
								{{-- title --}}
								<div class="col-sm-8 offset-2" style="margin-top: 10px">
									<div class="from-group">
										<label class="text-primary">الاسم الاول: <span class="text-danger">*</span></label>
										<input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="عنوان الخبر" required="">
									</div>
								</div>
                                <div class="col-sm-8 offset-2" style="margin-top: 10px">
									<div class="from-group">
										<label class="text-primary">الاسم الثاني: <span class="text-danger">*</span></label>
										<input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="عنوان الخبر" required="">
									</div>
								</div>
                                <div class="col-sm-8 offset-2" style="margin-top: 10px">
									<div class="from-group">
										<label class="text-primary">البريد الالكتروني: <span class="text-danger">*</span></label>
										<input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="عنوان الخبر" required="">
									</div>
								</div>
                                <div class="col-sm-8 offset-2" style="margin-top: 10px">
									<div class="from-group">
										<label class="text-primary">رقم الهاتف: <span class="text-danger">*</span></label>
										<input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="عنوان الخبر" required="">
									</div>
								</div>
                                <div class="col-sm-8 offset-2" style="margin-top: 10px">
									<div class="from-group">
										<label class="text-primary">الرسالة: <span class="text-danger">*</span></label>
										<input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="عنوان الخبر" required="">
									</div>
								</div>
								{{-- sections --}}
								{{-- <div class="col-sm-8 offset-2" style="margin-top: 10px">
									<div class="from-group">
										<label class="text-primary">  الاقسام <span class="text-danger">*</span></label>
										<select name="section_id" class="form-control section_id" required>
										<option value="" disabled selected>إختيار قسم</option>
										@foreach($sections as $value)
											<option value="{{$value->id}}">{{$value->name}}</option>
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-sm-6 offset-3 marbo" style="margin-top: 10px">
									<label class="text-primary">إختيار صورة <span class="text-danger"> * </span></label><br>
									<input type="file" name="image" accept="image/*" onchange="loadAvatar(event)" style="display: none;">
									<img src="{{asset('dist/img/placeholder2.png')}}" onclick="ChooseAvatar()" id="avatar">
								</div>
							</div>
						</div>
 --}}
						{{--  details  --}}
						<div class="col-sm-12">
							<label class="text-primary">التفاصيل <span class="text-danger">*</span></label>
							<textarea class="form-control" id="full-featured-non-premium" rows="10" name="desc" value="{{old('desc')}}" placeholder="التفاصيل" required></textarea>
						</div>	

					

						{{-- submit --}}
						<button style="width: 50%; margin-left: auto;margin-top:20px; margin-right: auto; " type="submit" class="btn btn-outline-primary btn-block">إضافة</button>
					</div>
            	</form>
            </div>
          </div>
        </div>
		{{--warning--}}
        <div class="modal fade" id="modal-secondary">
          <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-body">
            <p>هذه الصفحة خاصة  ب اضافة خبر جديد</p>
            </div>
          </div>
          </div>
        </div>
    </div>
@endsection
