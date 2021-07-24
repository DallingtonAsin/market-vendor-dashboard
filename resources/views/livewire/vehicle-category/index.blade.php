<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                <div class="page_head float-left">
                    <span>Vehicle Categories</span> 
                    <span class="float-right btn_refrs">
                        <a class="btn btn-info"  href="{{ route('vehicle.category.add') }}" >Add</a>
                    </span>
                </div>
                <table class="table table-hover" id="vehicle-category-table">
                    <thead>
                        <tr>
                         <th></th>
                         <th>No</th>
                         <th>Name</th>
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

    const ajaxUrl =   @json(route('vehicle.categories.ajax.fetch'));
    const cat = 'vehicle-categories';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        var table = $('#vehicle-category-table');
        var title = "List of vehicle categories";
        var columns = [1, 2];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'name', name:'name'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>