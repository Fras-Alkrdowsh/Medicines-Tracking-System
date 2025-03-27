@extends('admin.layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">البريد </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ البريد الوارد</span></div>
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
				<!-- row opened -->
				<div class="row row-sm">
					@forelse ($messages as $message)
						<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">بريد وارد  <span class="badge badge-primary">inbox</span></h4>
								</div>
								<div class="card-body">
									<div class="email-media">
										<div class="mt-0 d-sm-flex">
											<img class="ml-2 rounded-circle avatar-xl" src="{{URL::asset('admin_assets/img/faces/6.jpg')}}" alt="avatar">
											<div class="media-body">
												<div class="float-left d-none d-md-flex fs-15">
													<span class="mr-3">{{ $message->created_at->diffForHumans()}}</span>
													<small class="mr-3"><i class="bx bx-star tx-18" data-toggle="tooltip" title="" data-original-title="Rated"></i></small>
													<small class="mr-3"><i class="bx bx-reply tx-18" data-toggle="tooltip" title="" data-original-title="Reply"></i></small>
													<div class="mr-3">
														<a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal  tx-18" data-toggle="tooltip" title="" data-original-title="View more"></i></a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#">Reply</a>
															<a class="dropdown-item" href="#">Report Spam</a>
															<a class="dropdown-item" href="#">Delete</a>
															<a class="dropdown-item" href="#">Show Original</a>
															<a class="dropdown-item" href="#">Print</a>
															<a class="dropdown-item" href="#">Filter</a>
														</div>
													</div>
												</div>
												<div class="media-title  font-weight-bold mt-3">{{$message->receiveable_id}} <span class="text-muted">{{$message->receiveable_id}}</span></div>
												<p class="mb-0">to Adam Cotter ( adamcotter@gmail.com ) </p>
												<small class="mr-2 d-md-none">Dec 13 , 2018 12:45 pm</small>
												<small class="mr-2 d-md-none"><i class="fe fe-star text-muted" data-toggle="tooltip" title="" data-original-title="Rated"></i></small>
												<small class="mr-2 d-md-none"><i class="fa fa-reply text-muted" data-toggle="tooltip" title="" data-original-title="Reply"></i></small>
											</div>
										</div>
									</div>
									<div class="eamil-body mt-5">
										<h6>{{$message->subject}}</h6>
										<p>{{$message->message}}. </p>
										<p class="mb-0">Thanking you Sir</p>
										<hr>
									</div>
								</div>
								<div class="card-footer text-left">
									<a class="btn btn-primary mt-1 mb-1" href="#"><i class="fa fa-reply"></i> Reply</a>
									<a class="btn btn-info mt-1 mb-1" href="#"><i class="fa fa-share"></i> Forward</a>
								</div>
							</div>
						</div>
					@empty
						<div class="col-12">
							<div class=" alert alert-info text-center">
								لا يوجد رسائل لقرائتها.
							</div>
						</div>
					@endforelse
				</div>
			</div>
		</div>
@endsection
@section('js')
<!-- Moment js -->
<script src="{{URL::asset('admin_assets/plugins/raphael/raphael.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('admin_assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/js/select2.js')}}"></script>
@endsection