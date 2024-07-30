@extends('layout/template')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@section('mybody')

<div class="max-auto w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

   

  <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
      <div class="grid grid-cols-1 gap-1 mb-2">
      <dl class="bg-red-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-10 h-10 rounded-full bg-red-100 dark:bg-gray-500 text-16BDCA-600 dark:text-16BDCA-300 text-xl font-medium flex items-center justify-center mb-1">{{$bene}}</dt>
        <dd class="text-red-600 font-semibold dark:text-red-300 text-sm "><b>TOTAL BENEFICIARIES</b></dd>
      </dl>
    </div>
    <div class="grid grid-cols-4 gap-4 mb-2">
      <dl class="bg-red-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-red-100 dark:bg-gray-500 text-red-600 dark:text-red-300 text-sm font-medium flex items-center justify-center mb-1">{{$in}}</dt>
        <dd class="text-red-600 dark:text-red-300 text-sm font-medium">Ilocos Norte</dd>
      </dl>
      <dl class="bg-red-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-red-100 dark:bg-gray-500 text-red-600 dark:text-red-300 text-sm font-medium flex items-center justify-center mb-1">{{$is}}</dt>
        <dd class="text-red-600 dark:text-red-300 text-sm font-medium">Ilocos Sur</dd>
      </dl>
      <dl class="bg-red-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-red-100 dark:bg-gray-500 text-red-600 dark:text-red-300 text-sm font-medium flex items-center justify-center mb-1">{{$lu}}</dt>
        <dd class="text-red-600 dark:text-red-300 text-sm font-medium">La Union</dd>
      </dl>
      <dl class="bg-red-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-red-100 dark:bg-gray-500 text-red-600 dark:text-red-300 text-sm font-medium flex items-center justify-center mb-1">{{$p}}</dt>
        <dd class="text-red-600 dark:text-red-300 text-sm font-medium">Pangasinan</dd>
      </dl>
    </div>
  </div>

  <!-- Radial Chart -->
  <!-- <div class="py-6" id="radial-chart"></div> -->
<br>
</div>
<br>
  <div class="bg-gray-300 dark:bg-gray-700 p-3 rounded-lg">
    <p class="text-sm font-medium">Total Number of Assistance Provided per Region (Male & Female)</p><br>
    <div class="grid grid-cols-2 gap-4 mb-2">
      <dl class="bg-blue-300 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-16BDCA-600 dark:text-16BDCA-300 text-sm font-medium flex items-center justify-center mb-1">{{$totalmale}}</dt>
        <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">MALE</dd>
      </dl>
      <dl class="bg-green-300 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-green-100 dark:bg-gray-500 text-green-600 dark:text-green-300 text-sm font-medium flex items-center justify-center mb-1">{{$totalfemale}}</dt>
        <dd class="text-green-600 dark:text-green-300 text-sm font-medium">FEMALE</dd>
      </dl>
    </div>
        <div id="chart">
        </div>

  </div><br>
  
  <div class="bg-gray-300 dark:bg-green-400 p-3 rounded-lg">

    <p class="text-sm font-medium">Total Number of Assistance Provided per Category</p><br>
        <div id="sectoral" class="flex flex-col items-center justify-center">
        </div>
  </div>




@stop


<script>


  // ApexCharts options and config
  window.addEventListener("load", function() {
    const getChartOptions = () => {
        return {
          series: [{{$cnt_in}}, {{$cnt_is}}, {{$cnt_lu}}, {{$cnt_p}}],
          colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#355E3B"],
          chart: {
            height: "380px",
            width: "100%",
            type: "radialBar",
            sparkline: {
              enabled: true,
            },
          },
          plotOptions: {
            radialBar: {
              track: {
                background: '#E5E7EB',
              },
              dataLabels: {
                show: true,
              },
              hollow: {
                margin: 0,
                size: "12%",
              },            },
          },
          grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
              left: 2,
              right: 2,
              top: -23,
              bottom: -20,
            },
          },
          labels: ["Ilocos Norte","Ilocos Sur", "La Union", "Pangasinan"],
          legend: {
            show: true,
            position: "bottom",
            fontFamily: "Inter, sans-serif",
          },
          tooltip: {
            enabled: false,
            x: {
              show: true,
            },
          },
          yaxis: {
            show: false,
            labels: {
              formatter: function (value) {
                return value + '% ' ;
              }
            }
          }
        }
      }
      
      if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
        var chart = new ApexCharts(document.querySelector("#radial-chart"), getChartOptions());
        chart.render();
      }

      var options = {
          series: [{
          name: 'MALE',
          data: [{{$in_m_a}}, {{$is_m_a}}, {{$lu_m_a}}, {{$p_m_a}}]
        }, {
          name: 'FEMALE',
          data: [{{$in_fm_a}}, {{$is_fm_a}}, {{$lu_fm_a}}, {{$p_fm_a}}]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded',
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['ILOCOS NORTE', 'ILOCOS SUR', 'LA UNION', 'PANGASINAN'],
        },
        yaxis: {
          title: {
            text: 'Beneficiary/s Provided'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return  val + " Asisstance"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();



       var options = {
          series: [{{$totalna}}, {{$totalolder}}, {{$totallactating}}, {{$totalpwd}}, {{$totalpregnant}}, {{$totalsolo}}],
          chart: {
          width: '40%',
          type: 'pie',
        },
        labels: ['N/A', 'Older Person', 'Lactating Mother', 'PWD', 'Pregnant Mother', 'Solo Parent'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#sectoral"), options);
        chart.render();
      
      
    
    

      
  });
</script>