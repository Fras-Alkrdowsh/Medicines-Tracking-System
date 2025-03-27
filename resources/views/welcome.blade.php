

@extends('layouts.master2')
@section('css')
@endsection
@section('content')

<div class="container-fluid bg-white">
    
      <header class=" mt-3 ">
                      
                        @if (Route::has('login'))
                            <nav class="navbar navbar-expand-lg">
                                
                                 @auth('web')
                                    <a class="mr-4"
                                        href="{{ url('/dashboard') }}"
                                    >
                                        المستخدم
                                    </a>
                                @else
                                    <a class="mr-4"
                                        href="{{ route('login') }}"
                                    >
                                        تسجيل الدخول كمستخدم
                                    </a>

                                    @if (Route::has('register'))
                                        <a class="mr-4"
                                            href="{{ route('register') }}"
                                        >
                                            التسجيل كمستخدم
                                        </a>
                                    @endif
                                @endauth
                                @auth('admin')
                                    <a class="mr-4"
                                        href="{{ url('/admin/dashboard') }}"
                                    >
                                        الادمن
                                    </a>
                                @else
                                    <a class="mr-4"
                                        href="{{ route('admin.login') }}"
                                    >
                                    تسجيل الدخول كادمن
                                    </a>

                                   
                                @endauth
                                @auth('pharmacist')
                                    <a class="mr-4"
                                        href="{{ url('/pharmacist/dashboard') }}"
                                    >
                                    الصيدلية
                                    </a>
                                @else
                                    <a class="mr-4"
                                        href="{{ route('pharmacist.login') }}"
                                    >
                                    تسجيل الدخول كصيدلية
                                    </a>

                                    @if (Route::has('pharmacist.register'))
                                        <a class="mr-4"
                                            href="{{ route('pharmacist.register') }}"
                                        >
                                        التسجيل كصيدلية
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>
    <div class="row no-gutter">
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-7 bg-white">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="main-signup-header">
                                    <h2 class="text-primary">اكتشف الأدوية بسهولة - نظام تتبع الأدوية</h2>
                                    <h5 class="font-weight-normal mb-4" style="line-height: 1.8;">
                                        مرحبًا بكم في نظام تتبع الأدوية، المنصة المتكاملة التي تتيح لك الوصول إلى معلومات مفصلة ودقيقة عن آلاف الأدوية بكل سهولة. سواء كنت تبحث عن دواء معين، أو ترغب في معرفة البدائل المتاحة، فإن نظامنا يوفر لك كل ما تحتاجه في مكان واحد. استخدم محرك البحث المتقدم للوصول إلى النتائج بسرعة، أو تصفح الأدوية حسب الفئات الطبية. نضمن لك تجربة بحث سلسة وموثوقة، مع تحديثات مستمرة لتوفير أحدث المعلومات الطبية. ابدأ رحلتك الآن لاكتشاف الأدوية بثقة وسهولة
                                    </h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->

        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-5 d-none d-md-flex bg-white">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="{{URL::asset('admin_assets/img/start_page.jfif')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
     
@endsection
    



