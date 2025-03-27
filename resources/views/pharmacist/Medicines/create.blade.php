@extends('admin.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
   اضافة دواء جديد
@endsection
<style>
    #medicine_image {
  display: none;
}
</style>
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الأدوية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة دواء جديد</span>
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
                <form action="{{route('pharmacist.Medicine.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label>اسم الدواء</label>
                            <input type="text" name="name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror " required>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label>الكمية</label>
                            <input type="number" name="quantity"  value="{{old('quantity')}}" class="form-control @error('quantity') is-invalid @enderror" required>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('quantity')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>


                       

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label>تاريخ الصلاحية</label>
                            <input class="form-control fc-datepicker" value="{{old('expirationDate')}}" name="expirationDate" placeholder="YYYY-MM-DD"
                             type="text" required>
                             <div id="emailHelp" class="form-text text-danger">
                                @error('expirationDate')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label>مجموعة الادوية</label>
                            <select class="form-control" name="category_id" required>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>

                      
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>الوصف</label>
                            <textarea rows="5" cols="10" class="form-control" name="description">{{old('description')}}</textarea>
                            <div id="emailHelp" class="form-text text-danger">
                                @error('description')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-2">
                            <label for="medicine_image" class="btn btn-success">اضافة صورة</label>
                             <input class="form-control form-control-lg" id="medicine_image" name='medicine_image' type="file">

                        </div>
                        <div class="col-2">
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
    <script src="{{ URL::asset('admin_assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
    <script src="{{URL::asset('admin_assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('admin_assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection