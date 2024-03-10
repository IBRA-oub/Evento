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

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>
           

* {
	box-sizing: inherit;
	margin: 0;
	padding: 0;
}

html {
	box-sizing: border-box;
}

body {
    background-image: url(https://c1.wallpaperflare.com/preview/742/704/32/admission-admit-arts-background.jpg);
    background-position: right;
	background-size: cover;
    height: 100vh;
	
}

.ticket {
	background-color: #ffffff;
	border-radius: 5px;
	display: grid;
	grid-template-columns: 200px auto;
	height: 300px;
	margin: auto;
	width: 1200px;
    margin-top: 10px;
    
}

.ticket-body {
	align-items: center;
	background-image: url("https://free4kwallpapers.com/uploads/originals/2015/11/13/abstract-variation-wallpaper.jpg");
	background-position: right;
	background-size: cover;
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	grid-template-rows: 80% 20%;
	justify-content: center;
	padding: 0.5em;
	position: relative;
}

.vip {
	align-items: center;
	animation: neon 0.08s ease-in-out infinite alternate;
	color: #c6e2ff;
	display: flex;
	font-family: "Staatliches", cursive;
	font-size: 10rem;
	justify-content: center;
	letter-spacing: 5px;
	margin-left: 10px;
	line-height: 1;
}

.event {
	animation: neon 0.08s ease-in-out infinite alternate;
	align-items: center;
	color: #c6e2ff;
	display: flex;
	font-family: "Staatliches", cursive;
	font-size: 3rem;
	margin-left: -40px;
	margin-top: 70px;
}

.location {
	background: linear-gradient(to right, #00467f, #a5cc82);
	border-radius: 5px;
	bottom: 10px;
	color: #ffffff;
	display: flex;
	font-family: "helvetica";
	font-size: 1.1rem;
	font-weight: 700;
	grid-column: 1/3;
	grid-row: 2/3;
	height: 35px;
	justify-content: space-around;
	left: 20px;
	padding: 4px;
	position: absolute;
	text-transform: uppercase;
	width: 100%;
}

.location p {
	background-color: #13638c;
	border-radius: 5px;
	line-height: 28px;
	text-align: center;
	width: 25%;
}

.details {
	color: #fbf0ff;
	font-family: "Staatliches";
	grid-column-start: 3;
	text-align: center;
	text-transform: uppercase;
}

.details.name {
	font-family: "arial";
	font-size: 1.7rem;
}

.details.date {
	font-size: 3.9rem;
	font-weight: 800;
}

.details.gate {
	font-size: 1.4rem;
	text-align: left;
}

.despegable {
	border-right: 3px dotted black;
	grid-column: 1/2;
}

.barcode-container {
	display: flex;
	justify-content: end;
	margin-left: 10px;
	margin-top: 90px;
	padding: 5px;
	transform: rotate(-90deg);
	width: 250px;
}

.barcode {
	color: #333;
	font-family: "Libre Barcode 39";
	font-size: 1.9rem;
	letter-spacing: 2px;
}

.bar-number {
	font-family: Arial;
}

.disclaimer {
	font-size: 0.6rem;
	margin-left: -70px;
	margin-right: 40px;
	margin-top: -40px;
	transform: rotate(-90deg);
}

/* Text animation neon effect */
@keyframes neon {
	from {
		text-shadow: 0 0 6px rgba(202, 228, 225, 0.92),
			0 0 30px rgba(202, 228, 225, 0.34), 0 0 12px rgba(30, 132, 242, 0.52),
			0 0 21px rgba(30, 132, 242, 0.92), 0 0 34px rgba(30, 132, 242, 0.78),
			0 0 54px rgba(30, 132, 242, 0.92);
	}
	to {
		text-shadow: 0 0 6px rgba(202, 228, 225, 0.98),
			0 0 30px rgba(202, 228, 225, 0.42), 0 0 12px rgba(30, 132, 242, 0.58),
			0 0 22px rgba(30, 132, 242, 0.84), 0 0 38px rgba(30, 132, 242, 0.88),
			0 0 60px rgba(30, 132, 242, 1);
	}
}

@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
	
	.ticket {
		grid-template-columns: 1fr;
		grid-teplate-rows: 1fr 1fr;
		height: auto;
		margin: 0;
		width: 300px;
	}

	.ticket-body {
		grid-template-columns: 1fr;
		grid-template-rows: 20% 80%;
	}
}

.side{
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-direction: column
    
}
/* ________button dwl */

.button {
  position: relative;
  width: 150px;
  height: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  border: 1px solid #175f79;
  background-color: #175f79;
  overflow: hidden;
}

.button, .button__icon, .button__text {
  transition: all 0.3s;
}

.button .button__text {
  transform: translateX(22px);
  color: #fff;
  font-weight: 600;
}

.button .button__icon {
  position: absolute;
  transform: translateX(109px);
  height: 100%;
  width: 39px;
  background-color: #175f79;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button .svg {
  width: 20px;
  fill: #fff;
}

.button:hover {
  background: #175f79;
}

.button:hover .button__text {
  color: transparent;
}

.button:hover .button__icon {
  width: 148px;
  transform: translateX(0);
}

.button:active .button__icon {
  background-color: #175f79;
}

.button:active {
  border: 1px solid #175f79;
}

        </style>
    </head>
    <body>

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

               <div class="ticket">
                <div class="despegable side">
                   
                    
                      <p>brahim oubourrih</p>
                      <button class="button" type="button">
                        <span class="button__text">Download</span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                      </button>
                    
                </div>
                <div class="ticket-body">
                    <h1 class="vip">VIP</h1>
                    <h2 class="event">Event</h2>
                    
                    <div class="details">
                        <p class="details name"> Waving tour</p>
                        <p class="details date"> 27/08</p>
                        <span class="details gate"> Arena Music 7pm</span>
                    </div>
                </div>
            </div>

            <div class="ticket">
                <div class="despegable side">
                   
                    
                      <p>brahim oubourrih</p>
                      <button class="button" type="button">
                        <span class="button__text">Download</span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                      </button>
                    
                </div>
                <div class="ticket-body">
                    <h1 class="vip">VIP</h1>
                    <h2 class="event">Event</h2>
                    
                    <div class="details">
                        <p class="details name"> Waving tour</p>
                        <p class="details date"> 27/08</p>
                        <span class="details gate"> Arena Music 7pm</span>
                    </div>
                </div>
            </div>

            
        
        {{-- ___________mon tickets end _____________ --}}


    </body>
</html>
