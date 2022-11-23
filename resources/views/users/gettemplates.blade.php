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
          <div class="card mx-auto text-left col-md-8"> 
            <div class="row">   
              <div class="col-md-10">          
                <h4 class="mt-2">2022-Nov-HTML Quiz  </h4>
              </div>
              <div class="col-md-2">
                <a class="btn btn-warning btn-md mt-1" href="{{ route('user.dashboard.getquestions') }}">Start
                Quiz</a>  
              </div>    
            </div>
          </div>         
        </div>  

        <div class="row mt-2 ">
          <div class="card mx-auto text-left col-md-8"> 
            <div class="row">   
              <div class="col-md-10">          
                <h4 class="mt-2">2022-Dec-HTML Quiz  </h4>
              </div>
              <div class="col-md-2">
                <a class="btn btn-warning btn-md mt-1" href="{{ route('user.dashboard.getquestions') }}">Start
                Quiz</a>  
              </div>    
            </div>
          </div>         
        </div>          

      </div>  
    </section>

@endsection
