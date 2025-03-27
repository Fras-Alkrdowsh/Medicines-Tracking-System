@extends('admin.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link rel="stylesheet" href="{{ URL::asset('admin_assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

    <!-- Internal Select2 css -->
    <link href="{{URL::asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
   


    
@endsection
@section('title')
   اضافة بدائل للأدوية
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الأدوية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة بدائل للأدوية</span>
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
                <form action="{{route('pharmacist.store-alternatives')}}" method="post" autocomplete="off">
                    @csrf
                    

                    <div class="row">
                      

                        <div class="col-6">
                            <label>تحديد الدواء</label>
                            <select class="form-control" name="drug_id" required>
                                @foreach ($medicines as $medicine)
                                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label>تحديد البديل</label>
                            <select class="form-control testselect2" name="alternatives[]" multiple="multiple"  required>
                                @foreach ($medicines as $medicine)
                                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                @endforeach
                            </select>
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
    <script src="{{ URL::asset('admin_assets/js/select2.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/advanced-form-elements.js') }}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('admin_assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('admin_assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('admin_assets/plugins/notify/js/notifit-custom.js')}}"></script>


    <!--Internal  Datepicker js -->
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('admin_assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('admin_assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('admin_assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <!-- Ionicons js -->
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('admin_assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('admin_assets/js/form-elements.js')}}"></script>
@endsection