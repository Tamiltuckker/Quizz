@extends('layouts.frontend')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Home </h2>         
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Home Page Details Section ======= -->
    <section id="home-details" class="home-details">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="home-details-slider swiper">
              <div class="swiper-wrapper align-items-center">          
                <div class="swiper-slide">
                  <img src="{{ asset('frontend/assets/img/'.$home->image->image)}}" alt="">
                </div>         
              </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="home-info">                         
        </div>
        <div class="home-description">
          <h2>Quiz Bee</h2>   
            <p>{{ $home->description}}</p>              
        </div>        
      </div>   
    </section>
@endsection