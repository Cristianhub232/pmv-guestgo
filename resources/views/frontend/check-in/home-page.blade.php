@extends('frontend.layouts.frontend')

@section('content')
    <section id="pm-banner-1" class="pm-banner-section-1 position-relative custom-css">
         @if(!auth()->user())
         <div class="container">
            <div class="pm-banner-content position-relative">
                <div class="pm-banner-text pm-headline pera-content">
                    <span class="pm-title-tag">&nbsp;&nbsp;&nbsp;&nbsp;{{setting('site_name')}}</span>
                    <br><br>
                    <h2>Iniciar Sesión</h2>
                    <p>Por favor inicie sesión para continuar dentro de nuestro sistema de recepción de visitantes</p>
                    <div class="d-flex">
                        <div class="ei-banner-btn">
                            <a href="{{ route('login') }}">
                                <span>Iniciar Sesión</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pm-banenr-img position-absolute d-flex justify-content-end">
                    <img src="{{asset('images/quick-pass.png')}}" styles="width:30px" alt="">
                </div>
            </div>
            <hr class="hr-line">
         </div>
         @else
         <div class="container">
            <div class="pm-banner-content position-relative custom-css">
                <div class="pm-banner-text pm-headline pera-content">
                    <span class="pm-title-tag">&nbsp;&nbsp;&nbsp;&nbsp;{{setting('site_name')}}</span>
                    <br><br>
                    <p>Seleccione las opciones pertinentes</p>
                    <div class="d-flex">
                        <div class="ei-banner-btn">
                            <a href="{{ route('check-in.return') }}">
                                <span>Registrar Visitante</span>
                            </a>
                        </div>
                        <div class="ei-banner-btn ml-2">
                            <a href="{{ route('checkout.index') }}">
                                <span>Registrar Salida</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pm-banenr-img position-absolute d-flex justify-content-end">
                    <img src="{{asset('images/quick-pass.png')}}" alt="">
                </div>
            </div>
            <hr class="hr-line">
            <div class="d-flex justify-content-center footer-text pb-3">
                <span> {{setting('site_footer')}}</span>
            </div>
        </div>
         @endif
    </section>
@endsection

