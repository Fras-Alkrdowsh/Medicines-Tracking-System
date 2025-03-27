@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">مجموعات الأدوية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل {{$category->name}}</span>
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
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body h-100">
								<div class="row row-sm ">
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
											@if($category->image)
                                            
											<div class="tab-pane active" id="pic-1"><img src="{{URL::asset('admin_assets/img/categories/'.$category->image->path)}}" alt="image"/></div>

                                            
                                        @else
										<div class="tab-pane active" id="pic-1"><img src="{{URL::asset('admin_assets/img/category.jfif')}}" alt="image"/></div>

                                           
                                        @endif
										 </div>
									
									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
										<h4 class="product-title mb-1">{{$category->name}}</h4>
										<div class="rating mb-1">
											<div class="stars">
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star text-muted"></span>
												<span class="fa fa-star text-muted"></span>
											</div>
										</div>
										<p class="product-description">{{$category->description}}.</p>
										
										
										
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
                    @foreach ($medicines as $medicine)
                    <div class="col-lg-3">
						<div class="card item-card">
							<div class="card-body pb-0 h-100">
								<div class="text-center">
                                    @if($category->image)
                                    <img src="{{URL::asset('admin_assets/img/medicines/'.$category->image->path)}}" alt="img" class="img-fluid">

                                     @else
                                     <img src="{{URL::asset('admin_assets/img/medicine.jfif')}}" alt="img" class="img-fluid">

                                   
                                @endif
								</div>
								<div class="card-body cardbody relative">
									<div class="cardtitle">
										<span>اسم الدواء</span>
										<a>{{$medicine->name}}</a>
									</div>
									<div class="cardprice">
										<span class="cardtitle">الكمية المتوفرة</span>
										<span>{{$medicine->quantity}}</span>
									</div>
								</div>
							</div>
							<div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
								<a href="{{route('pharmacist.Medicine.show',$medicine->id)}}" class="btn btn-primary">عرض التفاصيل</a>
							</div>
						</div>
					</div>
                    @endforeach
					
					
				</div>
				<!-- /row -->

		
@endsection
@section('js')

@endsection