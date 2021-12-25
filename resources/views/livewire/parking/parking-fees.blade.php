
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                <div class="page_head float-left">
                        <span>Parking fees</span> 
                        <span class="float-right btn_refrs">
                            <a class="btn btn-info"  href="{{ route('parking.fees.create') }}" >Add</a>
                        </span>
                    </div>
                <table class="table table-hover" id="parking-fees-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Client</th>
                            <th>Parking area</th>
                            <th>Vehicle Categoty</th>
                            <th>Fee</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var $=jQuery.noConflict();

    const ajaxUrl =   @json(route('parking.fees.ajax.fetch'));
    const cat = 'parking-fees';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        var table = $('#parking-fees-table');
        var title = "List of parking fees";
        var columns = [1,2,3,4,5];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'client', name:'client'},
        {data: 'parking_area', name:'parking_area'},
        {data: 'vehicle_category', name:'vehicle_category'},
        {data: 'fee_per_hour', name:'fee_per_hour'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>
