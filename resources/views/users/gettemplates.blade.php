@extends('layouts.frontend')

@section('content')

    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Quiz Section</h2>
          <p>Check Your Brain</p>
          <div align="right">
            <a class="btn btn-warning btn-md ms-auto" href="{{ route('user.dashboard.index') }}">Back</a>
          </div>
        </div>   

        <div class="row mt-2 ">
          <div class="card mx-auto text-center col-md-8">            
            <h4 class="mt-2">2022-Jan HTML Quiz
              <a class="btn btn-warning btn-md ms-auto mt-2" href="{{ route('user.dashboard.getquestions') }}">Start
                Quiz</a>                              
            </h4>
          </div>
        </div>  

        <div class="row mt-2 ">
          <div class="card mx-auto text-center col-md-8">            
            <h4 class="mt-2">2022-Feb Html Quiz
              <a class="btn btn-warning btn-md ms-auto mt-2" href="{{ route('user.dashboard.getquestions') }}">Start
                Quiz</a>                              
            </h4>
          </div>
        </div> 
      </div>  
    </section>

@endsection
