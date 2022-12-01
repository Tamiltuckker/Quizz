@extends('layouts.frontend')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                           @php  $userEmailVerfication = \App\Models\User::where('id', Auth::user()->id)->first();
                            @endphp
                            @if ($userEmailVerfication->email_verified_at !== null)
                            <h4><a href="{{ route('user.dashboard.gettemplates') }}">{{ $category }}</a></h4>
                           @else
                           <h4 onclick="myFunction()"><a href="#">{{ $category }}</a></h4>
                            @endif
                           
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function myFunction() {

            Swal.fire({
            title: 'If you want to Attend the Quix You Need Verify Your Email?',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
            })
        }

        </script>
        <!-- End Services Section -->
@endsection
