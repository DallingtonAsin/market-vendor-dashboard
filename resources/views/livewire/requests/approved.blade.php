<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Parking Requests
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Approved Parking Requests</li>
      </ol>
    </section>


<!-- Main content -->
<section class="content">
  <div class="box">
    @include('components.message')
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; 
          font-family: 'Times New Roman', Times, serif">List of approved parking requests</h3>
        </div>
  </div>
</div>

<div class="box-body">

<br/>

<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table table-hover" id="approved-requests">
            <thead>
                <tr>
                    <th></th>
                    <th>Tel</th>
                    <th>Vehicle No</th>
                    <th>Vehicle Type</th>
                    <th>Area</th>
                    <th>Time</th>
                    <th>Hours</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Request date</th>
                    <th>Approval date</th>
                </tr>
            </thead>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>


  <script>
    var $=jQuery.noConflict();
    const ajaxUrl =   @json(route('approved.requests.fetch'));
    const cat = 'approved request';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        var table = $('#approved-requests');
        var title = "List of approved requests";
        var columns = [1,2,3,4,5,6,7,8,9,10];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'telephone_no', name:'telephone_no'},
        {data: 'vehicle_details', name:'vehicle_details'},
        {data: 'vehicle_type', name:'vehicle_type'},
        {data: 'parking_area', name:'parking_area'},
        {data: 'duration', name:'duration'},
        {data: 'parking_hours', name:'parking_hours'},
        {data: 'amount', name:'amount'},
        {data: 'status', name:'status'},
        {data: 'request_date', name:'request_date'},
        {data: 'approval_date', name:'approval_date'},
        // {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>




