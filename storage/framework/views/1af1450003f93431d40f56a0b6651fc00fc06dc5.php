 <!-- Main content -->
 <section class="content">
    <!-- Info boxes -->
    <div class="row">
       <!-- /.col -->
       <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('requests.pending.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pending ReQs</span>
            <span class="info-box-number">
                <?php if(isset($data['total_pending_requests'])): ?>
                <?php echo e(number_format($data['total_pending_requests'])); ?>

                <?php endif; ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
</a>
      <!-- /.col -->
     
        <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('requests.approved.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Approved ReQs</span>
            <span class="info-box-number">
                <?php if(isset($data['total_approved_requests'])): ?>
                <?php echo e(number_format($data['total_approved_requests'])); ?>

                <?php endif; ?>
            </span>
          </div>
        </div>
      </a>

     


      <!-- /.col -->
      <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('clients.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-balance-scale"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">clients</span>
            <span class="info-box-number">
              <?php if(isset($data['total_clients'])): ?>
              <?php echo e(number_format($data['total_clients'])); ?>

              <?php endif; ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
</a>
      

      <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('parking.areas.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-black"><i class="fa fa-file-archive-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Parking Areas</span>
            <span class="info-box-number">
              <?php if(isset($data['total_parking_areas'])): ?>
              <?php echo e(number_format($data['total_parking_areas'])); ?>

              <?php endif; ?>
            </span>
          </div>
        </div>
       </a>
   




      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('users.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total  Users</span>
            <span class="info-box-number">
              <?php if(isset($data['total_users'])): ?>
              <?php echo e(number_format($data['total_users'])); ?>

              <?php endif; ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
       </a>

    <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('vehicle.category.index')); ?>">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-file-archive-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Vehicle Types</span>
          <span class="info-box-number">
            <?php if(isset($data['total_parking_areas'])): ?>
            <?php echo e(number_format($data['total_parking_areas'])); ?>

            <?php endif; ?>
          </span>
        </div>
      </div>
     </a>


     <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="">
      <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="fa fa-file-archive-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Monthly income</span>
          <span class="info-box-number">
            <?php if(isset($data['current_month_income'])): ?>
            <?php echo e(number_format($data['current_month_income'])); ?>

            <?php endif; ?>
          </span>
        </div>
      </div>
     </a>

     <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-file-archive-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"> Last month </span>
          <span class="info-box-number">
            <?php if(isset($data['total_clients'])): ?>
            <?php echo e(number_format($data['last_month_income'])); ?>

            <?php endif; ?>
          </span>
        </div>
      </div>
     </a>

    </div>


    <div class="row">

      <div class="col-md-6 col-sm-6 col-xs-12 homelink">
       <div class="info-box">
                 <span class="info-box-text text-center">Barchart of approved parking requests Vs months</span>
                   <canvas id="bar_chart_canvas" height="300" width="600" class="nunito-font"></canvas>
       </div>
   </div>

   <div class="col-md-6 col-sm-6 col-xs-12 homelink">
       <div class="info-box">
                   <span class="info-box-text text-center">Areachart showing income generated over months</span>
                   <canvas id="line_graph_canvas" height="300" width="600" class="nunito-font"></canvas>
          
       </div>
   </div>

</div>
  </section>

  <script type="text/javascript">

    $(document).ready(function(){

      var request_data = <?php echo json_encode($request_data); ?>;
      if (request_data != undefined || request_data.length > 0) {
          request_data = request_data;
      }

      var income_data = <?php echo json_encode($income_data); ?>;
      if (income_data != undefined || income_data.length > 0) {
          income_data = income_data;
      }

    detectGraphChange();

    function detectGraphChange() {
      drawBarChart(request_data);
      drawLineChart(income_data);
  }

  function drawLineChart(response){

    var ctx = document.getElementById("line_graph_canvas").getContext('2d');
    new Chart(ctx, {
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
  var ctx = document.getElementById("bar_chart_canvas").getContext('2d');
  var date = response.months+" "+response.years;
  new Chart(ctx, {
      type: 'bar',
      data: {
        labels: response.months,
        datasets:[{
          label:'Number of requests',
          data: response.requests,
          backgroundColor: ['#b87333','orange','grey','#B1FB17',
          '#000','#82caff',
          '#7D0552',"#3e95cd", "#8e5ea2","#3cba9f","#800000","#c45850",'#808000',
          '#008000', '#000080', '#ff00ff', '#008080','#ff0000',
          ],
          borderColor: '#82caff',
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
 labelString: 'Number of requests'
}
}]
} ,
},
legend:{
display:true
}
});
}


});

</script> 
<?php /**PATH C:\laragon\www\ppd\resources\views/dashboard-content.blade.php ENDPATH**/ ?>