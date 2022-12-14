{{-- @extends('layouts.frontend')

@section('content') --}}
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $privacy->title }}</h2>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->
    
    <!-- ======= Contact Section ======= -->
    <section id="privacy" class="privacy">
        <div class="container" data-aos="fade-up">
            <div class="row mt-5">
                <div class="col-lg-10">
                    <div class="info">                                       
                        <div class="privacy-policy">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Privacy Policy:</h4>
                            <p>{{ $privacy->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
  
{{-- </section><!-- End Contact Section -->
@endsection --}}
