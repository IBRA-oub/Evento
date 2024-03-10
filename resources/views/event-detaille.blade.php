<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

           
            @vite('resources/css/app.css')

            <style>
                @import url('https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
                html {font-family: "PT Sans", sans-serif;}
                </style>
    </head>
    <body>

          <!-- Header Area wrapper Starts -->

          <header class="bg-gray-400 py-1">
            <nav class="container mx-auto flex justify-between items-center">
                <a href="/" class="w-[10%]"><img src="img/logo.png" alt=""></a>
                <ul class="flex items-center">
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500">Home</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500">About</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500">Intro</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500">event</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500">Sponsors</a></li>
                    <li>

                    @if (Route::has('login'))
                        @auth
                        @if(auth()->user()->role == 'client')

                            <a href="{{ url('/client-reservation') }}" class="nav-link">Dashboard</a>
                      
                            @elseif(auth()->user()->role == 'organisateur')

                            <a href="{{ url('/organisateur-dashboard') }}" class="nav-link">Dashboard</a>
                       
                            @elseif(auth()->user()->role == 'organisateur')

                              <a href="{{ url('/admin-dashboard') }}" class="nav-link">Dashboard</a>
                              @endif
                        @else
                        <a href="{{ route('login') }}" class="nav-link inline-block px-4 py-2 border border-white rounded hover:bg-white hover:text-blue-600">
                            Log in
                        </a>                
                    </li>
                     <li>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block px-4 py-2 ml-4 border border-blue-600 rounded bg-blue-600 text-white hover:bg-blue-700 hover:border-blue-700">
                                Register
                            </a>
                         @endif
                        @endauth
                     </li>
                      @endif
                </ul>
            </nav>
        </header>
        <!-- Header Area wrapper End -->

        {{-- detaille de evennement start --}}
        <div>
            <form action="{{route('reservation.create')}}" method="POST">
                @csrf
                <input type="hidden" name="type_validation" value="{{$eventDetaille->type_validation}}">
                <input type="hidden" name="event_id" value="{{$eventDetaille->id}}">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

            <div class="block md:flex md:space-x-2 px-2 lg:p-0">
                <div class="mb-4 md:mb-0 w-full md:w-3/3 relative rounded inline-block" style="height: 24em;">
                    <div class="absolute left-0 bottom-0 w-full h-full z-10"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                   
                 <img src='{{asset('/storage/image/'. $eventDetaille->image)}}' class='absolute left-0 top-0 w-full h-full rounded z-0 object-cover' />
                    
                    <div class="p-4 absolute bottom-20 left-20 z-20">
                        <h1 class="text-5xl font-semibold text-gray-100 leading-tight">
                           {{$eventDetaille->title}}
                        </h1>
                       
                        
                        <!-- Count Bar Start -->
                        <div id="countdown" class="absolute left-80 rounded-md g-time-down text-center mt-4  py-5 px-20 flex justify-center " style="background-image: linear-gradient(65deg, #4d56ff 0, #8f80ff 100%);">
                            <div class="flex justify-center">
                              <div class="countdown-item   rounded-lg p-2 mx-2">
                                <span id="days" class="font-semibold text-6xl text-white ">00</span>
                                <p class=" text-white">jours</p>
                              </div>
                              <div class="countdown-item  rounded-lg p-2 mx-2 text-white">
                                <span  class="font-semibold text-6xl text-white">:</span>
                              </div>
                              <div class="countdown-item  rounded-lg p-2 mx-2 text-white">
                                <span id="hours" class="font-semibold text-6xl text-white">00</span>
                                <p class="">heurs</p>
                              </div>
                              <div class="countdown-item  rounded-lg p-2 mx-2 text-white">
                                <span  class="font-semibold text-white text-6xl">:</span>
                              </div>
                              <div class="countdown-item  rounded-lg p-2 mx-2 text-white">
                                <span id="minutes" class="font-semibold text-6xl text-white">00</span>
                                <p class="">minutes</p>
                              </div>
                              <div class="countdown-item  rounded-lg p-2 mx-2 text-white">
                                <span  class="font-semibold text-6xl text-white">:</span>
                              </div>
                              <div class="countdown-item  rounded-lg p-2 mx-2 text-white">
                                <span id="seconds" class="font-semibold text-6xl text-white">00</span>
                                <p class="">seconds</p>
                              </div>
                            </div>
                          </div>
                          
                          
                        <!-- Count Bar End -->
    
    
                    </div>
                </div>
           
            </div>
    
          
    
            <div class="px-4 py-10 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed w-1/2">
    
                <p class="pb-6">{{$eventDetaille->description}}</p>

                <div class="bg-yellow-200 px-1 py-1.5  rounded-full flex mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"></path>
                        <path d="M3 11v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v2H7v-2a2 2 0 0 0-4 0Z"></path>
                        <path d="M5 18v2"></path>
                        <path d="M19 18v2"></path>
                      </svg>
                    <p tabindex="0" class="focus:outline-none text-xs text-yellow-700">{{$eventDetaille->places_available}} places valaible</p>
                </div>

                <div class="text-grey-500 flex flex-row space-x-1 py-4 border-t border-b border-gray-200 my-4">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                      </svg>
                      <p class="text-xs">{{$eventDetaille->location}} </p>
                </div>
            </div>
           
            @if(auth()->check()) 
            @if(auth()->user()->role == 'client')
                @if($eventDetaille->places_available == 0)
                <div class="absolute right-10">
                    <p  style="background-color: #225aad" class="ml-2 rounded-lg w-full py-2 px-20 mt-5 text-white font-bold">Guichet fermer</p>
                </div>
                @else
                <div class="absolute right-10">
                    <button type="submit" style="background-color: #225aad" class="ml-2 rounded-lg w-full py-2 px-20 mt-5 text-white font-bold">Buy ticket</button>
                </div>
                @endif
                @elseif(auth()->user()->role == 'admin')

                @elseif(auth()->user()->role == 'organisateur')
            @endif
        @else
            
            <div class="absolute right-10">
                <a href="{{ route('login') }}" style="background-color: #225aad" class="ml-2 rounded-lg w-full py-2 px-20 mt-5 text-white font-bold">Login to buy ticket</a>
            </div>
        @endif
           
           

           
        </form>
        </div>
        

        {{-- detaille de evennement end --}}

        <script>
         
            let timeString = '{{$eventDetaille->date}}'; 
            const endDate = new Date(timeString).getTime(); 

            function updateCountdown() {
            const now = new Date().getTime();
            const distance = endDate - now;

            if (distance <= 0) {
                clearInterval(intervalId); /
            
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