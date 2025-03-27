<div>
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" wire:model="searchInput" placeholder="ادخل اسم الصيدلية.....">
                        <span class="input-group-append">
                            <button class="btn ripple btn-primary" wire:click="getPharmacy()" type="button">بحث</button>
                        </span>
                    </div>
                    <div class="mb-2">
                        <a href="#" class="h4 card-title">ايجاد تفاصيل الصيدلية</a>
                    </div>
                    <p class="mb-0 text-muted">عند ادخال اسم الصيدلية في حقل البحث سيقوم النظام بايجاد تفاصيل الصيدلية وخدماتها وعرضها هنا.</p>
                    <div wire:ignore class="ht-450 mt-3" id="map"></div>


                    <div class="card-body h-100">
                        @if ($pharmacies)
                        <div class="row row-sm ">
                            <div class=" col-xl-5 col-lg-12 col-md-12">
                                <div class="preview-pic tab-content ">
                                    <div class="tab-pane active" id="pic-1"><img src="{{URL::asset('admin_assets/img/pharmacy.jfif')}}" alt="image"/></div>                                                              
                                </div>
                                
                            </div>
                           
                            <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                <h4 class="product-title mb-1">{{$pharmacies->name}}</h4>
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
                                <h6 class="price"> البريد الالكتروني: </h6>
                                <p class="product-description mb-3">{{$pharmacies->email}}.</p>
                                <h6 class="price">  رقم الهاتف: </h6>
                                <p class="product-description mb-3">{{$pharmacies->Phone}}.</p>
                                <h6 class="price">  العنوان: </h6>
                                <p class="product-description mb-3">{{$pharmacies->address}}.</p>
                                
                                
                                
                            </div>
                        </div> 
                        @endif
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>
                @if ($pharmacies)
                <div class="my-auto ">
                    <div class="d-flex">
                        <h4 class="content-title mb-3">الخدمات الخاصة بالصيدلية</h4>
                    </div>
                </div>
                    <!-- row -->
                    @forelse ($pharmacies->services as $pharmacy)
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card item-card">
                                <div class="card-body pb-0 h-100">
                                    <div class="text-center">
                                        <img src="{{URL::asset('admin_assets/img/servies.jfif')}}" alt="img" class="img-fluid"> 
                                    </div>
                                    <h6 class="price"> اسم الخدمة: </h6>
                                    <p class="product-description mb-3">{{$pharmacy->name}}.</p>
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
                                    <h6 class="price"> نوع الخدمة: </h6>
                                    <p class="product-description mb-3">{{$pharmacy->type}}.</p>
                                    <h6 class="price"> الوصف الخاص بالخدمة: </h6>
                                <p class="product-description mb-3">{{$pharmacy->description}}.</p>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    @empty
                    <div class="col-12">
                        <div class=" alert alert-info text-center">
                            لا يوجد خدمات لعرضها.
                        </div>
                    </div>
                    @endforelse
                    
                    <!-- /row -->
                @endif
    
                    
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                      Livewire.on('confirm', (event) => {
                          var pharmacies = event.pharmacy;
                              console.log(pharmacies.name);
                  
                              L.marker([pharmacies.latitude, pharmacies.longitude])
                                  .addTo(map)
                                  .bindPopup('<h5>عنوان الصيدلية: ' + pharmacies.address + '<br></h5>' +
                                  '<h5>اسم الصيدلية: ' + pharmacies.name+'<br></h5>'
                              );
                          });
                      });
                  </script>