<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">

        <a href="{{ route('home') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                 <img src="/images/icons/logo.png">
            </div>
        </a>

        <a href="{{ route('home') }}" class="simple-text logo-normal">
            @include('components.company-name')
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="{{ route('home') }}">
                    <i class="fa fa-home" style="font-size:30px"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            @can('isAdmin')
            <li>
                <a data-toggle="collapse" data-target="#roles" aria-expanded='false' class="ref-collapse">
                    <i class="nc-icon nc-circle-10"></i>
                    <p >Roles <span class="chervon_mot"><i class="fa fa-chevron-right float-right" aria-hidden="true"></i></span></p>
                </a>
                <div id="roles" class="collapse ref_link">     

                    <a href="{{ route('roles.add') }}"> 
                        <i class="fa fa-user-plus" style="font-size:20px"></i>
                        <p> Create</p>
                    </a>
                    <a href="{{ route('roles.index') }}"> 
                        <i class="fa fa-users" style="font-size:20px"></i>
                        <p> List of roles</p>
                    </a>                                         
                </div>                           
            </li>
            @endcan

            <li>
                <a data-toggle="collapse" data-target="#users" aria-expanded='false' class="ref-collapse">
                    <i class="fa fa-users"></i>
                    <p >Users <span class="chervon_mot"><i class="fa fa-chevron-right float-right" aria-hidden="true"></i></span></p>
                </a>
                <div id="users" class="collapse ref_link">     

                    <a href="{{ route('users.add') }}"> 
                        <i class="fa fa-user-plus" style="font-size:20px"></i>
                        <p> Create</p>
                    </a>
                    <a href="{{ route('users.index') }}"> 
                        <i class="fa fa-users" style="font-size:20px"></i>
                        <p> List of users</p>
                    </a>                                         
                </div>                           
            </li>



            <li>
                <a data-toggle="collapse" data-target="#requests" aria-expanded='false' class="ref-collapse">
                    <i class="fa fa-bath"></i>
                    <p >Requests <span class="chervon_mot"><i class="fa fa-chevron-right float-right" aria-hidden="true"></i></span></p>
                </a>
                <div id="requests" class="collapse ref_link">     

                    <a href="{{ route('requests.pending.index') }}"> 

                        <p>   <i class="fa fa-minus-circle" style="font-size:20px"></i> Pending</p>
                    </a>  
                    <a href="{{ route('requests.rejected.index') }}"> 

                        <p> <i class="fa fa-times-circle" style="font-size:20px"></i> Rejected</p>
                    </a>                          
                    <a href="{{ route('requests.approved.index') }}"> 

                        <p>    <i class="fa fa-check-circle" style="font-size:20px"></i> Approved</p>
                    </a>                                         
                </div>                           
            </li>


            <li>
                <a data-toggle="collapse" data-target="#clients" aria-expanded='false' class="ref-collapse">
                    <i class="fa fa-users"></i>
                    <p >Clients <span class="chervon_mot"><i class="fa fa-chevron-right float-right" aria-hidden="true"></i></span></p>
                </a>
                <div id="clients" class="collapse ref_link">     

                    <a href="{{ route('clients.add') }}"> 
                        <i class="fa fa-user-plus" style="font-size:20px"></i>
                        <p> Create</p>
                    </a>  
                    <a href="{{ route('clients.index') }}"> 
                        <i class="fa fa-users" style="font-size:20px"></i>
                        <p> List of clients</p>
                    </a>                                         
                </div>                           
            </li>


            <li>
                <a data-toggle="collapse" data-target="#vehcat" aria-expanded='false' class="ref-collapse">
                    <i class="fa fa-bus"></i>
                    <p >Vehicle Types <span class="chervon_mot"><i class="fa fa-chevron-right float-right" aria-hidden="true"></i></span></p>
                </a>
                <div id="vehcat" class="collapse ref_link">     

                    <a href="{{ route('vehicle.category.add') }}"> 
                        <i class="fa fa-database" style="font-size:20px"></i>
                        <p> Add category</p>
                    </a>                           
                    <a href="{{ route('vehicle.category.index') }}"> 
                        <i class="fa fa-cloud-upload" style="font-size:20px"></i>
                        <p> Manage category</p>
                    </a>                                         
                </div>                           
            </li>

            <li>
                <a data-toggle="collapse" data-target="#pareas" aria-expanded='false' class="ref-collapse">
                    <i class="fa fa-map-marker"></i>
                    <p >Parking areas <span class="chervon_mot"><i class="fa fa-chevron-right float-right" aria-hidden="true"></i></span></p>
                </a>
                <div id="pareas" class="collapse ref_link">     

                    <a href="{{ route('parking.area.create') }}"> 
                        <i class="fa fa-database" style="font-size:20px"></i>
                        <p> Add parking</p>
                    </a>                           
                    <a href="{{ route('parking.areas.index') }}"> 
                        <i class="fa fa-cloud-upload" style="font-size:20px"></i>
                        <p> Manage parking</p>
                    </a>                                         
                </div>                           
            </li>


            <li>
                <a data-toggle="collapse" data-target="#fees" aria-expanded='false' class="ref-collapse">
                    <i class="fa fa-dollar"></i>
                    <p >Parking fees <span class="chervon_mot"><i class="fa fa-chevron-right float-right" aria-hidden="true"></i></span></p>
                </a>
                <div id="fees" class="collapse ref_link">     

                    <a href="{{ route('parking.fees.create') }}">  
                        <i class="fa fa-plus-circle" style="font-size:20px"></i>
                        <p> Add fee</p>
                    </a>                           
                    <a href="{{ route('parking.fees.index') }}"> 
                        <i class="fa fa-cloud-upload" style="font-size:20px"></i>
                        <p> Manage fee</p>
                    </a>                                         
                </div>                           
            </li>

            <li>
                <a data-toggle="collapse" data-target="#reports" aria-expanded='false' class="ref-collapse">
                    <i class="fa fa-bar-chart"></i>
                    <p>Reports <span class="chervon_mot"><i class="fa fa-chevron-right float-right" aria-hidden="true"></i></span></p>
                </a>                          
                <div id="reports" class="collapse ref_link"> 
                    <a  href="{{ route('incomes.charts') }}"> 
                        <i class="fa fa-ravelry" style="font-size:20px"></i>
                        <p> Income Chart</p>
                    </a> 
                    <a  href="{{ route('income.monthly.review') }}"> 
                        <i class="fa fa-ravelry" style="font-size:20px"></i>
                        <p> Income review</p>
                    </a>
                    <a  href="{{ route('requests.charts') }}"> 
                        <i class="fa fa-ravelry" style="font-size:20px"></i>
                        <p> Request Chart</p>
                    </a>
                    <a  href="{{ route('requests.monthly.review') }}"> 
                        <i class="fa fa-ravelry" style="font-size:20px"></i>
                        <p> Request review</p>
                    </a>               
                </div>  
            </li> 
            
            
            <li>
                <a data-toggle="collapse" data-target="#demo1" aria-expanded='false' class="ref-collapse">
                    <i class="fa fa-globe"></i>
                    <p>Others <span class="chervon_mot"><i class="fa fa-chevron-right float-right" aria-hidden="true"></i></span></p>
                </a>                          
                <div id="demo1" class="collapse ref_link"> 
                    <a  href="{{ route('company.add-edit') }}"> 
                        <i class="fa fa-cog" style="font-size:20px"></i>
                        <p>Settings</p>
                    </a> 
                    <a  href="{{ route('logs.index') }}"> 
                        <i class="fa fa-ravelry" style="font-size:20px"></i>
                        <p> Activity logs</p>
                    </a>            
                </div>  
            </li>

        </ul>
    </div>
</div>