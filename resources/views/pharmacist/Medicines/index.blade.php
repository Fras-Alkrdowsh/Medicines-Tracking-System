@extends('admin.layouts.master')
@section('title')
الأدوية@stop
@section('css')
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الأدوية</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جميع الأدوية</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('admin.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                    <a href="{{route('pharmacist.Medicine.create')}}" class="btn btn-primary" role="button"
                       aria-pressed="true">اضافة دواء جديد</a>
                    

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example-delete" class="table text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الدواء</th>
                                <th>الصورة</th>
                                <th>مجموعة الدواء</th>
                                <th>الوصف</th>
                                <th>الكمية</th>
                                <th>تاريخ الصلاحية</th>
                                <th>تاريخ الاضافة</th>
                                <th>العمليات</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medicines as $medicine)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                  
                                    <td><a href="{{route('pharmacist.Medicine.show',$medicine->id)}}">{{ $medicine->name }}</a></td>
                                    <td>
                                        @if($medicine->image)
                                            <img src="{{Url::asset('admin_assets/img/medicines/'.$medicine->image->path)}}"
                                                 height="50px" width="50px" alt="" >

                                        @else
                                            <img src="{{URL::asset('admin_assets/img/medicine.jfif')}}" height="65px"
                                                 width="90px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $medicine->category->name }}</td>
                                    <td>{{ $medicine->description }}</td>
                                    <td>{{ $medicine->quantity }}</td>
                                    <td>{{ $medicine->expirationDate }}</td>

                                    <td>{{ $medicine->created_at->diffForHumans()}}</td>
                                  
                                   
                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">العمليات<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('pharmacist.Medicine.edit',$medicine->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$medicine->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @include('pharmacist.Medicines.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('admin_assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('admin_assets/plugins/notify/js/notifit-custom.js')}}"></script>

   



@endsection