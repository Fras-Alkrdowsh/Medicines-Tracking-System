@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('user_assests/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">البريد</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تواصل مع الدعم</span></div>
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
@include('admin.messages_alert')

				<!-- row opened -->
				<div class="row row-sm">
					
					<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">تواصل مع الدعم</h3>
							</div>
							<div class="card-body">
								<form action="{{route('Messages.store')}}" method="post" autocomplete="off">
									@csrf
									<div class="form-group">
										<div class="row align-items-center">
											<label class="col-sm-2">الموضوع</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="subject">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row ">
											<label class="col-sm-2">المحتوى</label>
											<div class="col-sm-10">
												<textarea rows="10" class="form-control" name="message"></textarea>
											</div>
										</div>
									</div>
							</div>
							<div class="card-footer d-sm-flex">
							
								<div class="btn-list mr-auto">
									
									<button class="btn btn-danger btn-space">ارسال</button>
								</div>
							</div>
						</form>

						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Moment js -->
<script src="{{URL::asset('user_assests/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('user_assests/plugins/notify/js/notifit-custom.js')}}"></script>


@endsection