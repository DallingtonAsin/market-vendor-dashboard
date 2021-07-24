
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                 <div class="page_head float-left">
                        <span>System users</span> 
                        <span class="float-right btn_refrs">
                            <a class="btn btn-info"  href="{{ route('users.add') }}" >Add</a>
                        </span>
                    </div>
                       <table class="table" id="users-table">
                        <thead>
                           <tr>
                              <th></th>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Mobile No</th>
                              <th>Address</th>
                              <th>A/C status</th>
                              <th>Manage</th>
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

    const ajaxUrl =   @json(route('users.ajax.fetch'));
    const cat = 'users';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        var table = $('#users-table');
        var title = "List of users";
        var columns = [1,2,3,4,5];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'name', name:'name'},
        {data: 'username', name:'username'},
        {data: 'mobile_no', name:'mobile_no'},
        {data: 'address', name:'address'},
        {data: 'is_active', name:'is_active'},
        {data: 'account_action', name:'account_action'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>