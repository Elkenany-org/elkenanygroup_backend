@extends('layouts.app')

@section('content')

<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>بيانات المتقدم لوظيفة</h2>
            </div>
        </div>
    </div>
</div>
<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">            
            
            <div class="row">
                <div class="col-12 d-flex align-items-center ">

                    <div class="d-inline-block input-style-1">
                        <label for="first_name">الاسم الاول</label>
                        <input type="text" class="form-control" name="firstname"
                            style=" margin-left: 70px;" id="name" placeholder="{{$newcomer->firstname}}"
                            readonly>
                    </div>
                    <div class="d-inline-block input-style-1">
                        <label for="second_name" style=" margin-right: 70px;">الاسم التاني</label>
                        <input type="text" class="form-control" name="secondname"
                            style=" margin-right: 70px;" id="name" placeholder="{{$newcomer->secondname}}"
                            readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-style-1">
                        <label for="email">الايميل</label>
                        <input type="text" class="form-control" name="email"
                            id="name" placeholder="{{$newcomer->email}}" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-style-1">
                        <label for="phone">الموبايل</label>
                        <input type="text" class="form-control" name="phone"
                            id="name" placeholder="{{$newcomer->phone}}" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-style-1">
                    <label for="cv">السيرة الذاتية</label>
                    {{-- <input type="file" class="form-control" name="cv"
                            id="name" placeholder="{{$newcomer->cv_url}}" readonly> --}}
                    <a type="file" href="{{$newcomer->cv_url}}" download="{{$newcomer->firstname}}_cv" class="form-control">

                    </div>
                </div>
                
                <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                        <a href="{{ route('Newcomers.destroy', $newcomer->id) }}" class="main-btn danger-btn btn-hover w-25 text-center">
                            حذف
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
