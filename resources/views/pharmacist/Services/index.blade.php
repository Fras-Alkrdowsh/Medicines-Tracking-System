@extends('admin.layouts.master')
@section('title')
خدمات الصيدلية
@stop
@section('css')
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الخدمات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جميع الخدمات</span>
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

                    <a href="{{route('pharmacist.Service.create')}}" class="btn btn-primary" role="button"
                       aria-pressed="true">اضافة خدمة جديدة</a>
                    

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example-delete" class="table text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الخدمة</th>
                                <th>سعر الخدمة</th>
                                <th>نوع الخدمة</th>
                                <th>الوصف</th>
                                <th>حالة الخدمة</th>
                                <th>تاريخ الأضافة</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                  
                                    <td class="text-primary">{{ $service->name }}</td>
                                    <td>{{ $service->price }}</td>
                                    <td>{{ $service->type }}</td>

                                    <td>{{ $service->description }}</td>
                                    <td>
                                        <div
                                            class="dot-label bg-{{$service->status == 'enable' ? 'success':'danger'}} ml-1"></div>
                                        {{$service->status == 'enable' ? 'مفعل':'غير مفعل'}}
                                    </td>
                                    <td>{{ $service->created_at->diffForHumans()}}</td>
                                  
                                   
                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">العمليات<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('pharmacist.Service.edit',$service->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$service->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$service->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @include('pharmacist.Services.delete')
                                @include('pharmacist.Services.update_status')

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