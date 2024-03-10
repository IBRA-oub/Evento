<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
            <!-- Icon -->
            <link rel="stylesheet" type="text/css" href="fonts/line-icons.css">
            <!-- Nivo Lightbox -->
            <link rel="stylesheet" type="text/css" href="css/nivo-lightbox.css" >
            <!-- Animate -->
            <link rel="stylesheet" type="text/css" href="css/animate.css">
            <!-- Main Style -->
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <!-- Responsive Style -->
            <link rel="stylesheet" type="text/css" href="css/responsive.css">
        
          @vite('public/style/client.css')
    </head>
    <body>

        <!-- Header Area wrapper Starts -->
        <header id="header-wrap">
          <!-- Navbar Start -->
          <nav class="navbar navbar-expand-lg bg-inverse fixed-top scrolling-navbar">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <a href="index.html" class="navbar-brand"><img src="img/logo.png" alt=""></a>       
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lni-menu"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                  <li class="nav-item active">
                    <a class="nav-link" href="#header-wrap">
                      Home
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#about">
                      About
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#intro">
                      Intro
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/all-event">
                      event
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sponsors">
                      Sponsors
                    </a>
                  </li>
                  <li class="nav-item">
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                            @if(auth()->user()->role == 'client')

                            <a href="{{ url('/client-reservation') }}" class="nav-link">Dashboard</a>
                      
                            @elseif(auth()->user()->role == 'organisateur')

                            <a href="{{ url('/organisateur-dashboard') }}" class="nav-link">Dashboard</a>
                       
                            @elseif(auth()->user()->role == 'organisateur')

                              <a href="{{ url('/admin-dashboard') }}" class="nav-link">Dashboard</a>
                              @endif
                            @else
                                <a href="{{ route('login') }}" class="nav-link " style="padding: 0px 15px 0px 15px; border: solid 1px white; border-radius:5px;">Log in</a>
                    </li>
                    <li class="nav-item">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-link" style=" margin-left:15px; padding: 0px 15px 0px 15px; border: solid 1px #413ee8;  border-radius:5px; background-color:#3e41e8; color:white;">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Navbar End -->
    
          <!-- Hero Area Start -->
          <div id="hero-area" class="hero-area-bg">
            <div class="overlay"></div>
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-9 col-sm-12">
                  <div class="contents text-center">
                    
                    <p class="banner-info">{{$closlyEvent->date}} </p>
                    <h2 class="head-title">{{$closlyEvent->title}}</h2>
                    <p class="banner-desc">
                      {{$closlyEvent->description}} 
                      <div class="banner-btn">
                        @if(auth()->check()) 
                            @if(auth()->user()->role == 'client')
                                
                            <a href="#" class="btn btn-common">Get Ticket</a>
                                
                                @elseif(auth()->user()->role == 'admin')

                                @elseif(auth()->user()->role == 'organisateur')
                            @endif
                        @else
                        <a href="{{ route('login') }}" class="btn btn-common">Get Ticket</a>
                            
                            
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Hero Area End -->
    
        </header>
        <!-- Header Area wrapper End -->
    
         <!-- Count Bar Start -->
         <div id="countdown">
            <div id="count">
                <div class="countdown-item">
                  <span id="days">00</span>
                  <p>jours</p>
                </div>
                <div class="countdown-item">
                  <span>:</span>
                </div>
                <div class="countdown-item">
                  <span id="hours">00</span>
                  <p>heures</p>
                </div>
                <div class="countdown-item">
                  <span>:</span>
                </div>
                <div class="countdown-item">
                  <span id="minutes">00</span>
                  <p>minutes</p>
                </div>
                <div class="countdown-item">
                  <span>:</span>
                </div>
                <div class="countdown-item">
                  <span id="seconds">00</span>
                  <p>seconds</p>
                </div>
            </div>
        </div>
        
        
      <!-- Count Bar End -->
    
        <!-- About Section Start -->
        <section id="about" class="section-padding">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="img-thumb">
                  <img class="img-fluid" src="img/about/img1.png" alt="">
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="about-content">
                  <div>
                    <div class="about-text">  
                      <h2>About The Conference</h2>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ncididunt ametfh consectetur dolore magna aliqua. Ut enim ad minim veniam dolor sitame magnaelit ate consectetur adipisicing. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod.</p>
                    </div>
                    <ul class="stylish-list mb-3">
                      <li><i class="lni-check-mark-circle"></i>Networking Sessions</li>
                      <li><i class="lni-check-mark-circle"></i>Meet New Professional Faces</li>
                      <li><i class="lni-check-mark-circle"></i>Get Inspired by Amazing Speakers</li>
                      <li><i class="lni-check-mark-circle"></i>Lorem ipsum dolor sit ameterib</li>
                      <li><i class="lni-check-mark-circle"></i>Lorem ipsum dolor sit ameterib quodsi</li>
                    </ul>
                    <a class="btn btn-common" href="#">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- About Section End -->
    
         <!-- intro Section Start -->
        <section id="intro" class="intro section-padding">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-title-header text-center">
                  <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why You Should Join?</h2>
                  <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
              </div>
            </div>
            <div class="row intro-wrapper">
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                   <i class="lni-microphone"></i>
                   <h3>Great Speakers</h3>
                   <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                   </p>
                   <span class="count-number">01</span>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text">
                   <i class="lni-users"></i>
                   <h3 class="ts-title">New People</h3>
                   <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                   </p>
                   <span class="count-number">02</span>
                </div>
                <div class="border-shap left"></div>
              </div>
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                   <i class="lni-bullhorn"></i>
                   <h3>Global Event</h3>
                   <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                   </p>
                   <span class="count-number">03</span>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                   <i class="lni-heart"></i>
                   <h3>Get Inspired</h3>
                   <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                   </p>
                   <span class="count-number">04</span>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                   <i class="lni-cup"></i>
                   <h3>Networking Session</h3>
                   <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                   </p>
                   <span class="count-number">05</span>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                   <i class="lni-gallery"></i>
                   <h3>Meet New Faces</h3>
                   <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                   </p>
                   <span class="count-number">06</span>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- intro Section End -->
      
       

    
        <!-- Event Slides Section Start -->
        <section id="event-up" class="section-padding">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-title-header text-center">
                  <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Upcoming Events</h2>
                  <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="event-item">
                  <img class="img-fluid" src="img/event/img1.jpg" alt="">
                  <div class="overlay-text">
                    <div class="content">
                      <h3>Business Confrence</h3>
                      <a href="#">View details</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="event-item">
                  <img class="img-fluid" src="img/event/img2.jpg" alt="">
                  <div class="overlay-text">
                    <div class="content">
                      <h3>Designer Confrence</h3>
                      <a href="#">View details</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="event-item">
                  <img class="img-fluid" src="img/event/img3.jpg" alt="">
                  <div class="overlay-text">
                    <div class="content">
                      <h3>Marketer Confrence</h3>
                      <a href="#">View details</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="event-item">
                  <img class="img-fluid" src="img/event/img4.jpg" alt="">
                  <div class="overlay-text">
                    <div class="content">
                      <h3>JS Confrence</h3>
                      <a href="#">View details</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center">
                <a href="#" class="btn btn-common">More Event</a>
              </div>
            </div>
          </div>
        </section>
        <!-- Event Slides Section End -->
    
        <!-- Blog Section Start -->
        <section id="blog" class="section-padding">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-title-header text-center">
                  <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Latest News</h2>
                  <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="blog-item">
                  <div class="blog-image">
                    <a href="#">
                      <img class="img-fluid" src="img/blog/img-1.jpg" alt="">
                    </a>
                  </div>
                  <div class="descr">
                    <div class="icon">
                      <i class="lni-image"></i>
                    </div>
                    <h3 class="title">
                      <a href="#">
                        Learn Something New
                      </a>
                    </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipsing elit, sed do eiusmodincididunt ut labore et dolore</p>
                  </div>
                  <div class="meta-tags">
                    <span class="date"><i class="lni-calendar"></i> Jan 20, 2020</span> 
                    <span class="comments"><i class="lni-comment-alt"></i> <a href="#"> 0 Comment</a></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="blog-item">
                  <div class="blog-image">
                    <a href="#">
                      <img class="img-fluid" src="img/blog/img-2.jpg" alt="">
                    </a>
                  </div>
                  <div class="descr">
                    <div class="icon">
                      <i class="lni-arrow-right"></i>
                    </div>
                    <h3 class="title">
                      <a href="#">
                        Call for sponsors
                      </a>
                    </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipsing elit, sed do eiusmodincididunt ut labore et dolore</p>
                  </div>
                  <div class="meta-tags">
                    <span class="date"><i class="lni-calendar"></i> Jan 20, 2020</span> 
                    <span class="comments"><i class="lni-comment-alt"></i> <a href="#"> 0 Comment</a></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="blog-item">
                  <div class="blog-image">
                    <a href="#">
                      <img class="img-fluid" src="img/blog/img-3.jpg" alt="">
                    </a>
                  </div>
                  <div class="descr">
                    <div class="icon">
                      <i class="lni-camera"></i>
                    </div>
                    <h3 class="title">
                      <a href="#">
                        Elon Musk joining the event
                      </a>
                    </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipsing elit, sed do eiusmodincididunt ut labore et dolore</p>
                  </div>
                  <div class="meta-tags">
                    <span class="date"><i class="lni-calendar"></i> Jan 20, 2020</span> 
                    <span class="comments"><i class="lni-comment-alt"></i> <a href="#"> 0 Comment</a></span>
                  </div>
                </div>
              </div>
              <div class="col-12 text-center">
                <a href="#" class="btn btn-common">View all Blog</a>
              </div>
            </div>
          </div>
        </section>
        <!-- Blog Section End -->
    
        <!-- Sponsors Section Start -->
        <section id="sponsors" class="section-padding">
          <div class="overlay"></div>
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-title-header text-center">
                  <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Sponsors</h2>
                  <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
              </div>
            </div>
            <div class="row mb-30 text-center wow fadeInDown" data-wow-delay="0.3s">
              <div class="col-lg-12">
                <div class="sponsors-logo text-center">
                   <a href=""><img src="img/sponsors/logo-1.png" alt=""></a>
                   <a href=""><img src="img/sponsors/logo-2.png" alt=""></a>
                   <a href=""><img src="img/sponsors/logo-3.png" alt=""></a>
                   <a href=""><img src="img/sponsors/logo-4.png" alt=""></a>
                   <a href=""><img src="img/sponsors/logo-5.png" alt=""></a>
                   <a href=""><img src="img/sponsors/logo-6.png" alt=""></a>
                   <a href=""><img src="img/sponsors/logo-7.png" alt=""></a>
                   <a href=""><img src="img/sponsors/logo-8.png" alt=""></a>
                   <a href=""><img src="img/sponsors/logo-9.png" alt=""></a>
                </div><!-- sponsors logo end-->
             </div>
            </div>
          </div>
        </section>
        <!-- Sponsors Section End -->
    
    
    
        <!-- Map Section Start -->
        <section id="google-map-area">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <object style="border:0; height: 450px; width: 100%;" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10043.927470729472!2d-9.255290009223579!3d32.233847144928916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdac2660b1ef3c63%3A0x35ebd8f865445a62!2sAAIT%20UM6P%20%3A%20African%20Academy%20of%20Industrial%20Training!5e1!3m2!1sfr!2sma!4v1709724420049!5m2!1sfr!2sma"></object>
              </div>
            </div>
          </div>
        </section>
        <!-- Map Section End -->
    
        <!-- Contact text Start -->
        <section id="contact-text">
          <div class="container">
            <div class="row contact-wrapper">
              <div class="col-lg-4 col-md-5 col-xs-12">
                <ul>
                  <li>
                    <i class="lni-home"></i>
                  </li>
                  <li><span>Cesare Rosaroll, 118 80139 Eventine</li>
                </ul>
              </div>
              <div class="col-lg-4 col-md-3 col-xs-12">
                <ul>
                  <li>
                    <i class="lni-phone"></i>
                  </li>
                  <li><span>+789 123 456 79</span></li>
                </ul>
              </div>
              <div class="col-lg-4 col-md-3 col-xs-12">
                <ul>
                  <li>
                    <i class="lni-envelope"></i>
                  </li>
                  <li><span>Support@example.com</span></li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <!-- Contact text End -->
    
        <footer>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="subscribe-inner wow fadeInDown" data-wow-delay="0.3s">
                  <h2 class="subscribe-title">To Get Nearly Updates</h2>
                  <form class="text-center form-inline">
                    <input class="mb-20 form-control" name="email" placeholder="Enter Your Email Here">
                    <button type="submit" class="btn btn-common sub-btn" data-style="zoom-in" data-spinner-size="30" name="submit" id="submit">
                      <span class="ladda-label"><i class="lni-check-box"></i> Subscribe</span>
                    </button>
                  </form>
                </div>
                <div class="footer-logo">
                  <img src="img/logo.png" alt="">
                </div>
                <div class="social-icons-footer">
                  <ul>
                    <li class="facebook"><a target="_blank" href="3"><i class="lni-facebook-filled"></i></a></li>
                    <li class="twitter"><a target="_blank" href="3"><i class="lni-twitter-filled"></i></a></li>
                    <li class="pinterest"><a target="_blank" href="3"><i class="lni-pinterest"></i></a></li>
                  </ul>
                </div>
                <div class="site-info">
                  <p>Designed and Developed by <a href="http://uideck.com" rel="nofollow">UIdeck</a></p>
                </div>
              </div>
            </div>
          </div>
        </footer>
    
        <!-- Go to Top Link -->
        <a href="#" class="back-to-top">
            <i class="lni-chevron-up"></i>
        </a>
    
        <div id="preloader">
          <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
          </div>
        </div>
    
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.nav.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/wow.js"></script>
        <script src="js/nivo-lightbox.js"></script>
        <script src="js/video.js"></script>
        <script src="js/main.js"></script>  
        <script>
         
          let timeString = '{{$closlyEvent->date}}'; 
          const endDate = new Date(timeString).getTime(); 

          function updateCountdown() {
          const now = new Date().getTime();
          const distance = endDate - now;

          if (distance <= 0) {
              clearInterval(intervalId); 
          
              return;
          }

          const days = Math.floor(distance / (1000 * 60 * 60 * 24));
          const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          const seconds = Math.floor((distance % (1000 * 60)) / 1000);

          document.getElementById('days').innerText = formatTime(days);
          document.getElementById('hours').innerText = formatTime(hours);
          document.getElementById('minutes').innerText = formatTime(minutes);
          document.getElementById('seconds').innerText = formatTime(seconds);
          }

          function formatTime(time) {
          return time < 10 ? `0${time}` : time;
          }

         
          setInterval(updateCountdown, 1000);

         
          updateCountdown();
        </script>    
      </body>
</html>
