
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                @include('components.message')
                <div class="page_head float-left">
                        <span>Registered clients</span> 
                        <span class="float-right btn_refrs">
                            <a class="btn btn-info"  href="{{ url('clients/add') }}" >Add</a>
                        </span>
                    </div>
                <table class="table table-hover" id="clients-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Name</th>
                            <th>Telephone No</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                  <!--   <tbody>
                        @foreach($clients as $client)
                        <tr>
                          <td></td>
                          <td>{{ ++$count }}</td>
                          <td>{{ $client->name }}</td>
                          <td>{{ $client->mobile_number }}</td>
                          <td>{{ $client->email }}</td>
                          <td>
                            <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="edit({{ $client->id }})" data-toggle="modal" data-target="#editClient"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" wire:click="comfirmDelModal({{ $client->id }})" data-toggle="modal" data-target="#deleteClient"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody> -->
            </table>
            @include('livewire.modals.clients.edit')
            @include('livewire.modals.clients.delete')
    </div>
</div>
</div>
</div>

<script>
  window.addEventListener('closeModal', event=>{
    $('#editClient').modal('hide');
    $('#deleteClient').modal('hide');
  });
</script>

<script>
    var $=jQuery.noConflict();

    const ajaxUrl =   @json(route('clients.ajax.fetch'));
    const cat = 'clients';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        var table = $('#clients-table');
        var title = "List of clients";
        var columns = [1,2,3,4];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'name', name:'name'},
        {data: 'mobile_number', name:'mobile_number'},
        {data: 'email', name:'email'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>
