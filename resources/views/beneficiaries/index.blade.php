@extends('layout/template')
  <script src="{{url('js/jquery-3.5.1.min.js')}}"></script>

  <link  href="{{url('css/jquery.dataTables.min.css')}}" rel="stylesheet">

  <script src="{{url('js/jquery.dataTables.min.js')}}"></script>

  <noscript>
        <img src="https://probe.dswdfo1.com/ingress/39cae83a-93d1-4e2b-bbed-4a5aa53cdcf5/{{$session->user_id}}/pixel.gif">
  </noscript>
  <script defer src="https://probe.dswdfo1.com/ingress/39cae83a-93d1-4e2b-bbed-4a5aa53cdcf5/{{$session->user_id}}/script.js">
  </script>

@section('mybody')


<div class="flex">
  <button data-modal-target="excel" data-modal-toggle="excel" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
    + Upload Beneficiaries via Excel
  </button>
&nbsp;
  <!-- Modal toggle -->
  <button data-modal-target="form" data-modal-toggle="form" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
    + Upload Beneficiary
  </button>
</div>

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
                        <form action="{{ route('beneficiaries.store') }}" method="post" enctype="multipart/form-data">
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
              @foreach($beneficiaries as $b)
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
                        <button data-modal-target="update{{$b->id}}" data-modal-toggle="update{{$b->id}}" type="button" class="items-center text-center text-green-700 border border-green-700 hover:bg-green-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800 dark:hover:bg-green-500" title="Update Beneficiary Details">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z"/>
                          </svg>
                          <span class="sr-only">Icon description</span>
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
                                          <button type="submit" class="w-full text-sm border-red-800 border font-bold text-white bg-red-700  hover:bg-red-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">SUBMIT NEW RECORD</button>
                                        </form>
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