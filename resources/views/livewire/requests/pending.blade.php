
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                <div class="page_head">Pending Requests</div>
                <table class="table table-hover" id="pending-requests">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tel</th>
                            <th>Vehicle No</th>
                            <th>V. Type</th>
                            <th>Client</th>
                            <th>Area</th>
                            <th>Time</th>
                            <th>Hours</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Request date</th>
                            <!-- <th>Manage</th> -->
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
    const ajaxUrl =   @json(route('pending.requests.fetch'));
    const cat = 'pending request';
    const token = "{{ csrf_token() }}";
    const approveSeletectedUrl = @json(route('requests.pending.approve'));


    jQuery(document).ready(function($){

        var table = $('#pending-requests');
        var title = "List of pending requests";
        var columns = [1,2,3,4,5,6,7,8,9];
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
        // {data: 'manage', name:'manage'},
        // {data: 'action', name:'action'},
        ];
        DataTablizeRequests(table, title, columns, dataColumns);
    });
</script>
