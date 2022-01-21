 <!-- Main content -->
 <section class="content">
    <!-- Info boxes -->
    <div class="row">
       <!-- /.col -->

       <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('shopping.orders.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-orange"><i class="fa fa-file-archive-o"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Total Orders</span>
            <span class="info-box-number">
              <?php if(isset($data['total_orders'])): ?>
              <?php echo e(number_format($data['total_orders'])); ?>

              <?php endif; ?>
            </span>
          </div>
        </div>
       </a>



       <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('shopping.orders.pending')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pending Orders</span>
            <span class="info-box-number">
                <?php if(isset($data['total_pending_shopping_orders'])): ?>
                <?php echo e(number_format($data['total_pending_shopping_orders'])); ?>

                <?php endif; ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
</a>
      <!-- /.col -->
     
        <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('shopping.orders.processed')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Processed Orders</span>
            <span class="info-box-number">
                <?php if(isset($data['total_processed_shopping_orders'])): ?>
                <?php echo e(number_format($data['total_processed_shopping_orders'])); ?>

                <?php endif; ?>
            </span>
          </div>
        </div>
      </a>

     

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isVendor')): ?>
      <!-- /.col -->
      <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('vendors-list.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Vendors</span>
            <span class="info-box-number">
              <?php if(isset($data['total_vendors'])): ?>
              <?php echo e(number_format($data['total_vendors'])); ?>

              <?php endif; ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
</a>
      

  
      <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('logs.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-black"><i class="fa fa-file-archive-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">System Audit</span>
            <span class="info-box-number">
              <?php if(isset($data['total_logs'])): ?>
              <?php echo e(number_format($data['total_logs'])); ?>

              <?php endif; ?>
            </span>
          </div>
        </div>
       </a>


    <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('customers.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total  Customers</span>
            <span class="info-box-number">
              <?php if(isset($data['total_customers'])): ?>
              <?php echo e(number_format($data['total_customers'])); ?>

              <?php endif; ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
       </a>

    <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('roles.index')); ?>">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-file-archive-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">User Roles</span>
          <span class="info-box-number">
            <?php if(isset($data['total_roles'])): ?>
            <?php echo e(number_format($data['total_roles'])); ?>

            <?php endif; ?>
          </span>
        </div>
      </div>
     </a>

     <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-file-archive-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"> Total Revenue </span>
          <span class="info-box-number">
            <?php if(isset($data['total_revenue'])): ?>
            <?php echo e(number_format($data['total_revenue'])); ?>

            <?php endif; ?>
          </span>
        </div>
      </div>
     </a>

     <?php endif; ?>

    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isVendor')): ?>
    <div class="row">

      <div class="col-md-6 col-sm-6 col-xs-12 homelink">
       <div class="info-box">
                 <span class="info-box-text text-center">Barchart of delivered shopping lists Vs months</span>
                   <canvas id="bar_chart_canvas" height="300" width="600" class="nunito-font"></canvas>
       </div>
   </div>

   <div class="col-md-6 col-sm-6 col-xs-12 homelink">
       <div class="info-box">
                   <span class="info-box-text text-center">Areachart showing income from shopping generated over months</span>
                   <canvas id="line_graph_canvas" height="300" width="600" class="nunito-font"></canvas>
          
       </div>
   </div>
</div>
<?php endif; ?>
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
<?php /**PATH C:\laragon\www\mkv-ms\resources\views/dashboard-content.blade.php ENDPATH**/ ?>