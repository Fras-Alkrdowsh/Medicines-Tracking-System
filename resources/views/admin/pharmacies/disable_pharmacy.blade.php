@extends('admin.layouts.master')
@section('title')
طلبات التسجيل@stop
@section('css')
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الصيدليات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     طلبات التسجيل</span>
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

                  

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example-delete" class="table text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الصيدلية</th>
                                <th>شعار الصيدلية</th>
                                <th>البريد الألكتروني</th>
                                <th>رقم الهاتف</th>
                                <th>الموقع</th>
                                <th>حالة الصيدلية</th>
                                <th>معرف الشهادة</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pharmacies as $pharmacy)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                  
                                    <td>{{ $pharmacy->name }}</td>
                                    <td>
                                        @if($pharmacy->image)
                                            <img src="{{Url::asset('admin_assets/img/pharmacys/'.$pharmacy->image->path)}}"
                                                 height="30px" width="30px" alt="" >

                                        @else
                                            <img src="{{URL::asset('admin_assets/img/pharmacy.jfif')}}" height="40px"
                                                 width="40px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $pharmacy->email }}</td>
                                    <td>{{ $pharmacy->Phone}}</td>
                                    <td>{{ $pharmacy->address}}</td>
                                    {{-- <td>
                                        @foreach($pharmacy->doctorappointments as $appointment)
                                            {{$appointment->name}}
                                        @endforeach
                                    </td> --}}
                                    <td>
                                        <div
                                            class="dot-label bg-{{$pharmacy->status == 'enable' ? 'success':'danger'}} ml-1"></div>
                                        {{$pharmacy->status == 'enable' ? 'مفعل':'غير مفعل'}}
                                    </td>

                                    <td>{{ $pharmacy->certificateId }}</td>

                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">العمليات<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('admin.Pharmacies.edit',$pharmacy->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$pharmacy->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$pharmacy->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @include('admin.pharmacies.delete')
                                @include('admin.pharmacies.update_status') 
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