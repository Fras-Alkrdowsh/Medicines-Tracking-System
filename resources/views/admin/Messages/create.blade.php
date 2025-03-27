@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('admin_assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{URL::asset('admin_assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

    <!-- Internal Select2 css -->
<!-- Internal Select2 css -->
<link href="{{URL::asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
<style>
	.panel{
		display: none;
	}
</style>
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">البريد</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ارسال بريد </span></div>
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
								<h3 class="card-title">انشاء بريد جديد</h3>
							</div>
							<div class="card-body">
								<form action="{{route('admin.Messages.store')}}" method="post" autocomplete="off">
									@csrf
									
										<div class="form-group">
										<div class="row align-items-center">
											<label class="col-sm-2">المستقبل</label>
											<div class="col-sm-10">
												<select name="reseive_type" id="selectResever" class="form-control">
													<option value="" selected disabled>حدد المستقبلين</option>
													<option value="users">المستخدمين</option>
													<option value="pharmacists">الصيدليات</option>
												</select>
											</div>
										</div>
									</div>
									<div class="panel" id="users">

									<div class="form-group">
										<div class="row align-items-center">
											<label class="col-sm-2">الى</label>
											<div class="col-sm-10">
												<select class="form-control testselect2" name="recipients[]" multiple="multiple">
													<option value="">الجميع</option>
													@foreach ($users as $user)
													<option value="{{$user->id}}">{{$user->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									</div>
									<div class="panel" id="pharmacists">
									<div class="form-group">
										<div class="row align-items-center">
											<label class="col-sm-2">الى</label>
											<div class="col-sm-10">
												<select  class="form-control testselect2" name="recipients[]" multiple="multiple">
													<option value="">الجميع</option>
													@foreach ($pharmacists as $pharmacist)
													<option value="{{$pharmacist->id}}">{{$pharmacist->name}}</option>
													@endforeach
												</select>

											</div>
										</div>
									</div>
								</div>
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
												<textarea rows="5" cols="10" class="form-control" name="message"></textarea>
											</div>
										</div>
									</div>
							</div>
							<div class="card-footer d-sm-flex">
								
								<div class="btn-list mr-auto">
									
									<button  class="btn btn-danger btn-space">ارسال</button>
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
<script>
	$('#selectResever').change(function(){
		var myId=$(this).val();
		$('.panel').each(function(){
			myId ===$(this).attr('id')?$(this).show():$(this).hide();
		})
	})
</script>
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
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('admin_assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<!-- Ionicons js -->
<!--Internal  pickerjs js -->
<script src="{{URL::asset('admin_assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('admin_assets/js/form-elements.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/raphael/raphael.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('admin_assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/js/select2.js')}}"></script>
@endsection