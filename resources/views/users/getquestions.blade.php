@extends('layouts.frontend')

@section('content')

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
               <h2>Quiz Section</h2>
               <p>Check Your Brain</p>
            </div>
            <h1> Q1. What is HTML??</h1>
            <input type="radio" name="question1" >HTML describes the structure of a webpage<br>
            <input type="radio" name="question1" >HTML is the standard markup language mainly used to create web pages<br>
            <input type="radio" name="question1" >HTML consists of a set of elements that helps the browser how to view the content<br>
            <input type="radio" name="question1" id="correct">All of the mentioned<br>
        
            <input type="submit" name="submit" value="submitQuiz" onclick="result()"/>
    
            <script type="text/javascript">
            function result(){
                let score=0;
                if (document.getElementById('correct').checked) {
                    score++
                    document.write("🟢Correct!!! ")
                } else {
                    score--
                    document.write("🔴Incorrect bozo!")
                }
            }
                
            </script>

        </div>

    </section><!-- End Services Section -->

@endsection