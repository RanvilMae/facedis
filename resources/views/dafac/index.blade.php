@extends('layout/template')

@section('mybody')

<div class="container max-full mx-auto px-4 ">
  <div class="block w-full m-1 p-3 py-3 bg-white border border-gray-200 rounded-lg shadow border-red-800">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Disaster Assistance Family Acces Card Form</h5>
        <hr class="h-px my-2 bg-red-600 border-0"><br>
        <form>
          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region</label>
               <input type="text" name="region" value="1" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial Number</label>
                <input type="text" name="serial_no" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>
          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province/District</label>
               <input type="text" name="region"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            </div>
            <div class="relative z-0 w-full mb-6 group">
                
            </div>
          </div>
          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City/Municipality/Brgy.</label>
                <input type="text" name="serial_no" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                
            </div>
          </div>
          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay Evacuation Center/Site</label>
                <input type="text" name="serial_no" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>

          <h2 class="mb-2 text-m font-bold tracking-tight text-red-700 dark:text-white">HEAD OF THE FAMILY</h2>
          <hr class="h-px my-2 bg-red-600 border-0"><br>

          <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SURNAME</label>
               <input type="text" name="region"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            </div>
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">FIRST NAME</label>
               <input type="text" name="region"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MIDDLE NAME</label>
                <input type="text" name="serial_no" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>

          <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE OF BIRTH</label>
               <input type="text" name="region"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            </div>
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">OCCUPATION</label>
               <input type="text" name="region"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MONTHLY NET INCOME</label>
                <input type="text" name="serial_no" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>

          <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GENDER</label>
               <input type="text" name="region"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            </div>
            <div class="relative z-0 w-full mb-6 group">
               <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CIVIL STATUS</label>
               <input type="text" name="region"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">AGE</label>
                <input type="text" name="serial_no" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>

          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="bordered-checkbox-1" type="checkbox" value="" name="bordered-checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="bordered-checkbox-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4Ps Beneficiary</label>
            </div>
             <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="bordered-checkbox-1" type="checkbox" value="" name="bordered-checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="bordered-checkbox-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">IP - Type of Ethnicity</label>
                <input type="text" name="serial_no" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>
          <br>
          <h2 class="mb-2 text-m font-bold tracking-tight text-red-700 dark:text-white">FAMILY MEMBERS</h2>
          <hr class="h-px my-2 bg-red-600 border-0"><br>

          <div class="relative overflow-x-auto px-6">
              <table class="w-full text-sm text-left text-gray-500">
                  <thead class="text-xs text-gray-700 uppercase bg-red-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              Family Members
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Relation to the Family Head
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Age
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Gender
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Civil Status
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Educ.
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Occupational Skills
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Remarks
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              Apple MacBook Pro 17"
                          </th>
                          <td class="px-6 py-4">
                              Silver
                          </td>
                          <td class="px-6 py-4">
                              Laptop
                          </td>
                          <td class="px-6 py-4">
                              $2999
                          </td>
                          <td class="px-6 py-4">
                              $2999
                          </td>
                          <td class="px-6 py-4">
                              $2999
                          </td>
                          <td class="px-6 py-4">
                              $2999
                          </td>
                          <td class="px-6 py-4">
                              $2999
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <br><br>


          <button type="submit" class="w-full bg-red-700 text-white hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">SUBMIT NEW RECORD</button>
        </form>

  </div>

</div>



    


@stop