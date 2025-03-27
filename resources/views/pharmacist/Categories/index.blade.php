@extends('admin.layouts.master')
@section('title')
مجموعات الخدمات@stop
@section('css')
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">مجموعات الأدوية</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جميع المجموعات</span>
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

                    <a href="{{route('pharmacist.Category.create')}}" class="btn btn-primary" role="button"
                       aria-pressed="true">اضافة مجموعة جديدة</a>
                    

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example-delete" class="table text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المجموعة</th>
                                <th>شعار المجموعة</th>
                                <th>الوصف</th>
                                <th>تاريخ الأضافة</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                  
                                    <td><a href="{{route('pharmacist.Category.show',$category->id)}}">{{ $category->name }}</a></td>
                                    <td>
                                        {{-- {{dd($category->image->path)}} --}}
                                        @if($category->image)
                                            <img src="{{URL::asset('admin_assets/img/categories/'.$category->image->path)}}"
                                                 height="50px" width="50px" alt="" >

                                        @else
                                            <img src="{{URL::asset('admin_assets/img/category.jfif')}}" height="50px"
                                                 width="70px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->created_at->diffForHumans()}}</td>
                                  
                                   
                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">العمليات<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('pharmacist.Category.edit',$category->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$category->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @include('pharmacist.Categories.delete')
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