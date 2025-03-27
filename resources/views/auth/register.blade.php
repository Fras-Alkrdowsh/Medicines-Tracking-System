
@extends('layouts.master2')
@section('css')
@endsection
@section('content')

<div class="container-fluid">
    <div class="row no-gutter">
        
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-7 bg-white">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="main-signup-header">
                                    <h2 class="text-primary">سجل الان</h2>
                                    <h5 class="font-weight-normal mb-4"> مرحبا بك في نظام تتبع الادوية.</h5>
                                    <form method="POST" action="{{ route('register') }}">
                                         @csrf
                                         <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label> اسم المستخدم</label> 
                                                <input class="form-control" name="name" value="{{old('name')}}" type="text" required autofocus placeholder="اسم المستخدم">
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('name')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label> البريد الالكتروني</label> 
                                                <input class="form-control" name="email" value="{{old('email')}}" type="email" required autofocus placeholder="البريد الالكتروني ">
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('email')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>كلمة المرور</label> 
                                                <input class="form-control" 
                                                type="password"
                                                name="password"
                                                required >
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('password')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>تأكيد كلمة المرور</label> 
                                                <input class="form-control" 
                                                type="password"
                                                name="password_confirmation"
                                                required >
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('password_confirmation')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-main-primary btn-block">تسجيل الدخول</button>
                                            </div>
                                        </div>
                                        <div class="row row-xs">
                                            <div class="col-sm-6">
                                                <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
                                            </div>
                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="main-signup-footer mt-5">
                                        <p>  لديك حساب بالفعل ? <a href="{{ route('login') }}">تسجيل الدخول</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->

        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-5 d-none d-md-flex bg-white">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="{{URL::asset('admin_assets/img/user_register.jfif')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
     
@endsection
    
