@extends('layout/template')
  <script src="{{url('js/jquery-3.5.1.min.js')}}"></script>

  <link  href="{{url('css/jquery.dataTables.min.css')}}" rel="stylesheet">

  <script src="{{url('js/jquery.dataTables.min.js')}}"></script>

@section('mybody')


<!-- Modal toggle -->
<button data-modal-target="aaddnewuser" data-modal-toggle="addnewuser" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
+ ADD NEW USER
</button>
<br>
<!-- Main modal -->
<div id="addnewuser" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addnewuser">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">ADD NEW USER</h3>
                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <select name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                          <option value="">Choose User</option>
                          @foreach($employees as $e)
                            <option value="{{$e->id}}">{{$e->name}}</option>
                          @endforeach
                          
                        </select>

                        <br>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Level</label>
                        <select name="user_level"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                          <option value="">Choose User Level</option>
                          <option value="ADMIN">ADMIN</option>
                          <option value="USER">USER</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">SUBMIT NEW USER</button>
                    
                </form>
            </div>
        </div>
    </div>
</div> 

<div class="container mx-auto px-4">
  <div class="block w-full m-1 p-3 py-3 bg-white border border-gray-200 rounded-lg shadow border-red-800">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">List of Beneficiaries</h5>
        <hr class="h-px my-2 bg-red-600 border-0"><br>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="data_table">
            <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            NAME
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                       <div class="flex items-center">
                            LOGS
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-l">
            @foreach($users as $u)
                <tr>
                    <th scope="col" class="px-6 py-3">
                       <div class="flex items-center">
                            {{$u->name}}
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                       <div class="flex items-center">
                                <!-- Modal toggle -->
                                <button data-modal-target="logs{{$u->id}}" data-modal-toggle="logs{{$u->id}}" class="flex block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                                    <svg class="h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="none" viewBox="0 0 22 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0v3H6V2m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M5 5h8m-5 5h5m-8 0h.01M5 14h.01M8 14h5"/>
                                    </svg>
                                    Lists
                                </button>

                                <!-- Main modal -->
                                <div id="logs{{$u->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="logs{{$u->id}}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">LIST OF LOGS</h3>
                                                
                                                    <?php $logs = DB::connection('mysql')->table('audit_logs')
                                                            ->where('user_id', $u->user_id)
                                                            ->get();
                                                    ?>
                                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="data_table">
                                                    <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                                <div class="flex items-center">
                                                                    ACTION TAKEN
                                                                </div>
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                               <div class="flex items-center">
                                                                    REMARKS
                                                                </div>
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                               <div class="flex items-center">
                                                                    DATE
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-l">
                                                        @foreach($logs as $l)
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                               <div class="flex items-center">
                                                                    {{$l->action}} 
                                                                </div>
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                               <div class="flex items-center">
                                                                    {{$l->log}} 
                                                                </div>
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                               <div class="flex items-center">
                                                                    {{$l->created_at}} 
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                        </div>
                    </th>
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