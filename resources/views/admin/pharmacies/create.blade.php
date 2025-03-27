
@extends('admin.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
   
@endsection
@section('title')
اضافة صيدلية جديدة
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الصيدليات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة صيدلية جديدة</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('admin.messages_alert')
<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.Pharmacies.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label>اسم الصيدلية</label>
                            <input type="text" name="name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror " required>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label>البريد الالكتروني</label>
                            <input type="email" name="email"  value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" required>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>


                       

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label>رقم الهاتف</label>
                            <input type="text" name="Phone" value="{{old('Phone')}}" class="form-control" required>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('phone')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label>معرف الشهادة</label>
                            <input class="form-control " name="certificateId" value="{{old('certificateId')}}" placeholder=""
                             type="text" required>
                             <div id="emailHelp" class="form-text text-danger">
                                @error('certificateId')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        
                    </div>

                    <br>

                    <div class="row mb-3">
                       <div class="col-6">
                            <label>العنوان </label>
                            <input class="form-control " id="searchInput" name="address" placeholder="Enter your address" value="{{old('address')}}"
                                type="text" required>
                                <div id="emailHelp" class="form-text text-danger">
                                    @error('address')
                                        {{$message}}
                                    @enderror
                                </div>
                        </div>
                        
                        <p class="btn btn-success" onclick="searchLocation()">بحث</p>


                    </div>
                    <input type="hidden" name="latitude" value="{{old('latitude')}}" id="lat">
                    <input type="hidden" name="longitude" value="{{old('longitude')}}" id="long">

                    <div id="map" style="height: 480px"></div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success">حفظ البيانات</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

    <!--Internal  Datepicker js -->
    
    <script src="{{URL::asset('admin_assets/plugins/notify/js/notifIt.js')}}"></script>
     <script src="{{URL::asset('admin_assets/plugins/notify/js/notifit-custom.js')}}"></script>


     <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
     <script>
         // إنشاء خريطة Leaflet
          let latituded = document.getElementById("lat");
             let longtuded = document.getElementById("long");
         const map = L.map('map').setView([33.5130695, 36.3095814], 13);
     
         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
             attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
         }).addTo(map);
     
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
                         console.log( lat, lon); // طباعة الإحداثيات في وحدة التحكم
                         L.marker([lat, lon]).addTo(map)
                             .bindPopup(locationName)
                             .openPopup();
                             latituded.value = lat; // Replace with the desired latitude value
                             longtuded.value = lon; 
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