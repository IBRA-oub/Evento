@extends('layouts.organisateur-layouts')

@section('content')
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">



    <div class="flex items-center justify-center p-12">
       
        <div class="mx-auto w-full max-w-[550px]">
          <form action="https://formbold.com/s/FORM_ID" method="POST">
            {{-- ______________titre__________ --}}
            <div class="-mx-3 ">
              <div class="w-full px-3 ">
                <div class="mb-5">
                  <label for="titre" class="mb-3 block text-base font-medium text-[#07074D]"  >
                    Titre
                  </label>
                  <input type="text" name="titre" id="titre" placeholder="mawasie le mieulleur"  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
              </div>
            </div>
            {{-- _________________description___________ --}}
            <div class="mb-5">
              <label for="description" class="mb-3 block text-base font-medium text-[#07074D]" >
                description
              </label>
              <input type="text"  name="description" id="description"  placeholder="découvrire le mieulleru......."  class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            {{-- _______________________location___________ --}}

            <div class="mb-5">
                <label for="location" class="mb-3 block text-base font-medium text-[#07074D]" >
                  location
                </label>
                <input type="text"  name="location" id="location"  placeholder="Tangier N°12"  class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
              </div>

             {{-- ________________image___________ --}}

            <div class="mb-5">
                <label for="image" class="mb-3 block text-base font-medium text-[#07074D]" >
                  image
                </label>
                <input type="file"  name="image" id="image"    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
              </div>
      
             
            <div class="-mx-3 flex flex-wrap">
                 {{-- ________________date evenet______________ --}}
              <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label for="date"  class="mb-3 block text-base font-medium text-[#07074D]" >
                    Date
                  </label>
                  <input type="datetime-local"  name="date"  id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
              </div>
              {{-- __________________place available_________________ --}}
              <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label for="place_available" class="mb-3 block text-base font-medium text-[#07074D]" >
                    place available
                  </label>
                  <input type="number" name="place_available"  id="place_available" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
              </div>
            </div>
      
            {{-- ________________type validation_________________ --}}
            <div class="mb-5">
              <label class="mb-3 block text-base font-medium text-[#07074D]">
                choiser type de validation des reservation!
              </label>
              <div class="flex items-center space-x-6">
                <div class="w-full px-3 sm:w-1/2 flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <input id="bordered-radio-1" type="radio" value="option1" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">manuelle</label>
                </div>
                <div class="w-full px-3 sm:w-1/2 flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <input id="bordered-radio-2" type="radio" value="option2" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">automatique</label>
                </div>
            </div>
            
            </div>
      
            <div>
              <button
                class="w-full hover:shadow-form rounded-md bg-blue-800 py-3 px-8 text-center text-base font-semibold text-white outline-none" >
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    
</main>
@endsection