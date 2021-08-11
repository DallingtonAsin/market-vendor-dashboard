
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                <div class="page_head float-left">
                        <span>Parking areas</span> 
                        <span class="float-right btn_refrs">
                            <a class="btn btn-info"  href="{{ route('parking.area.create') }}" >Add</a>
                        </span>
                    </div>
                <table class="table table-hover" id="parking-areas">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Client</th>
                            <th>Parking area</th>
                            <th>Address</th>
                            <th>Total space</th>
                            <th>Free space</th>
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

    const ajaxUrl =   @json(route('parking.areas.ajax.fetch'));
    const cat = 'parking areas';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        var table = $('#parking-areas');
        var title = "List of parking areas";
        var columns = [1,2,3];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'client', name:'client'},
        {data: 'name', name:'name'},
        {data: 'address', name:'address'},
        {data: 'total_space', name:'total_space'},
        {data: 'current_free_space', name:'current_free_space'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>
