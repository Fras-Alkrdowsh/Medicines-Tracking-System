<div>
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-body">
                <div class="input-group mb-4">
                    <input type="text" class="form-control" wire:model="searchInput" placeholder="ادخل اسم الدواء.....">
                    <span class="input-group-append">
                        <button class="btn ripple btn-primary" wire:click="getAlternative()" type="button">بحث</button>
                    </span>
                </div>
                <div class="mb-2">
                    <a href="#" class="h4 card-title">ايجاد بديل الدواء</a>
                </div>
                <p class="mb-0 text-muted">عند ادخال اسم الدواء في حقل البحث سيقوم النظام بايجاد بدائل الدواء وعرضها هنا.</p>
                <div class="card-body h-100">
                    @if ($medicines)
                    <div class="row row-sm ">
                        <div class=" col-xl-5 col-lg-12 col-md-12">
                            <div class="preview-pic tab-content">
                                @if($medicines->image)
                                <div class="tab-pane active" id="pic-1"><img src="{{URL::asset('admin_assets/img/medicines/'.$medicines->image->path)}}" alt="image"/></div>

                                
                                @else
                             <div class="tab-pane active" id="pic-1"><img src="{{URL::asset('admin_assets/img/medicine.jfif')}}" alt="image"/></div>

              
                                 @endif                            
                            </div>
                            
                        </div>
                       
                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <h4 class="product-title mb-1">{{$medicines->name}}</h4>
                            <div class="rating mb-1">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star text-muted"></span>
                                    <span class="fa fa-star text-muted"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                            <h6 class="price">الوصف الخاص بالدواء: </h6>
                            <p class="product-description mb-3">{{$medicines->description}}.</p>
                            
                            
                            
                        </div>
                    </div> 
                    @endif
                   
                </div>
            </div>
        </div>
        
    </div>
</div>
			@if ($medicines)
            <div class="my-auto ">
                <div class="d-flex">
                    <h4 class="content-title mb-3">البدائل الخاصة بالدواء</h4>
                </div>
            </div>
            @forelse ($medicines->alternatives as $medicine)
                
            <div class="row">
                <div class="col-lg-3">
                    <div class="card item-card">
                        <div class="card-body pb-0 h-100">
                            <div class="text-center">
                                @if($medicines->image)
                                <img src="{{URL::asset('admin_assets/img/medicines/'.$medicine->image->path)}}" alt="img" class="img-fluid">


                            
                                @else
                                <img src="{{URL::asset('admin_assets/img/medicine.jfif')}}" alt="img" class="img-fluid">


          
                               @endif  
                            </div>
                            <div class="card-body cardbody relative">
                                <div class="cardtitle">
                                    <span>اسم الدواء</span>
                                    <a>{{$medicine->name}}</a>
                                </div>
                                
                            </div>
                            <div class="rating mb-1">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star text-muted"></span>
                                    <span class="fa fa-star text-muted"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            @empty
            <div class="col-12">
                <div class=" alert alert-info text-center">
                    لا يوجد بدائل لعرضها.
                </div>
            </div>
            @endforelse
              
            @endif

				
            </div>