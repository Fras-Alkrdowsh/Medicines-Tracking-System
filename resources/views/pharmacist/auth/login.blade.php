@extends('admin.layouts.master2')
@section('css')
<!-- Sidemenu-responsive-tabs css -->
<link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

<link href="{{URL::asset('admin_assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
@include('admin.messages_alert')

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
                                    <h2 class="text-primary">سجل الدخول</h2>
                                    <h5 class="font-weight-normal mb-4"> مرحبا بعودتك من جديد.</h5>
                                    <form method="POST" action="{{ route('pharmacist.login') }}">
                                         @csrf
                                                <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label> رقم الهاتف/البريد الالكتروني</label> 
                                                <input class="form-control" name="login" :value="old('login')" required autofocus placeholder="البريد الالكتروني او رقم الهاتف">
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('login')
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
                                        </div>
                                    
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-main-primary btn-block">تسجيل الدخول</button>
                                            </div>
                                        </div>
                                        <div class="row row-xs">
                                            <div class="col-sm-6">
                                                <button class="btn btn-block"><i class="fab fa-facebook-f"></i> التسجيل باستخدام فيسبوك</button>
                                            </div>
                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> التسجيل باستخدام تويتر</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="main-signup-footer mt-5">
                                        <p> ليس لديك حساب ? <a href="{{ route('pharmacist.register') }}">سجل الان</a></p>
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
                    <img src="{{URL::asset('admin_assets/img/pharmacist_login.avif')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{URL::asset('admin_assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection




