
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                <div class="page_head">Monthly Income</div>
                       <table class="table" id="monthly-requests-table">
                        <thead>
                           <tr>
                              <th>No.</th>
                              <th>Period</th>
                              <th>Month</th>
                              <th>Incomes</th>
                          </tr>
                      </thead>
                  </table>
      </div>
  </div>
</div>
</div>

<script>
    var $=jQuery.noConflict();

    const ajaxUrl =   @json(route('income.monthly.ajax.fetch'));
    const cat = 'monthly income';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        var table = $('#monthly-requests-table');
        var title = "Monthly Request Review";
        var columns = [0, 1, 2, 3];
        var dataColumns = [
         {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'period', name:'period'},
        {data: 'month', name:'month'},
        {data: 'total_income', name:'total_income'}
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>