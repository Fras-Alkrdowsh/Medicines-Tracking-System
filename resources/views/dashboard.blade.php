@extends('layouts.master')
@section('css')
<!-- Morris.js Charts Plugin -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

@endsection

@section('page-header')	
			<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بعودتك  {{Auth::user()->name}}!</h2>
						  <p class="mg-b-0">{{Auth::user()->email}}</p>
						</div>
					</div>
					<div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">Customer Ratings</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						<div>
							<label class="tx-13">Online Sales</label>
							<h5>563,275</h5>
						</div>
						<div>
							<label class="tx-13">Offline Sales</label>
							<h5>783,675</h5>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->

@endsection

@section('content')
<div class="row">
	<livewire:medicine-search /> 

</div>

</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->			
@endsection

@section('js')
<script>
    const map = L.map('map').setView([33.5130695, 36.3095814], 13);
     
     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(map);
       
</script>
<!-- Moment js -->
{{-- <script src="{{URL::asset('user_assests/plugins/raphael/raphael.min.js')}}"></script>
<!-- Internal Piety js -->
<script src="{{URL::asset('user_assests/plugins/peity/jquery.peity.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('user_assests/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('user_assests/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('user_assests/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('user_assests/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('user_assests/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('user_assests/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<!-- Internal Map -->
<script src="{{URL::asset('user_assests/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('user_assests/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- Internal Chart js -->
<!--Internal  index js -->
<script src="{{URL::asset('user_assests/js/jquery.vmap.sampledata.js')}}"></script>	 --}}

@endsection