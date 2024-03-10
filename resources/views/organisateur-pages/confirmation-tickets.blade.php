@extends('layouts.organisateur-layouts')

@section('content')


<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">

    <div class="ml-10">
        @if (session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @elseif(session('error'))
        <div id="success-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif
    </div>
   
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 ml-9">
        @if(!empty($confirmationTickets))
        @foreach($confirmationTickets as $eventId => $tickets)
        @foreach($tickets as $ticket)
            <div class="w-[80%] ml-10 md:ml-0 md:w-full  py-4 px-4">
                <div>
                    <div>
                        <div class="bg-white relative shadow p-2 rounded-lg text-gray-800 hover:shadow-lg">
                          


                            <img src="{{asset('storage/image/'.$ticket->event->image)}}"
                                class="h-32 rounded-lg w-full object-cover">
                            <div class="flex justify-center">
                                <img src="{{asset('storage/image/'.$ticket->user->picture_user)}}"
                                    class="rounded-full -mt-6 border-4 object-center object-cover border-white mr-2 h-16 w-16">
                            </div>
                            <div class="py-2 px-2">
                                <div class=" font-bold font-title text-center">
                                    {{$ticket->user->fullName}}
                                </div>





                                <p class="text-md pt-2"><strong>Event:</strong> {{$ticket->event->title}}</p>
                                <p class="text-md pt-2"><strong>date :</strong>{{$ticket->event->date}}</p>
                                <p class="text-md pt-2"><strong>place:</strong>{{$ticket->your_place}}</p>
                            </div>


                           
                            <div class="flex justify-around w-full">
                                <form action="{{route('accepted.reservation',['id'=>$ticket->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <button type="submit" id="reserveBtn"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-10 rounded mt-4 w-full">
                                        Accepter
                                    </button>
                                </form>

                                <form action="{{route('refused.reservation',['id'=>$ticket->id,'eventId'=>$ticket->event->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <button type="submit" id="reserveBtn"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-10 rounded mt-4 w-full">
                                    Refuse
                                </button>
                            </form>
                            </div>
                          

                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @endforeach

            @else
            <div class=" text-blue-600 font-bold text-sm md:text-5xl absolute  md:top-1/2 md:right-44 right-20 top-1/2">
               
                NO RESERVATION CREATE FOR INSTANT
            </div>
            @endif

    </div>

    

</main>
@endsection