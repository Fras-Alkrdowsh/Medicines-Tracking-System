@extends('admin.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
   اضافة خدمة جديدة
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل خدمة </span>
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
                <form action="{{route('pharmacist.Service.update',$service->id)}}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <label>اسم الخدمة</label>
                            <input type="text" name="name"  value="{{$service->name}}" class="form-control @error('name') is-invalid @enderror " required>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label>سعر الخدمة</label>
                            <input type="number" name="price"  value="{{$service->price}}" class="form-control @error('price') is-invalid @enderror" required>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('price')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>


                       

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label>نوع الخدمة</label>
                            <input class="form-control " name="type" placeholder="" value="{{$service->type}}"
                             type="text" required>
                             <div id="emailHelp" class="form-text text-danger">
                                @error('type')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        

                      
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>الوصف</label>
                            <textarea rows="5" cols="10" class="form-control" name="description">{{$service->description}}</textarea>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('description')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>

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
@endsection