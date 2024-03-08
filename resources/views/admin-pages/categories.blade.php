@extends('layouts.admin-layouts')

@section('content')


<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
   <!--===========Content===========-->
<main class="bg-gray-100 flex-grow h-[100vh] relative">
   

    <!-- ============ Content ============= -->

    <div class="md:p-6  md:m-5">
        @if (session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        <div class="flex items-center justify-between mt-5">
            <div>

            </div>

            <div>


                <button class="bg-blue-400 text-white w-[160px] h-[50px] rounded-md p-5 " id="addCategory">
                    <a href="/add-category">Add Category</a>
                </button>
            </div>
        </div>

        <!-- ========== table Banks-desktop ======== -->

        <div class="hidden md:block  rounded-lg overflow-hidden mt-10 w-[95%] items-center ml-10">
            <table class="  
           w-full   " id="table1">
                <thead class="  sm:w-full">
                    <tr class="bg-blue-400 text-white h-[30px]">
                        <th class="">ID</th>
                        <th class="">nameCategorie</th>
                       
                        <th class="">Actions</th>
                    </tr>
                </thead>
                <tbody class="sm:w-full">
                    @foreach ($categories as $category)
                        
                    
                    <tr class=" pt-10 sm:pt-0  w-full border-b border-blue-400">

                        <td class=" text-center ">
                            {{$category->id}}
                        </td>
                        <td class=" text-center ">
                            {{$category->name}}
                        </td>
                        <td class="  text-center flex justify-center ">
                            <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md mr-3">
                                <a href="{{ route('edit-category', ['id' => $category->id]) }}">
                                    
                                    <i class="fa-solid fa-pen " style="color:#ffffff"></i></a>


                            </button>
                            <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                <a
                                    href=""><i
                                        class="fa-solid fa-trash " style="color:#ffffff"></i></a>

                            </button>
                        </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- ========== table Banks-mobile ======== -->
        <div class="block sm:hidden rounded-lg overflow-hidden mt-10 ">
            <table class=" block sm:hidden w-full border-2 sm:border-0  " id="table2">
                <thead class="hidden">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>


                    </tr>
                </thead>
                <tbody class="block  w-full">
                    @foreach ($categories as $category)
                    <tr class="block pt-10 sm:pt-0   w-full ">

                        <td data-label="id"
                            class="border-b before:content-['id']  before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                            {{$category->id}}
                        </td>
                        <td data-label="nameCategorie" class="border-b before:content-['nameCategorie'] before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                             {{$category->name}}
                        </td>
                        
                       

                        <td data-label="Action"
                            class=" border-b before:content-['action'] before:absolute before:left-20 before:w-1/2 before:font-bold before:text-left before:pl-2  sm:before:hidden  sm:text-center block    text-right">
                            <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md mb-2">
                                <a href="{{ route('edit-category', ['id' => $category->id]) }}">
                                    <i class="fa-solid fa-pen " style="color:#fbfbfb"></i>
                                </a>

                            </button>
                            
                            <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button class="bg-blue-800 text-white w-8 h-[35px] rounded-md">
                                <a
                                    href="">
                                    <i class="fa-solid fa-trash " style="color:#ffffff"></i></a>

                            </button>
                            </form>
                        
                        </td>

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