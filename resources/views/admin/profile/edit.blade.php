@extends('admin.layouts.master')
@section('css')
<!-- Internal Select2 css -->
@endsection
@section('page-header')
<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف الحساب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.profile.destroy') }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <h5>يرجى ادخال كلمة المرور لتأكيد عملية الحذف </h5>
                    <input type="hidden" value="1" name="page_id">
					<div class="col-md-9">
						<input  name="password" type="password" class="form-control"  placeholder="" value="">
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-danger">تأكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الملف الشخصي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل الملف الشخصي</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<!-- Col -->
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{URL::asset('admin_assets/img/admin.jfif')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{Auth::user()->name}}</h5>
												<p class="main-profile-name-text">{{Auth::user()->email}}</p>
											</div>
										</div>
										
										
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">Social</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-github"></i>
												</div>
												<div class="media-body">
													<span>Github</span> <a href="">github.com/spruko</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div>
												<div class="media-body">
													<span>Twitter</span> <a href="">twitter.com/spruko.me</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-info-transparent text-info">
													<i class="icon ion-logo-linkedin"></i>
												</div>
												<div class="media-body">
													<span>Linkedin</span> <a href="">linkedin.com/in/spruko</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-danger-transparent text-danger">
													<i class="icon ion-md-link"></i>
												</div>
												<div class="media-body">
													<span>My Portfolio</span> <a href="">spruko.com/</a>
												</div>
											</div>
										</div>
										<hr class="mg-y-30">
									
										
										
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label tx-13 mg-b-25">
									Conatct
								</div>
								<div class="main-profile-contact-list">
									<div class="media">
										<div class="media-icon bg-primary-transparent text-primary">
											<i class="icon ion-md-phone-portrait"></i>
										</div>
										<div class="media-body">
											<span>Mobile</span>
											<div>
												{{Auth::user()->phone}}
											</div>
										</div>
									</div>
									<div class="media">
										<div class="media-icon bg-success-transparent text-success">
											<i class="icon ion-logo-slack"></i>
										</div>
										<div class="media-body">
											<span>Email</span>
											<div>
												{{Auth::user()->email}}
											</div>
										</div>
									</div>
									<div class="media">
										<div class="media-icon bg-info-transparent text-info">
											<i class="icon ion-md-locate"></i>
										</div>
										<div class="media-body">
											<span>Current Address</span>
											<div>
												San Francisco, CA
											</div>
										</div>
									</div>
								</div><!-- main-profile-contact-list -->
							</div>
						</div>
					</div>

					<!-- Col -->
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<div class="mb-4 main-content-label">المعلومات الشخصية</div>
								<form class="form-horizontal" method="POST" action="{{ route('admin.profile.update') }}">
									@csrf
									@method('patch')
									<div class="mb-4 main-content-label">اسم المستخدم</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">اسم المستخدم</label>
											</div>
											<div class="col-md-9">
												<input type="text" name="name" class="form-control"  placeholder="User Name" value="{{Auth::user()->name}}">
											</div>
										</div>
									</div>
									
									<div class="mb-4 main-content-label">معلومات التواصل</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">البريد الألكتروني</label>
											</div>
											<div class="col-md-9">
												<input type="text" name="email" class="form-control"  placeholder="Email" value="{{Auth::user()->email}}">
											</div>
										</div>
									</div>
									
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">رقم الهاتف</label>
											</div>
											<div class="col-md-9">
												<input type="text" name="phone" class="form-control"  placeholder="phone number" value="{{Auth::user()->phone}}">
											</div>
										</div>
									</div>
									
									
									
								
							</div>
							<div class="card-footer text-left">
								<button  class="btn btn-primary waves-effect waves-light">تعديل البيانات</button>
							</div>
						</form>

						</div>
						<div class="card">
							<div class="card-body">
								<div class="mb-4 main-content-label">تغيير كلمة المرور</div>
								<form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
									@csrf
									@method('PUT')
									
									
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">كلمة المرور الحالية </label>
											</div>
											<div class="col-md-9">
												<input name="current_password" type="password" class="form-control"  placeholder="" value="">
											</div>
										</div>
									</div>
									
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">كلمة المرور الجديدة </label>
											</div>
											<div class="col-md-9">
												<input  name="password" type="password" class="form-control"  placeholder="" value="">
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">تأكيد كلمة المرور</label>
											</div>
											<div class="col-md-9">
												<input  name="password_confirmation" type="password" class="form-control"  placeholder="" value="">
											</div>
										</div>
									</div>
									
									
									
								
							</div>
							<div class="card-footer text-left">
								<button  class="btn btn-primary waves-effect waves-light">حفظ </button>
							</div>
						</form>

						</div>
						<div class="card">
							<div class="card-body">
								<div class="mb-4 main-content-label">حذف الحساب</div>
								{{-- <form class="form-horizontal" method="POST" action="{{ route('admin.profile.destroy') }}">
									@csrf
									@method('delete') --}}
									<p>بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائيًا. قبل حذف حسابك، يرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها.</p>
							
							</div>
							<div class="card-footer text-left">
								<button  class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#delete">حذف الحساب</button>
							</div>

						</div>
					</div>
					<!-- /Col -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('admin_assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Internal Select2.min js -->

@endsection