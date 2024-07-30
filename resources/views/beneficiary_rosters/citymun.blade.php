@extends('layout/template')
  <script src="{{url('js/jquery-3.5.1.min.js')}}"></script>

  <link  href="{{url('css/jquery.dataTables.min.css')}}" rel="stylesheet">

  <script src="{{url('js/jquery.dataTables.min.js')}}"></script>

@section('mybody')


<div class="flex mb-2">
    <button data-modal-target="excel" data-modal-toggle="excel" type="button" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
      <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
      </svg>
      UPLOAD BENEFICIARY VIA EXCEL
    </button>

    
    <button id="multiLevelDropdownButton" data-dropdown-toggle="dropdown" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2" type="button">
      <svg class="w-4 h-4 mr-2"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.133 2.6 5.856 6.9L8 14l4 3 .011-7.5 5.856-6.9a1 1 0 0 0-.804-1.6H2.937a1 1 0 0 0-.804 1.6Z"/>
      </svg>
      FILTER BENEFICIARY BY BARANGAY
      <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
      </svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="multiLevelDropdownButton">
          <li>
            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between font-bold w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
              BARANGAY
              <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
            </button>
              <div id="doubleDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdown">
                  @foreach($barangays as $brgy)
                    <li>
                      <a href="{{ url('beneficiary_roster/barangay?r?='.$regionfilter->region_c.'p='.$provincefilter->province_c.'p='.$brgy->barangay_c)}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$brgy->barangay_m}}</a>
                    </li>
                  @endforeach
                </ul>
            </div>
          </li>
        </ul>
    </div>
</div>
<br>

<div class="flex">
  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$regionfilter->abbreviation}} - {{$provincefilter->province_m}}</h5> 
</div>
<hr class="h-px my-2 bg-red-600 border-0"><br>

<!-- Main modal -->
<div id="form" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-6xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-red-900 dark:text-white">
                    + UPLOAD BENEFICIARY VIA EXCEL
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="form">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="container mx-auto px-4">
                  <div class="block w-full m-1 p-3 py-3 bg-white  rounded-lg shadow border-red-800">
                        <form>
                          <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="mb-6">
                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                              <input type="email" name="first_name" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
                            </div>
                            <div class="mb-6">
                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                              <input type="password" name="middle_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                            <div class="mb-6">
                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                              <input type="password" name="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                            <div class="mb-6">
                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Extension Name</label>
                              <input type="password" name="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                          </div>

                          <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="mb-6">
                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region</label>
                              <input type="email" name="first_name" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
                            </div>
                            <div class="mb-6">
                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                              <input type="email" name="first_name" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
                            </div>
                            <div class="mb-6">
                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City/Municipality</label>
                              <input type="password" name="middle_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                            <div class="mb-6">
                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay</label>
                              <input type="password" name="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                          </div>

                          <div class="grid md:grid-cols-3 md:gap-6">
                            <div class="mb-6">
                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
                              <input type="date" name="first_name" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
                            </div>
                            <div class="mb-6">
                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Relegion</label>
                              <input type="password" name="middle_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                            <div class="mb-6">
                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">4Ps ID</label>
                              <input type="password" name="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                          </div>

                          <div class="grid md:grid-cols-3 md:gap-6">
                            <div class="mb-6">
                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                              <input type="date" name="first_name" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
                            </div>
                            <div class="mb-6">
                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Occupation</label>
                              <input type="password" name="middle_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                            <div class="mb-6">
                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Net</label>
                              <input type="password" name="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                          </div>


                          <br>
                          <button type="submit" class="w-full text-sm border-red-800 border font-bold text-red-800 bg-none hover:bg-red-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">SUBMIT NEW RECORD</button>
                        </form>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="excel" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-red-900 dark:text-white">
                    + UPLOAD BENEFICIARY VIA EXCEL
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="excel">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="container mx-auto px-4">
                  <div class="block w-full m-1 p-3 py-3 bg-white  rounded-lg shadow border-red-800">
                        <form action="{{ route('beneficiary_roster.store') }}" method="post" enctype="multipart/form-data">
                         @csrf
                         <fieldset>
                            <div class="mb-6">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Excel file here:</label>
                                <input type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " name="uploaded_file" id="uploaded_file">
                            </div>
                          </fieldset>
                        <hr class="h-px my-2 bg-red-600 border-0"><br>
                          <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center ">SUBMIT NEW RECORD</button>
                        </form>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

<br>

<div class="container mx-auto px-4">
  <div class="block w-full m-1 p-3 py-3 bg-white border border-gray-200 rounded-lg shadow border-red-800">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">List of Beneficiaries</h5>
        <hr class="h-px my-2 bg-red-600 border-0"><br>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="data_table">
            <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            SERIAL #
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            NAME
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            PROVINCE
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            CITY/MUNICIPALITY
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                       <div class="flex items-center">
                            ACTION
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-l">
              @foreach($beneficiary_roster as $b)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-semibold text-m text-gray-900 whitespace-nowrap dark:text-white">
                        {{$b->serial_no}}
                    </th>
                    <td class="px-6 py-4">
                       {{$b->first_name}} {{$b->middle_name}} {{$b->last_name}}
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                          $province = DB::connection('mysql')->table('psgc_provinces')->where('province_c',$b->province_c)->first(); 
                        ?>
                        {{$province->province_m}}
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                          $citymun = DB::connection('mysql')->table('psgc_citymuns')->where('citymun_c',$b->citymun_c)->where('province_c',$b->province_c)->first(); 
                        ?>
                        {{$citymun->citymun_m}}
                    </td>
                    <td class="px-6 py-4 flex ">
                        <button data-modal-target="update{{$b->id}}" data-modal-toggle="update{{$b->id}}" type="button" class="items-center text-center text-green-700 border border-green-700 hover:bg-green-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800 dark:hover:bg-green-500" title="Update Beneficiary Roster Details">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z"/>
                          </svg>
                          <span class="sr-only">Icon description</span>
                        </button>


                        <button data-modal-target="fammembers{{$b->id}}" data-modal-toggle="fammembers{{$b->id}}" type="button" class="items-center text-center text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500" title="Family Members">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                            <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                            <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
                        </svg>
                          <span class="sr-only">Icon description</span>
                        </button>

                        <button data-modal-target="assistance{{$b->id}}" data-modal-toggle="assistance{{$b->id}}" type="button" class="items-center text-center text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500" title="Family Members">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                          </svg>
                          <span class="sr-only">Assistance Provided</span>
                        </button>

                        

                        <!-- Main modal -->
                        <div id="update{{$b->id}}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-6xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <svg class="w-4 h-4 text-red-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z"/>
                                            </svg> &nbsp;
                                        <h3 class="text-xl font-bold text-red-900 dark:text-white">
                                            UPDATE BENEFECIARY DETAILS
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update{{$b->id}}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <form>
                                          <div class="grid md:grid-cols-4 md:gap-6">
                                            <div class="mb-6">
                                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                              <input type="text" name="first_name" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$b->first_name}}" required>
                                            </div>
                                            <div class="mb-6">
                                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                                              <input type="text" name="middle_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$b->middle_name}}" required>
                                            </div>
                                            <div class="mb-6">
                                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                              <input type="text" name="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$b->last_name}}" required>
                                            </div>
                                            <div class="mb-6">
                                                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Extension Name</label>
                                                <select id="funddropdowns" name="ext_name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    <option value="{{$b->extname}}">{{$b->extname}}</option>
                                                    <option value="JR.">JR.</option>
                                                    <option value="SR.">SR.</option>
                                                    <option value="II">II</option>
                                                    <option value="III">III</option>
                                                    <option value="IV">IV</option>
                                                    <option value="V">V</option>
                                                    <option value="VI">VI</option>
                                                </select>
                                            </div>
                                          </div>

                                          <div class="grid md:grid-cols-4 md:gap-6">
                                            <div class="mb-6">
                                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region</label>
                                              <select id="region-dropdown" name="region_c" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                <?php $region_name = DB::connection('mysql')->table('psgc_regions')->where('region_c',$b->region_c)->first();  ?>
                                                    <option value="{{$b->region_c}}">{{$region_name->abbreviation}}</option>
                                                @foreach($regions as $r)
                                                    <option value="{{$r->region_c}}">{{$r->abbreviation}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                                              <select id="province-dropdown" name="province_c" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                <?php $province_name = DB::connection('mysql')->table('psgc_provinces')->where('region_c',$b->region_c)->where('province_c',$b->province_c)->first(); 
                                                    $prov = DB::connection('mysql')->table('psgc_provinces')->where('region_c',$b->region_c)->get(); 
                                                ?>
                                                    <option value="{{$b->province_c}}">{{$province_name->province_m}}</option>
                                                @foreach($prov as $p)
                                                    <option value="{{$p->province_c}}">{{$p->province_m}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City/Municipality</label>
                                               <select id="province-dropdown" name="citymun_c" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                <?php $citymun_name = DB::connection('mysql')->table('psgc_citymuns')->where('region_c',$b->region_c)->where('province_c',$b->province_c)->where('citymun_c',$b->citymun_c)->first(); 
                                                    $cm = DB::connection('mysql')->table('psgc_citymuns')->where('region_c',$b->region_c)->where('province_c',$b->province_c)->get(); 
                                                ?>
                                                    <option value="{{$citymun_name->citymun_c}}">{{$citymun_name->citymun_m}}</option>
                                                @foreach($cm as $cm)
                                                    <option value="{{$cm->citymun_c}}">{{$cm->citymun_m}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay</label>
                                              <select id="province-dropdown" name="brgy_c" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                <?php $brgy_name = DB::connection('mysql')->table('psgc_barangays')->where('region_c',$b->region_c)->where('province_c',$b->province_c)->where('citymun_c',$b->citymun_c)->where('barangay_c',$b->brgy_c)->first(); 
                                                    $bar = DB::connection('mysql')->table('psgc_barangays')->where('region_c',$b->region_c)->where('province_c',$b->province_c)->where('citymun_c',$b->citymun_c)->get(); 
                                                ?>
                                                    <option value="{{$brgy_name->barangay_c}}">{{$brgy_name->barangay_m}}</option>
                                                @foreach($bar as $bar)
                                                    <option value="{{$bar->barangay_c}}">{{$bar->barangay_m}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                          </div>

                                          <div class="grid md:grid-cols-3 md:gap-6">
                                            <div class="mb-6">
                                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
                                              <input type="date" name="bday" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$b->bday}}" required>
                                            </div>
                                            <div class="mb-6">
                                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Religion</label>
                                              <select id="province-dropdown" name="religion" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                <?php $rel = DB::connection('mysql')->table('religions')->where('id', $b->religion_id)->first(); ?>
                                                    <option value="{{$b->religion}}">{{$rel->name}}</option>
                                                @foreach($religions as $relig)
                                                    <option value="{{$relig->id}}">{{$relig->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">4Ps ID</label>
                                              @if($b->is_4ps_bene ==  'NO')
                                              <input type="text" name="is_4ps_bene" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="">
                                              @else
                                              <input type="text" name="is_4ps_bene" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$b->is_4ps_bene}}">
                                              @endif
                                            </div>
                                          </div>

                                          <div class="grid md:grid-cols-3 md:gap-6">
                                            <div class="mb-6">
                                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Civil Status</label>
                                              <select id="province-dropdown" name="civil_status" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    <option value="{{$b->civil_status}}">{{$b->civil_status}}</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="N/A">N/A</option>
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Occupation</label>
                                              <input type="text" name="occupation" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$b->occupation}}">
                                            </div>
                                            <div class="mb-6">
                                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Net</label>
                                              <input type="number" min="" value="{{$b->monthly_net}}" step="any" name="monthly_net" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                            </div>
                                          </div>

                                          <div class="grid md:grid-cols-3 md:gap-6">
                                            <div class="mb-6">
                                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Family Members</label>
                                              <input type="number" name="fam_members" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$b->fam_members}}">
                                            </div>
                                            <div class="mb-6">
                                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">House Ownership</label>
                                               <select id="province-dropdown" name="house_ownership" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    <option value="{{$b->house_ownership}}">{{$b->house_ownership}}</option>
                                                    <option value="Rented house & lot">Rented house & lot</option>
                                                    <option value="House owner & lot renter">House owner & lot renter</option>
                                                    <option value="House owner rent-free lot with owners consent">House owner rent-free lot with owners consent</option>
                                                    <option value="House owner rent-free lot w/o consent of the owner">House owner rent-free lot w/o consent of the owner</option>
                                                    <option value="Rent-free house & lot with owners consent">Rent-free house & lot with owners consent</option>
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Net</label>
                                              <input type="number" min="" value="{{$b->monthly_net}}" step="any" name="monthly_net" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                            </div>
                                          </div>

                                          <div class="grid md:grid-cols-4 md:gap-6">
                                            <div class="mb-6">
                                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                                               <select id="province-dropdown" name="code" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    <option value="{{$b->code}}">{{$b->code}}</option>
                                                    <option value="Older Person">Older Person</option>
                                                    <option value="PWD">PWD</option>
                                                    <option value="Pregnant Mother">Pregnant Mother</option>
                                                    <option value="Solo Parent">Solo Parent</option>
                                                    <option value="N/A">N/A</option>
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Housing Condition</label>
                                               <select id="province-dropdown" name="house_cond" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    <option value="{{$b->house_cond}}">{{$b->house_cond}}</option>
                                                    <option value="Partially Damaged">Partially Damaged</option>
                                                    <option value="Totally Damaged">Totally Damaged</option>
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Casualty</label>
                                              <input type="text" value="{{$b->casualty}}" step="any" name="casualty" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                            </div>
                                            <div class="mb-6">
                                              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Casualty</label>
                                              <select id="province-dropdown" name="health_cond" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    <option value="{{$b->health_cond}}">{{$b->health_cond}}</option>
                                                    <option value="With Illness">With Illness</option>
                                                    <option value="Without Illness">Without Illness</option>
                                                    <option value="N/A">N/A</option>
                                                </select>
                                            </div>
                                          </div>


                                          <br>
                                          <button type="submit" class="w-full text-sm border-red-800 border font-bold text-white bg-red-700  hover:bg-red-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">UPDATE RECORD</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main modal -->
                        <div id="fammembers{{$b->id}}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-6xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <svg class="w-4 h-4 text-red-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z"/>
                                            </svg> &nbsp;
                                        <h3 class="text-xl font-bold text-red-900 dark:text-white">
                                            FAMILY MEMBERS
                                        </h3>
                                        <div>
                                            
                                        </div>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="fammembers{{$b->id}}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div class="relative overflow-x-auto">
                                            <table class="w-full text-l text-left text-gray-500 dark:text-gray-400">
                                                <thead class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 rounded-l-lg">
                                                            Name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            RELATION TO FAMILY HEAD
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                                                            AGE
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                                                            GENDER
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                                                            CIVIL STATUS
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                                                            EDUCATION
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                                                            OCCUPATIONAL SKILLS
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                                                            REMARKS
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $fam = DB::connection('mysql')->table('bene_fam_members')->where('serial_no',$b->serial_no)->get();?>
                                                    @foreach($fam as $f)
                                                    <tr class="bg-white dark:bg-gray-800">
                                                        <th scope="row" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{$f->first_name}} {{$f->middle_name}} {{$f->last_name}}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{$f->rel_hh}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                           
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$f->gender}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$f->civil_status}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$f->educ}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$f->skill}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$f->remarks}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main modal -->
                        <div id="assistance{{$b->id}}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-6xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <svg class="w-4 h-4 text-red-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z"/>
                                            </svg> &nbsp;
                                        <h3 class="text-xl font-bold text-red-900 dark:text-white">
                                            ASSISTANCE PROVIDED
                                        </h3>
                                        <div>
                                            
                                        </div>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="assistance{{$b->id}}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div class="relative overflow-x-auto">
                                            <table class="w-full text-l text-left text-gray-500 dark:text-gray-400">
                                                <thead class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                                     <tr>
                                                        <th scope="col" class="px-6 py-3 rounded-l-lg">
                                                            Date
(DD/MM/YYYY)
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Kind / Type
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                                                            Quantity
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                                                            Cost
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                                                            Provider
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $asst = DB::connection('mysql')->table('assistance_records')->where('serial_no',$b->serial_no)->get();?>
                                                    @foreach($asst as $a)
                                                    <tr class="bg-white dark:bg-gray-800">
                                                        <th scope="row" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{$a->date}}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{$a->kind_type}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$a->qty}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$a->cost}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$a->provider}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
</div>



@stop

  <script src="{{url('cdn/jquery.dataTables.min.js')}}"></script>

    <script type="text/javascript">
    $(document).ready( function () {
        $('#data_table').DataTable({
          responsive: true, 
        });
    } );

  </script>