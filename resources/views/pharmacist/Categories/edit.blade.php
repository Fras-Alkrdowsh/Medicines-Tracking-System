@extends('admin.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
   اضافة مجموعة ادوية جديدة
@endsection
<style>
    #category_image {
  display: none;
}
</style>
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">مجموعات الأدوية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل مجموعة أدوية</span>
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
                <form action="{{route('pharmacist.Category.update',$category->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col">
                            <label>اسم المجموعة</label>
                            <input type="text" name="name"  value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror " required>
                        </div>

                       
                    </div>
                    <br>

                   
                    <div class="row">
                        <div class="col">
                            <label>الوصف</label>
                            <textarea rows="5" cols="10" class="form-control"  name="description">{{$category->description}}</textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-2">
                            <label for="category_image" class="btn btn-success">تعديل الصورة</label>
                             <input class="form-control form-control-lg" id="category_image" name='category_image' type="file">

                        </div>
                        <div class="col-2">
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