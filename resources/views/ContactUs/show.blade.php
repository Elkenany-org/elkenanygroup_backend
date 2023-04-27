@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>الشكوي</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">

                
                <div class="row">
                    <div class="col-12 d-flex align-items-center ">
                        <div class="d-inline-block input-style-1">
                          <label for="name">الاسم الاول</label>
                          <input type="text" class="form-control" name="first_name"
                               style=" margin-left: 70px;" id="name" placeholder="{{$message->first_name}}"
                               readonly>
                        </div>
                        <div class="d-inline-block input-style-1">
                          <label for="name" style=" margin-right: 70px;">الاسم الثاني</label>
                          <input type="text" class="form-control" name="last_name"
                                style=" margin-right: 70px;" id="name" placeholder="{{$message->first_name}}"
                                readonly>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                      <div class="input-style-1">
                        <label for="name">البريد الالكتروني</label>
                        <input type="text" class="form-control" name="email"
                             id="name" placeholder="{{$message->email}}" readonly>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-style-1">
                        <label for="name">رقم الموبايل</label>
                        <input type="text" class="form-control" name="phone_number"
                             id="name" placeholder="{{$message->phone}}" readonly>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label for="name">الرسالة</label>
                        <textarea type="text" class="form-control" name="message" rows="8"
                             id="name" placeholder="{{$message->message}}" readonly></textarea>
                      </div>
                    </div>

                    
                    <!-- end col -->
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <a href="{{ route('contactus.soft_delete', $message->id) }}" class="main-btn danger-btn btn-hover w-25 text-center">
                                حذف
                            </a>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endsection
