
@extends('admin.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
   
@endsection
@section('title')
تعديل بيانات الصيدلية@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الصيدليات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل بيانات الصيدلية</span>
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
                <form action="{{route('admin.Pharmacies.update',$pharmacy)}}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <label>اسم الصيدلية</label>
                            <input type="text" name="name"  value="{{$pharmacy->name}}" class="form-control @error('name') is-invalid @enderror " required>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label>البريد الالكتروني</label>
                            <input type="email" name="email"  value="{{$pharmacy->email}}" class="form-control @error('email') is-invalid @enderror" required>
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
                            <input type="text" name="Phone" value="{{$pharmacy->Phone}}" class="form-control" required>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('phone')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label>معرف الشهادة</label>
                            <input class="form-control fc-datepicker" name="certificateId" placeholder="" value="{{$pharmacy->certificateId}}"
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
                            <input class="form-control fc-datepicker" id="searchInput" name="address" placeholder="" value="{{$pharmacy->address}}"
                                type="text" required>
                                <div id="emailHelp" class="form-text text-danger">
                                    @error('address')
                                        {{$message}}
                                    @enderror
                                </div>
                        </div>
                        
                        <p class="btn btn-success" onclick="searchLocation()">بحث</p>


                    </div>
                    <input type="hidden" name="latitude" id="lat" value="{{$pharmacy->latitude}}">
                    <input type="hidden" name="longitude" id="long" value="{{$pharmacy->longitude}}">

                    <div id="map" style="height: 480px"></div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success">تعديل البيانات</button>
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


    


    
   
@endsection