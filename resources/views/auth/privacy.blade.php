@extends('layouts.authenticate')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $privacy->title }}</h2>
            </div>
        </div>
    </section>

    <section id="privacy" class="privacy">
        <div class="container" data-aos="fade-up">
            <div class="row mt-5">
                <div class="col-lg-10">
                    <div class="info">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/assets/img/'.$privacy->image->image) }}" alt="sdf">
                            </div>
                        </div>
                        <div class="privacy-policy mt-4">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Privacy Policy:</h4>
                            <p>{{ $privacy->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
