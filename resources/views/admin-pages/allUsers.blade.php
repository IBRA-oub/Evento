@extends('layouts.admin-layouts')

@section('content')


<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
    <!--===========Content===========-->
 <main class="bg-gray-100 flex-grow h-[100vh] relative">
     <!-- ============== header =========== -->
 
     <!-- ============ Content ============= -->
 
     <div class="md:p-6 bg-white md:m-5">
        @if (session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
 
         <!-- ========== table Banks-desktop ======== -->
       
         <div class="hidden md:block  rounded-lg overflow-hidden mt-10 w-[95%] items-center ml-10">
             <table class="  
            w-full   " id="table1">
                 <thead class="  sm:w-full">
                     <tr class="bg-blue-400 text-white h-[40px]">
                         <th class="">ID</th>
                         <th class="">fullName</th>
                         <th class="">email</th>
                         <th class="">role</th>
                        
                         <th class="">Actions</th>
                     </tr>
                 </thead>
                 @foreach($allUsers as $user)
                 <tbody class="sm:w-full">
                  
 
                     <tr class=" pt-10 sm:pt-0  w-full border-b border-blue-400">
 
                         <td class=" text-center ">
                             {{$user->id}}
                         </td>
                         <td class=" text-center ">
                            {{$user->fullName}}
                         </td>
                         <td class=" text-center ">
                            {{$user->email}}
                         </td>
                         @if($user->role ==='admin')
                         <td class=" text-center ">
                           <p class="rounded-md bg-red-300 text-red-800"> admin</p>
                         </td>
                         @elseif($user->role ==='client')
                         <td class=" text-center ">
                            <p class="rounded-md bg-green-300 text-green-800"> client</p>
                          </td>
                          @elseif($user->role ==='organisateur')
                          <td class=" text-center ">
                            <p class="rounded-md bg-blue-300 text-blue-800"> organisateur</p>
                          </td>
                          @endif
 
                        @if($user->role ==='admin')

                        @else
                         <td class="  text-center flex justify-center ">
                            @if($user->banned ==='0')
                                <form action="{{route('banned.user',['id'=>$user->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md mr-2">
                                 <a >
                                     <i class="fa-solid fa-user-slash" style="color: #ffffff;"></i></a>
                            
 
                             </button>
                            </form>
                            @elseif($user->banned ==='0')
                            <form >
                                
                            <button class="bg-green-800 text-white w-8 h-[35px] rounded-md mr-2">
                             <a >
                                 <i class="fa-solid fa-user-slash" style="color: #ffffff;"></i></a>
                        

                         </button>
                        </form>
                        @endif
                            <form action="{{route('destroy.user',['id'=>$user->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                             <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md mr-2">
                                 <a
                                     href=""><i
                                         class="fa-solid fa-trash " style="color:#ffffff"></i></a>
 
                             </button>
                            </form>
                            @if($user->banned ==='0')
                            <form action="{{route('debanned.user',['id'=>$user->id])}}" method="POST">
                                @csrf
                                @method('PUT ')
                             
                             <button class="bg-green-800 text-white w-8 h-[35px] rounded-md">
                                <a
                                    href="">
                                    <i class="fa-solid fa-user" style="color: #ffffff;"></i></a>

                            </button>
                            </form>
                            @elseif($user->banned ==='1')
                            <form action="{{route('debanned.user',['id'=>$user->id])}}" method="POST">
                                @csrf
                                @method('PUT ')
                             
                             <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                <a
                                    href="">
                                    <i class="fa-solid fa-user" style="color: #ffffff;"></i></a>

                            </button>
                            </form>
                            @endif
                         </td>
                         @endif
                     </tr>
               
 
                 </tbody>
                 @endforeach
             </table>
         </div>
         
         <!-- ========== table Banks-mobile ======== -->
         <div class="block sm:hidden rounded-lg overflow-hidden mt-10 ">
             <table class=" block sm:hidden w-full  border-2 sm:border-0  " id="table2">
                 <thead class="hidden">
                     <tr>
                         <th></th>
                         <th></th>
                         <th></th>
                         <th></th>
 
 
                     </tr>
                 </thead>
                 <tbody class="block  w-full">
                    @foreach($allUsers as $user)
                     <tr class="block pt-10 sm:pt-0   w-full ">
 
                         <td data-label="id"
                             class="border-b before:content-['id']  before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                           {{$user->id}}
                         </td>
                         <td data-label="fullName" class="border-b before:content-['fullName'] before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                              text-right">
                            {{$user->fullName}}
                         </td>

                         @if($user->role ==='admin')
                         <td data-label="Role" class="border-b before:content-['Role'] before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                         text-right">
                         <p class="rounded-md bg-red-300 text-red-800"> admin</p>
                         </td>

                         @elseif($user->role ==='client')

                         <td data-label="Role" class="border-b before:content-['Role'] before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                         text-right">
                         <p class="rounded-md bg-green-300 text-green-800"> client</p>
                         </td>
                         @elseif($user->role ==='organisateur')

                         <td data-label="Role" class="border-b before:content-['Role'] before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                         text-right">
                         <p class="rounded-md bg-blue-300 text-blue-800"> organisateur</p>
                         </td>
                         @endif

                         
                        
                         @if($user->role ==='admin')
                         
                         @else
                         <td data-label="Action"
                             class=" border-b before:content-['action'] before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2  sm:before:hidden  sm:text-center block    text-right">
                             <form action="{{route('banned.user',['id'=>$user->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                             <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                 <a >
                                    <i class="fa-solid fa-user-slash" style="color: #ffffff;"></i>
                                 </a>
 
                             </button>
                             </form>

                             <form action="{{route('destroy.user',['id'=>$user->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                             <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                 <a
                                     >
                                     <i class="fa-solid fa-trash " style="color:#ffffff"></i></a>
 
                             </button>
                             </form>

                             <form action="{{route('debanned.user',['id'=>$user->id])}}" method="POST">
                                @csrf
                                @method('PUT ')
                             <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                <a
                                   >
                                    <i class="fa-solid fa-user" style="color: #ffffff;"></i></a>

                            </button>
                             </form>
                         </td>
                         @endif
                     </tr>
                  @endforeach
 
                 </tbody>
             </table>
         </div>
 
 
 
     </div>
     <!-- ============ Content ============= -->
 
 
 </main>
 
 
 </main>
 
@endsection