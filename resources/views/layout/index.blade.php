@extends('layout.layout-maker')
 
  <script src="{{url('js/jquery-3.5.1.min.js')}}"></script>

  <link  href="{{url('css/jquery.dataTables.min.css')}}" rel="stylesheet">

  <script src="{{url('js/jquery.dataTables.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <noscript>
        <img src="https://probe.dswdfo1.com/ingress/39cae83a-93d1-4e2b-bbed-4a5aa53cdcf5/{{$session->user_id}}/pixel.gif">
  </noscript>
  <script defer src="https://probe.dswdfo1.com/ingress/39cae83a-93d1-4e2b-bbed-4a5aa53cdcf5/{{$session->user_id}}/script.js">
  </script>
   
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    text: "FUND CLUSTER APPROPRIATIONS"
  },  
  axisY: {
    title: "-",
    titleFontColor: "#4F81BC",
    lineColor: "#4F81BC",
    labelFontColor: "#4F81BC",
    tickColor: "#4F81BC"
  },
   
  toolTip: {
    shared: true
  },
  legend: {
    cursor:"pointer",
    itemclick: toggleDataSeries
  },
  data: [{
    type: "column",
    name: "ISSUED",
    legendText: "Proven Oil Reserves",
    showInLegend: true, 
    dataPoints:[
      { label: "Regular Fund", y: {{$issuedcnt1}} },
      { label: "GOP", y: {{$issuedcntgop}} },
      { label: "World Bank", y: {{$issuedcntworld}} },
      { label: "Training Trust Fund", y: {{$issuedcntt}} }
    ]
  },
  {
    type: "column", 
    name: "VERIFIED",
    legendText: "Oil Production",
    axisYType: "secondary",
    showInLegend: true,
    dataPoints:[
      { label: "Regular Fund", y: {{$vercnt1}} },
      { label: "GOP", y: {{$vercntgop}} },
      { label: "World Bank", y: {{$vercntworld}} },
      { label: "Training Trust Fund", y: {{$vercntt}} }
    ]
  },
  {
    type: "column", 
    name: "CANCELLED",
    legendText: "Oil Production",
    axisYType: "secondary",
    showInLegend: true,
    dataPoints:[
      { label: "Regular Fund", y: {{$cancelcnt1}} },
      { label: "GOP", y: {{$cancelcntgop}} },
      { label: "World Bank", y: {{$cancelcntworld}} },
      { label: "Training Trust Fund", y: {{$cancelcntt}}}
    ]
  }]
});
chart.render();

function toggleDataSeries(e) {
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else {
    e.dataSeries.visible = true;
  }
  chart.render();
}

}
</script>
  

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="h-auto max-w-full rounded-lg p-6 bg-white  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h2 class="mb-2 text-l font-bold tracking-tight text-blue-400 dark:text-white">Total No. of Checks</h2>
        <p class="mb-3  text-blue-900 font-bold  dark:text-gray-400">{{$acics}}</p>
       
    </div>
    <div class="h-auto max-w-full rounded-lg p-6 bg-white  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h2 class="mb-2 text-l font-bold tracking-tight text-blue-400 dark:text-white">Total Checks Issued</h2>
        <p class="mb-3  text-blue-900 font-bold  dark:text-gray-400">{{$checks}}</p>
       
    </div>
     <div class="h-auto max-w-full rounded-lg p-6 bg-white   border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h2 class="mb-2 text-l font-bold tracking-tight text-blue-400  dark:text-white">Total Cancelled Checks</h2>
        <p class="mb-3  text-blue-900 font-bold  dark:text-gray-400">{{$cancelled}}</p>
        
    </div>
     <div class="h-auto max-w-full rounded-lg p-6 bg-white   border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h2 class="mb-2 text-l font-bold tracking-tight text-blue-400  dark:text-white">Total Veriffied Checks</h2>
        <p class="mb-3  text-blue-900 font-bold  dark:text-gray-400">{{$verrified}}</p>
       
    </div>
    
</div>
<br>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-center">
  <div class="h-auto max-w-full rounded-lg p-6 bg-transparent border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
       <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
  </div>
  <div class="h-auto max-w-full rounded-lg p-6 bg-transparent border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
  </div>
</div>
<script>
var xValues = ["ISSUED", "VERIFIED", "CANCELLED"];
var yValues = [{{$checks}}, {{$verrified}}, {{$cancelled}}, {{$acics}}];
var barColors = ["green", "blue","red"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Check Status"
    }
  }
});

</script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
@endsection

  