@extends('layouts.frontend')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>
            @foreach ($quizQuestions as $quizQuestion)
            @php $questionId= $quizQuestion->id @endphp
    
           <form method="POST" name="quizanswer" action="{{ route('user.dashboard.store')}}">
            @csrf
               @php $options = $quizQuestion->quiz_options @endphp
                <h4> Q{{ $quizQuestion->id }}.{{ $quizQuestion->question }}</h4>
               <br>

                @foreach ($options as $key=>$option)
                <input type="radio" name={{$key}} value={{$option->option}}{{$option->id}}>&nbsp;&nbsp;{{$option->option}}<br>
                <br>
                <input type="hidden" name=quizQuestion value={{$quizQuestion->id}}>
                <input type="hidden" name=quizOptionId value={{$option->id}}>
                @endforeach
              @endforeach
            
            <input type="hidden" name=quizTemplateId value={{$quizTemplateId}}>
              <button type="submit" class="btn bg-gradient-success font-weight-bold text-xs">Save</button>
          </form>
        </div>
    </section><!-- End Services Section -->
@endsection
