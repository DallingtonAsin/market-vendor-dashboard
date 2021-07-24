<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="bwdates-report-ds.php">Reports</a></li>
                                    <li class="active">Between Dates Reports</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                        </div> 
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Between Dates </strong> Reports
                            </div>
                            <div class="card-body card-block">
                                <form action="bwdates-reports-details.php" method="post" enctype="multipart/form-data" class="form-horizontal" name="bwdatesreport">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">From Date</label></div>
                                        <div class="col-12 col-md-9"><input type="date" name="fromdate" id="fromdate" class="form-control" required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">To Date</label></div>
                                        <div class="col-12 col-md-9"><input type="date" name="todate"  class="form-control" required="true"></div>
                                    </div>
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Submit</button></p>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                </div>
            </div>


        </div>
    </div>