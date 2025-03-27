@extends('admin.layouts.master2')
@section('css')

<!-- Sidemenu-responsive-tabs css -->
<link href="{{URL::asset('admin_assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
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
                                    <h5 class="font-weight-normal mb-4">مرحبا بك في نظام تتبع الادوية ستصلك رسالة عند اتمام الطلب.</h5>
                                    <form method="POST" action="{{ route('pharmacist.register') }}">
                                         @csrf
                                                <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>اسم الصيدلية</label> 
                                                <input class="form-control" name="name" value="{{old('name')}}" placeholder="ادخل اسم الصيدلية" type="text" required>
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('name')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>البريد الالكتروني</label> 
                                                <input class="form-control" placeholder="ادخل البريد الالكتروني" type="email" name="email" value="{{old('email')}}" required>
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('email')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>رقم التواصل</label> 
                                                <input class="form-control" placeholder="ادخل رقم التواصل" type="text" name="Phone" value="{{old('Phone')}}" required>
                                           
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('Phone')
                                                        {{$message}}
                                                    @enderror
                                                </div> </div>
                                            <div class="form-group col-md-6">
                                                <label>معرف الشهادة</label> 
                                                <input class="form-control" placeholder="ادخل معرف الشهادة" type="text" name="certificateId" value="{{old('certificateId')}}" required >
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('certificateId')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>كلمة المرور</label> 
                                                <input class="form-control" placeholder="ادخل كلمة المرور"  type="password" name="password" required>
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('password')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>تأكيد كلمة المرور</label> 
                                                <input class="form-control" placeholder="تأكيد كلمة المرور" type="password" name="password_confirmation" required>
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('password_confirmation')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>العنوان</label> 
                                                <input class="form-control" placeholder="ادخل العنوان الخاص بك" type="text" name="address" value="{{old('address')}}" required id="searchInput"> 
                                                <div id="emailHelp" class="form-text text-danger">
                                                    @error('address')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <p class="btn btn-main-primary mt-4" onclick="searchLocation()">بحث</p>
                                            </div>
                                        </div>
                                        <input type="hidden" name="latitude" value="{{old('latitude')}}" id="lat">
                                        <input type="hidden" name="longitude" value="{{old('longitude')}}" id="long">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-main-primary btn-block">تسجيل الحساب</button>
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
                                        <p>لديك حساب بالفعل ? <a href="{{ route('pharmacist.login') }}">سجل الدخول</a></p>
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
                    <img src="{{URL::asset('admin_assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

     <script>
        // إنشاء خريطة Leaflet
         let latituded = document.getElementById("lat");
            let longtuded = document.getElementById("long");
       
    
        function searchLocation() {
           
    
    
            const locationName = $('#searchInput').val();
           
            const url = 'https://nominatim.openstreetmap.org/search?q='+locationName+'&format=json&limit=1';
    
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response:', data); // عرض محتوى الرد في وحدة التحكم
    
                    if (data && data.length > 0 && data[0].lat && data[0].lon) {
                        const lat = data[0].lat;
                        const lon = data[0].lon;
                       
                            latituded.value = lat; 
                            longtuded.value = lon; 
                            alert('address added successfully');
                    } else {
                        console.error('No data found for the location entered.');
                        alert('No data found for the location entered. Please try a different location.');
                    }
                })
                .catch(error => {
                    console.error('Failed to fetch data from OpenStreetMap.', error);
                    alert('Failed to fetch data from OpenStreetMap. Please check your internet connection and try again.');
                });
        }
    </script>
@endsection


