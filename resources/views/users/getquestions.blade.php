@extends('layouts.frontend')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>
            <form method="POST" name="quizanswer" action="{{ route('user.dashboard.store') }}">
                @csrf
                <div class="container mb-5">
                    <div class="row"> 
                       <div class="col-12">
                        @foreach ($quizQuestions as $questionKey => $quizQuestion)
                          <p class="fw-bold">Q{{$loop->iteration}}.{{ $quizQuestion->question }}</p> 
                             <div> 
                                @php $questionId = $quizQuestion->id @endphp
                                @csrf
                                @php $options = $quizQuestion->quiz_options @endphp
                                @foreach ($options as $key => $option)
                                <input type="radio" name={{ "quizanswers[$questionId]" }} value="{{ $option->id }}" required>{{ $option->option }}<br>
                                   <label for="one" class="box first"> 
                                       <div class="course">
                                           <span class="circle"></span> 
                                           {{-- <span class="subject"> {{ $option->option }}</span><br> --}}
                                       </div> 
                                   </label>  
                                    @endforeach
                             </div> 
                             <br>
                             @endforeach
                       </div>
                   </div> 
               </div>
                <input type="hidden" name="quizTemplateId" value="{{ $quizTemplateId }}">
                <div class="mt-2">
                  <button type="submit" class="btn btn-md btn-info font-weight-bold text-xs" >        
                    <h4><input class="quizTemplateId" type="hidden" value="{{$quizTemplateId}}">Save</h4>
                </button>
                </div>
            </form>
        </div>
    </section>
    {{-- @include('sweetalert'); --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
     $("h4").click(function(){   
        alert('hi') ;
      var getid= $(this).children('.quizTemplateId').val(); 
        alert(getid); 
        // var url = "user/dashboard/view/"+getid;
        // alert(url);
        location.href = "user/dashboard/view/=" + getid;
        alert(location.href);
    });
        </script>
@endsection