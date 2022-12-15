 <!-- ======= Footer ======= -->
 <footer id="footer">
     <div class="footer-top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-3 col-md-6">
                     <div class="footer-info">
                         <h3 class="logo me-auto me-lg-0"><a href="{{ route('user.dashboard.index') }}">Quiz<span>.</span></a></h3>
                     </div>
                 </div>

                 <div class="col-lg-2 col-md-6 footer-links">
                    <h4 class="logo me-auto me-lg-0"><a href="{{ route('user.dashboard.index') }}">Quiz<span>.</span></a></h1>
                     <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('user.home') }}">Home</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="{{ route('user.about') }}">About us</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="{{ route('user.contact') }}">Contact</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                     </ul>
                 </div>

                 <div class="col-lg-3 col-md-6 footer-links">
                     <h4>Our Categories</h4>
                     <ul>
                        @guest
                            @foreach ($categories as $category)
                                @php
                                    $attendUsersCount = \App\Models\QuizAnswer::where('category_id', $category->id)
                                        ->get()
                                        ->groupBy('user_id')
                                        ->count();
                                    
                                    $attendUsersCounts[] = $attendUsersCount;
                                    $userCounts = array_slice($attendUsersCounts, 0, 5);
                                    $quizcounts[] = $attendUsersCount;
                                @endphp
                                <li>
                                    @if ($userCounts === $quizcounts && $category->active === 1)
                                        @guest
                                            <i class="bx bx-chevron-right"></i><a
                                                href="{{ route('login') }}">{{ $category->name }}</a>
                                        @endguest
                                        @auth
                                            <i class="bx bx-chevron-right"></i><a
                                                href="{{ route('user.dashboard.gettemplates', $category->slug) }}">{{ $category->name }}</a>
                                        @endauth
                                    @endif
                                </li>
                            @endforeach
                         @endguest
                     </ul>
                 </div>
             </div>
         </div>
     </div>

     <div class="container">
         <div class="copyright">
             &copy; Copyright <strong><span>Quiz</span></strong>. All Rights Reserved
         </div>
     </div>
 </footer><!-- End Footer -->
