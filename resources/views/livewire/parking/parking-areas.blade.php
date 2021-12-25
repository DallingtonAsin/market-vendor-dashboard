
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
                            <th>Client</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Opens At</th>
                            <th>Closes At</th>
                            <th>Lat</th>
                            <th>Long</th>
                            <th>Rating</th>
                            <th>Slots</th>
                            <th>Avail.</th>
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
        // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'client', name:'client'},
        {data: 'name', name:'name'},
        {data: 'address', name:'address'},
        {data: 'opens_at', name:'opens_at'},
        {data: 'closes_at', name:'closes_at'},
        {data: 'latitude', name:'latitude'},
        {data: 'longitude', name:'longitude'},
        {data: 'rating', name:'rating'},
        {data: 'total_space', name:'total_space'},
        {data: 'current_free_space', name:'current_free_space'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>
