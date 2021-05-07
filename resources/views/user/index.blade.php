@extends('layouts.app')
@section('content')
 {{--Start of hero section--}}
    <section id="hero-section" style="background-image: url('/images/hero.webp')">
           <div class="col-12 col-md-4 offset-md-2">
                <div class="hero-content">
                    <h1>2021 <span>Autumn Collection</span></h1>
                    <div class="hero-btns">
                        <a href="{{ route('user.shop') }}" class="shop-now">Shop Now</a>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                </div>
           </div>
    </section>
 {{--End of hero section--}}

 {{--Start showcase sections--}}
    <div id="showcase-section">
        <div class="container">
            <div class="showcase-container">
                <div class="single-showcase">
                    <div class="showcase-icon">
                        <p><i class="fas fa-globe-europe"></i></p>
                    </div>
                    <div class="showcase-text">
                        <p>FREE SHIPPING</p>
                        <span>on all orders over 90$</span>
                    </div>
                </div>
                <div class="single-showcase">
                    <div class="showcase-icon">
                        <p><i class="fas fa-mobile-alt"></i></p>
                    </div>
                    <div class="showcase-text">
                        <p>CALL US ANYTIME</p>
                        <span>+04786445953</span>
                    </div>
                </div>
                <div class="single-showcase">
                    <div class="showcase-icon">
                        <p><i class="fas fa-map-marked-alt"></i></p>
                    </div>
                    <div class="showcase-text">
                        <p>OUR LOCATION</p>
                        <span>557-6308 Lacinia Road. NYC</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
 {{--End showcase sections--}}
@endsection