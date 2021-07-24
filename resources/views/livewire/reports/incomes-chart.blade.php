
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
               <div class="page_head float-left">
                <span class="reportTitle">Report showing incomes made over months</span> 
                <span class="float-right btn_refrs">
                    <span><i class="text-success">Select a graph to view</i></span>
                      <select class="form-control nunito-font" id="chart">
                         <option value="barchart">Bar graph</option>
                         <option  value="linechart">Line graph</option>
                         <option  value="piechart">Pie graph</option>
                     </select>
             </span>
         </div>

         <canvas id="canvas" height="250" width="600" class="nunito-font"></canvas>

     </div>
 </div>
</div>
</div>



<script type="text/javascript">

  $(document).ready(function(){

    var chart_data = {!! json_encode($chartdata) !!};
    if (chart_data != undefined || chart_data.length > 0) {
      chartdata = chart_data;
  }

  var barchartTitle = "Barchart showing income generated over months";
  var piechartTitle = "Piechart showing income generated over months";
  var linechartTitle = "Areachart showing income generated over months";
  $('.reportTitle').html(barchartTitle);

  $(window).on('load', function(){
   getIncomeData('bar');
});

  detectGraphChange();

  function detectGraphChange() {
      $("#chart").change(function(){
        var option = $('#chart').val();

        switch(true)
        {
          case option == "linechart":
          $('.reportTitle').html(linechartTitle);
          getIncomeData('line');
          break;
          case option == "barchart":
          $('.reportTitle').html(barchartTitle);
          getIncomeData('bar');
          break;
          case option == "piechart":
          $('.reportTitle').html(piechartTitle);
          getIncomeData('pie');
          break;
          default:
          $('.reportTitle').html(barchartTitle);
          getIncomeData('bar');

      }

  });
  }


  function getIncomeData(chart){

      if(chart == 'bar'){
        drawBarChart(chartdata);
    }
    else if(chart == 'pie'){
        drawPieChart(chartdata);
    }
    else if(chart == 'line'){
        drawLineChart(chartdata);
    }


}


function drawLineChart(response){

  var ctx = document.getElementById("canvas").getContext('2d');
  if(window.bar != undefined)
     window.bar.destroy();
 window.bar = new Chart(ctx, {
  type: 'line',
  data: {
    labels: response.months,
    datasets:[{
      label:"Income generated",
      lineTension:0.3,
      backgroundColor:'rgba(2,117,216,0.2)',
      borderColor:'rgba(2,117,216,1)',
      pointRadius:5,
      pointHoverRadius:5,
      pointHoverBackgroundColor:'rgba(2,117,216,1)',
      pointHitRadius:5,
      pointBorderWidth:2,
      data:response.income,

  }],
},


options: {
 tooltips: {
    callbacks: {
      label: function(tooltipItem, data) {
        return tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }
}
},

scales: {
    xAxes: [{
      time: {
        unit: 'date'
    },
    scaleLabel: {
        display: true,
        labelString: 'Months of the year'
    },
    gridLines:{
        display:true
    },
    ticks: {
        maxTicksLimit:24,
    },
    gridLines:{
        color: "rgba(0,0,0,0.125)",
    }
}],
yAxes: [{
            //    ticks: {
            //   min:0,
            //   max:response.max,
            //   maxTicksLimit:5,
            //   beginAtZero:true
            // },
            scaleLabel: {
              display: true,
              labelString: "Income generated"
          },
          gridLines:{
              color: "rgba(0,0,0,0.125)",
          }
      }]
  }
},
legend:{
    display:true
}
});
}

function drawBarChart(response){
    var ctx = document.getElementById("canvas").getContext('2d');
    var date = response.months+" "+response.years;
    if(window.bar != undefined)
       window.bar.destroy();
   window.bar= new Chart(ctx, {
    type: 'bar',
    data: {
      labels: response.months,
      datasets:[{
        label:'income',
        data: response.income,
        backgroundColor: 'rgba(2,117,216,0.7)',

        // ['#b87333','orange','grey','#B1FB17',
        // '#000','#82caff',
        // '#7D0552',"#3e95cd", "#8e5ea2","#3cba9f","#800000","#c45850",'#808000',
        // '#008000', '#000080', '#ff00ff', '#008080','#ff0000',
        // ],
        borderColor: '#82caff',
          // hoverBackgroundColor: '#CCCCCC',
          hoverBorderColor: '#666666'
      }],
  },
  options: {
     tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            return tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    }
},
scales: {
    xAxes: [{
      scaleLabel: {
        display: true,
        labelString: 'Months of the year'
    }
}],
yAxes: [{
   scaleLabel: {
     display: true,
     labelString: 'Income generated'
 }
}]
} ,
},
legend:{
    display:true
}
});
}

function drawPieChart(response){

  var ctx = document.getElementById("canvas").getContext('2d');

  if(window.bar != undefined)
    window.bar.destroy();
window.bar = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: response.months,
      datasets:[{
        label:'income',
        data: response.income,
        backgroundColor: ['#b87333','orange','grey','#B1FB17',
        'white','#82caff',
        '#7D0552','#006400','#4B0082',
        'pink','black','red'
        ],
        borderColor: '#b87333',
            // hoverBackgroundColor: '#CCCCCC',
            hoverBorderColor: '#666666',
        }],
    },
    options: {
       tooltips: {
          callbacks: {
            label: function(tooltipItem, data) {
              return tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
          }
      }
  },
  plugins: {
   datalabels: {
     formatter: (value, ctx) => {
       var k = response.income;
       var sum = 0;
       for(let i=0; i<k.length; i++){
          sum += k[i];
          percent = Math.round(k[i]/sum);
      }
      return ""+percent+"%";
  },
  color: '#000',
}
},
legend: {
    display: true,
    position: 'right',
},

tooltips: {
    enabled: true
},

},



});
}

});

</script>


