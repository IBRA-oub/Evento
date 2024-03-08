@extends('layouts.admin-layouts')

@section('content')

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">



    <div class="flex items-center justify-center p-12 ml-10 md:ml-0">
       
        <div class="mx-auto w-full max-w-[550px]">
          <form action="{{route('category.update',['id'=>$category->id])}}" method="POST">
            @csrf
            @method('PUT')
            {{-- ______________name__________ --}}
            <div class="-mx-3 ">
              <div class="w-full px-3 ">
                <h1 class="text-3xl font-bold text-blue-600 flex justify-center border border-blue-600 ">Update category</h1>

                <div class="mb-5 mt-10">
                  <label for="name" class="mb-3 block text-base font-medium text-[#07074D]"  >
                    New name
                  </label>
                  <input type="text" name="name" id="name" placeholder="misic"  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="{{$category->name}}"/>
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
              </div>
            </div>
            <div>
                <button
                  class="w-full hover:shadow-form rounded-md bg-blue-800 hover:bg-blue-200 py-3 px-8 text-center text-base font-semibold text-white outline-none" >
                  update
                </button>
              </div>
          </form>
        </div>
      </div>
    
</main>
@endsection