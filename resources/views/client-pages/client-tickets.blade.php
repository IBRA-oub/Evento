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
            @vite('public/style/client.css')

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>
    
        </style>
    </head>
    @if(auth()->user()->banned ==='0')
    <body id="body">

          <!-- Header Area wrapper Starts -->

          <header class="bg-gray-400 py-1">
            <nav class="container mx-auto flex justify-between items-center">
                <a href="/" class="w-[10%]"><img src="img/logo.png" alt=""></a>
                <ul class="flex items-center">
                    <li class="mr-6"><a href="/client-tickets" class="font-bold text-blue-500">Tickets</a></li>
                    <li class="mr-6"><a href="/client-reservation" class="font-bold text-white hover:text-blue-500">Reservation</a></li>
                   
                    <li>   
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <button class="nav-link inline-block px-4 py-2 border border-white rounded hover:bg-white hover:text-blue-600">
                            Log out
                        </button> 
                        </form>               
                    </li>
                    
                </ul>
            </nav>
        </header>
        <!-- Header Area wrapper End -->

        {{-- ___________mon tickets start___________ --}}

        @foreach($clientTikeckt as $ticket)
               <div class="ticket">
                <div class="despegable side">
                   
                    
                      <p>{{$ticket->user->fullName}}</p>
                      <button class="button" type="button">
                        <span class="button__text">Download</span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                      </button>
                    
                </div>
                <div class="ticket-body">
                    <h1 class="vip">VIP</h1>
                    <h2 class="event">Event</h2>
                    
                    <div class="details">
                        <p class="details name"> {{$ticket->event->title}}</p>
                        <p class="details date"> {{$ticket->event->date}}</p>
                        <span class="details gate">YOUR SEAT N° {{$ticket->your_place}} </span>
                    </div>
                </div>
            </div>

           
            @endforeach
            
        
        {{-- ___________mon tickets end _____________ --}}


    </body>
    @else
<body class="bg-black flex justify-center items-center h-screen">
    <div class="loader">
        <div data-glitch="YOUR ARE BANNED" class="glitch">YOUR ARE BANNED</div>
     </div>
</body>
    @endif
</html>
