@extends('layouts.frontend')

@section('content')


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>{{ $about->title}}</h2>    
        </div>
      </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= About Details Section ======= -->
    <section id="about-details" class="about-details">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="about-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src="{{ asset('frontend/assets/img/'.$about->image->image) }}" alt="sdf">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
           <div class="col-lg-4">
            <div class="about-info">            
            </div>
             <div class="about-description">
              <h2>This is about our concern:</h2>             
             <p>{{ $about->description}}</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection