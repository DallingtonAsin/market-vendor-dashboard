<div class="wrapper ">
    <div class="main-panel">
        <div class="content">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-globe text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Pending Requests</p>
                                        <p class="card-title">
                                            @isset($data['total_pending_requests'])
                                            {{ number_format($data['total_pending_requests']) }}
                                            @endisset
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-money-coins text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Approved Requests</p>
                                        <p class="card-title">
                                            @isset($data['total_approved_requests'])
                                            {{ number_format($data['total_approved_requests']) }}
                                            @endisset
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-circle-10 text-secondary"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Registered clients</p>
                                        <p class="card-title">
                                            @isset($data['total_clients'])
                                            {{ number_format($data['total_clients']) }}
                                            @endisset
                                            <p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-pin-3 text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Parking Areas</p>
                                                <p class="card-title">
                                                   @isset($data['total_parking_areas'])
                                                   {{ number_format($data['total_parking_areas']) }}
                                                   @endisset
                                                   <p>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-footer ">
                                        <hr>
                                    </div>


                                </div>
                            </div>
                        </div>



                        <div class="row">

                             <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="card card-stats">
                                                    <div class="card-body ">
                                                        <div class="row">
                                                            <div class="col-5 col-md-4">
                                                                <div class="icon-big text-center icon-warning">
                                                                    <i class="fa fa-users text-primary"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-7 col-md-8">
                                                                <div class="numbers">
                                                                    <p class="card-category">
                                                                    Total  Users</p>
                                                                    <p class="card-title">
                                                                        @isset($data['total_users'])
                                                                        {{ number_format($data['total_users']) }}
                                                                        @endisset
                                                                        <p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer ">
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>

                           <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-ambulance text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Vehicle categories</p>
                                                <p class="card-title">
                                                   @isset($data['total_parking_areas'])
                                                   {{ number_format($data['total_parking_areas']) }}
                                                   @endisset
                                                   <p>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-footer ">
                                        <hr>
                                    </div>


                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5 col-md-4">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="fa fa-dollar text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-md-8">
                                                <div class="numbers">
                                                    <p class="card-category">Current month income</p>
                                                    <p class="card-title">
                                                        @isset($data['current_month_income'])
                                                        {{ number_format($data['current_month_income']) }}
                                                        @endisset
                                                        <p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer ">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="card card-stats">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-5 col-md-4">
                                                        <div class="icon-big text-center icon-warning">
                                                            <i class="fa fa-dollar text-success"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-7 col-md-8">
                                                        <div class="numbers">
                                                            <p class="card-category">
                                                            Last month income</p>
                                                            <p class="card-title">
                                                                @isset($data['total_clients'])
                                                                {{ number_format($data['last_month_income']) }}
                                                                @endisset
                                                                <p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer ">
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>


                                                </div>



                                                <div class="row">

                                                   <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="card card-stats">
                                                        <div class="card-header">
                                                            <span class="card-title barChartTitle">Barchart showing the number of approved parking requests over months</span>
                                                        </div>
                                                        <div class="card-body ">
                                                            <div class="row">
                                                                <canvas id="bar_chart_canvas" height="300" width="600" class="nunito-font"></canvas>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer ">
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="card card-stats">
                                                        <div class="card-header">
                                                            <span class="card-title lineChartTitle">Areachart showing income generated over months</span>
                                                        </div>
                                                        <div class="card-body ">
                                                            <div class="row">
                                                                <canvas id="line_graph_canvas" height="300" width="600" class="nunito-font"></canvas>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer ">
                                                            <hr>
                                                        </div>


                                                    </div>
                                                </div>



                                            </div>




                                        </div> 
                                    </div>
                                </div>





                                <script type="text/javascript">

                                  $(document).ready(function(){

                                    var request_data = {!! json_encode($request_data) !!};
                                    if (request_data != undefined || request_data.length > 0) {
                                        request_data = request_data;
                                    }

                                    var income_data = {!! json_encode($income_data) !!};
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
