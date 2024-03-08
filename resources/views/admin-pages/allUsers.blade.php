@extends('layouts.admin-layouts')

@section('content')


<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
    <!--===========Content===========-->
 <main class="bg-gray-100 flex-grow h-[100vh] relative">
     <!-- ============== header =========== -->
 
     <!-- ============ Content ============= -->
 
     <div class="md:p-6 bg-white md:m-5">
         
 
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
                 <tbody class="sm:w-full">
                  
 
                     <tr class=" pt-10 sm:pt-0  w-full ">
 
                         <td class=" text-center ">
                             3
                         </td>
                         <td class=" text-center ">
                            fjfjjf
                         </td>
                         <td class=" text-center ">
                            admin@gmail.com
                         </td>
                         <td class=" text-center ">
                            admin
                         </td>
 
         
                         <td class="  text-center ">
                             <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                 <a href="/update-category">
                                     <i class="fa-solid fa-user-slash" style="color: #ffffff;"></i></a>
 
 
                             </button>
                             <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                 <a
                                     href=""><i
                                         class="fa-solid fa-trash " style="color:#ffffff"></i></a>
 
                             </button>
 
 
                         </td>
 
                     </tr>
               
 
                 </tbody>
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
 
 
                     </tr>
                 </thead>
                 <tbody class="block  w-full">
                 
                     <tr class="block pt-10 sm:pt-0   w-full ">
 
                         <td data-label="id"
                             class="border-b before:content-['id']  before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                           3
                         </td>
                         <td data-label="nameCategorie" class="border-b before:content-['nameCategorie'] before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                              text-right">
                            hjkl
                         </td>
                         
                        
 
                         <td data-label="ACtion"
                             class="border-b before:content-['action'] before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2  sm:before:hidden  sm:text-center block    text-right">
                             <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                 <a href="/update-category">
                                     <i class="fa-solid fa-pen " style="color:#fbfbfb"></i>
                                 </a>
 
                             </button>
                             <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                 <a
                                     href="">
                                     <i class="fa-solid fa-trash " style="color:#ffffff"></i></a>
 
                             </button>
 
 
                         </td>
 
                     </tr>
                  
 
                 </tbody>
             </table>
         </div>
 
 
 
     </div>
     <!-- ============ Content ============= -->
 
 
 </main>
 
 
 </main>
 
@endsection