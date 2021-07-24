
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                 <div class="page_head float-left">
                        <span>Activity logs</span> 
                    </div>
                       <table class="table" id="activity-logs-table">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Role</th>
                              <th>Description</th>
                              <th>IP Address</th>
                              <th>Date</th>
                              <th>Time</th>
                          </tr>
                      </thead>
                  </table>
      </div>
  </div>
</div>
</div>

<script>
    var $=jQuery.noConflict();
    const ajaxUrl =   @json(route('logs.ajax.fetch'));
    const cat = 'logs';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        var table = $('#activity-logs-table');
        var title = "List of activity logs";
        var columns = [0,1,2,3,4];
        var dataColumns = [
        {data: 'name', name:'name'},
        {data: 'role', name:'role'},
        {data: 'description', name:'description'},
        {data: 'ip_address', name:'ip_address'},
        {data: 'date', name:'date'},
        {data: 'time', name:'time'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>