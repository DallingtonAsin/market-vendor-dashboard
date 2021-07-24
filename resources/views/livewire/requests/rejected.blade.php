
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                <div class="page_head">Rejected Requests</div>
                <table class="table table-hover" id="rejected-requests">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tel</th>
                            <th>Vehicle No</th>
                            <th>Vehicle Type</th>
                            <th>Client</th>
                            <th>Area</th>
                            <th>Time</th>
                            <th>Hours</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Request date</th>
                            <th>Rejected on</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var $=jQuery.noConflict();

    const ajaxUrl =   @json(route('rejected.requests.fetch'));
    const cat = 'rejected request';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        var table = $('#rejected-requests');
        var title = "List of rejected requests";
        var columns = [1,2,3,4,5,6,7,8,9,10];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'telephone_no', name:'telephone_no'},
        {data: 'vehicle_number', name:'vehicle_number'},
        {data: 'vehicle_type', name:'vehicle_type'},
        {data: 'client', name:'client'},
        {data: 'parking_area', name:'parking_area'},
        {data: 'duration', name:'duration'},
        {data: 'parking_hours', name:'parking_hours'},
        {data: 'amount', name:'amount'},
        {data: 'status', name:'status'},
        {data: 'request_date', name:'request_date'},
        {data: 'reject_date', name:'reject_date'},
        // {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>
