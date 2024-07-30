<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FACED-IS</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/js/app.js']);

  
<style type="text/css">
  @media (min-width: 1200px)
.container {
    width: 1170px;
    }

</style>
  <noscript>
    <img src="https://probe.dswdfo1.com/ingress/85e05214-cce2-4a91-83ee-fc6ca111d6f9/{{$session->user_id}}/pixel.gif">
</noscript>
<script defer src="https://probe.dswdfo1.com/ingress/85e05214-cce2-4a91-83ee-fc6ca111d6f9/{{$session->user_id}}/script.js"></script>

</head>
<body>


<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 border border-gray-200 shadow">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-black-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="" class="flex ml-2 md:mr-24">
          <strong class="text-red-700 text-xl">FAMILY ASSISTANCE CARD IN EMERGENCIES AND DISASTERS (FACED) INFORMATION SYSTEM</strong><br>
        </a>
      </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border border-gray-200 shadow  sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
    <div class="flex flex-col items-center justify-center flex-shrink-0 px-4 pt-8 py-2 mx-4 rounded-lg neumorphism-shadow">
          <img src="{{url('images/logo.png')}}" class="w-12 h-12 p-px -mt-8 rounded-full neumorphism-shadow" alt="DSWD LOGO" />
          <a href="#"  class="mt-3 px-4 py-1  rounded-md text-xl font-semibold tracking-wider text-gray-600 focus:ring focus:outline-none">FACED-IS</a>
      </div>
      <ul class="space-y-2">
              <li>
                <a href="{{ route('dashboard.index')}}"  class="flex items-center rounded-lg neumorphism-shadow px-4 py-2 text-black-600 transition-transform transform rounded-md hover:bg-red-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50  font-bold" >
                  <span>
                    <svg class="h-6 w-6 text-red-400 hover:text-white transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v1M5 19h5m-9-9h5m4-4h8a1 1 0 0 1 1 1v12H9V7a1 1 0 0 1 1-1Zm6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                    </svg>
                  </span>
                  <span class="ml-2 font-medium">Dashboard</span>
                </a>
              </li>

              @if($session->user_level == 'USER')
              <li>
                <a href="{{ route('beneficiary_roster.index')}}"  class="flex items-center rounded-lg neumorphism-shadow px-4 py-2 text-black-600 transition-transform transform rounded-md hover:bg-red-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50 font-bold" >
                  <span>
                    <svg class="h-6 w-6 text-red-400 hover:text-white transition"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                    </svg>
                  </span>
                  <span class="ml-2 font-medium">Beneficiaries</span>
                </a>
              </li>

              <li>
                <a href="{{ route('units.index')}}"  class="flex items-center rounded-lg neumorphism-shadow px-4 py-2 text-black-600 transition-transform transform rounded-md hover:bg-red-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50 font-bold" >
                  <span>
                    <svg class="h-6 w-6 text-red-400"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 3h4M8 17h4m-9-5V8m14 4V8M1 1h4v4H1V1Zm14 0h4v4h-4V1ZM1 15h4v4H1v-4Zm14 0h4v4h-4v-4Z"/>
                    </svg>
                  </span>
                  <span class="ml-2 font-medium">Units</span>
                </a>
              </li>
            @endif

              @if($session->user_level == 'ADMIN')
              <li>
                <a href="{{ route('logs.index')}}"  class="flex items-center rounded-lg neumorphism-shadow px-4 py-2 text-black-600 transition-transform transform rounded-md hover:bg-red-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50 font-bold" >
                  <span>
                    <svg class="h-6 w-6 text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none" viewBox="0 0 18 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0v3H6V2m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M5 5h8m-5 5h5m-8 0h.01M5 14h.01M8 14h5"/>
                    </svg>
                  </span>
                  <span class="ml-2 font-medium">Audit Logs</span>
                </a>
              </li>
            @endif
          
</ul>
<div class="flex fixed bottom-0  py-2">
              <button id="dropdownRightButton" data-dropdown-toggle="dropdownRight" data-dropdown-placement="right" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                  <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div> &nbsp; {{$session->name}} <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg></button>

              <!-- Dropdown menu -->
              <div id="dropdownRight" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRightButton">
                    <li>
                      <!-- Modal toggle -->
                      <a data-modal-target="userupdate" data-modal-toggle="userupdate" class="block text-blue-700 rounded px-4 py-2 hover:underline" >
                        {{$session->name}} ({{$session->user_level}})
                      </a>
                    </li>
                     <li>
                      <a href="#" type="button" class="block rounded px-4 py-2 ">{{$session->email}}</a>
                    </li>
                    <li>
                      <a href="{{url('logout')}}" type="button" class="block rounded px-4 py-2 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white"><b>LOGOUT</b></a>
                    </li>
                  </ul>
              </div>
          </div>

   </div>
</aside>

<!-- USER UPDATE modal -->
                      <div id="userupdate" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                          <div class="relative w-full max-w-md max-h-full">
                              <!-- Modal content -->
                              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="userupdate">
                                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                      </svg>
                                      <span class="sr-only">Close modal</span>
                                  </button>
                                  <div class="px-6 py-6 lg:px-8">
                                      <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">UPDATE YOUR DETAILS</h3>
                                      <form action="{{ route('users.update',$session->uuid) }}" method="POST" enctype="multipart/form-data">
                                         @csrf
                                          @method('PUT')
                                          <div>
                                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAME</label>
                                              <input type="text" name="name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$session->name}}" >
                                          </div>
                                          <br>

                                          <div>
                                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EMAILd</label>
                                              <input type="email" name="email" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  value="{{$session->email}}" >
                                          </div>
                                          <br>
                                          <input type="hidden" name="id" value="{{$session->id}}">
                                          <br>
                                          <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">UPDATE DETAILS</button>
                                         
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div> 
<div class="p-4 sm:ml-64 ">
   <div class="p-4 border-1 bg-white border-spacing-0 rounded-lg dark:border-gray-700 mt-14 border border-gray-100">
       <main role="main" class="flex-shrink-0">
       
             <nav class="py-3 bg-none text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg navbar navbar-expand-lg navbar-light">
              <div class="container-fluid px-6">
                <nav class="bg-grey-light items-left rounded-md " aria-label="breadcrumb">
                  <ol class="list-reset items-left flex text-left">
                    <li>
                      <p class="items-right  text-gray-500 hover:text-gray-600 ">
                        <strong>{{$title}}</strong>
                      </p>
                    </li>
                    <li>
                      <span class="text-gray-500 mx-2">/</span>
                    </li>
                    <li>
                      <p class="items-right  text-gray-500 hover:text-gray-600 ">
                        <strong>{{$title2}}</strong>
                      </p>
                    </li>
                  </ol>
                </nav>
              </div>
          </nav>
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            @if(session()->has('success'))
            <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
              <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                  <p class="font-bold">SUCCESS!</p>
                  <p class="text-sm">{{ session()->get('success') }}</p>
                </div>
              </div>
            </div>
            @endif
            @if(session()->has('error'))
            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
              <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                  <p class="font-bold">ERROR!</p>
                  <p class="text-sm">{{ session()->get('error') }}</p>
                </div>
              </div>
            </div>
            @endif
         <div class="container mx-auto ">
            @yield('mybody')
         </div>
    </main>

   </div>
</div>




</body>


<footer class="p-4 sm:ml-64">
    <div class="w-full max-w-screen-xl mx-auto">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 DSWD RICTMS FO 1 - </a> All Rights Reserved.</span>
    </div>
</footer>


</html>