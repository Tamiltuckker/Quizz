@extends('layouts.frontend')

@section('content')

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Quiz Section</h2>
          <p>Check Your Brain</p>
          <div align="right">
            <a class="btn btn-warning btn-lg ms-auto" href="{{ route('user.dashboard.index') }}">Back</a>
          </div>
        </div>   

        <div class="row mt-2 ">
          <div class="card mx-auto text-center w-50">            
            <h4>January Quiz &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
              <a class="btn btn-warning btn-lg ms-auto" href="{{ route('user.dashboard.getquestions') }}">Start
                Quiz</a>                              
            </h4>
          </div>
        </div>  

        <div class="row mt-2">
          <div class="card mx-auto text-center w-50">
            <h4>February Quiz&nbsp; &nbsp; &nbsp; &nbsp;
              <a class="btn btn-warning btn-lg ms-auto" href="{{ route('user.dashboard.getquestions') }}">Start
              Quiz</a>
            </h4>
          </div>
        </div>
      
        <div class="row mt-2">
          <div class="card mx-auto text-center w-50">
            <h4>March Quiz&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
              <a class="btn btn-warning btn-lg ms-auto"
                href="{{ route('user.dashboard.getquestions') }}">Start Quiz</a>
            </h4>
          </div>
        </div>
      </div>  
    </section><!-- End Services Section -->
@endsection
