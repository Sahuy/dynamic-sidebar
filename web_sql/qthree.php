<?php include('../web_sql/header.php'); ?>
<!--header end-->

<!--sidebar start-->
<?php include('sidebar.php'); ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Show All Records List
    </div>
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-12">
    			<div class="card mt-5">
    				<div class="card-header">
    					<h4></h4>
    				</div>
    			<div class="card-body">
<form action="" method="GET">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>From Date</label>
                <input type="date" name="from_date" value="<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : date('Y-m-d'); ?>" class="form-control"> </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>To Date</label>
                <input type="date" name="to_date" value="<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : date('Y-m-d'); ?>" class="form-control">

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <!-- <label>Click to filter</label>-->
                    <br>
                <button type="submit" class="btn btn-primary">Filter</button>
                 <button type="button" class="btn btn-warning" onclick=window.location='qthree.php'>
                <i class="fas fa-reset"></i>Reset</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
    		<div class="card mt-4">
    			<div class="card-body">
                  <table class="table table-borderd">
                  	<thead>
                  		<tr>
                  			<th>#</th>
                  			<th>User Id</th>
                  			<th>Scode</th>
                  			<th>Service Name</th>
                  			<th>Service Type</th>
                  			<th>Transamt</th>
                  			<th>Chargeamt</th>
                  			<th>Create Date</th>
                  			<th>Status</th>
                  		</tr>
                  	</thead>
                  	<tbody>

    				<?php
$con = mysqli_connect("localhost", "root", "", "sql");

$query = "SELECT * FROM assdt_service_consumption_table";

if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    
    $query .= " WHERE req_dt BETWEEN '$from_date' AND '$to_date'";
}

$query_run = mysqli_query($con, $query);

if ($query_run) {
    if (mysqli_num_rows($query_run) > 0) {
          $i=1;

        foreach ($query_run as $row) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?= $row['user_id']; ?></td>
                <td><?= $row['scode']; ?></td>
                <td><?= $row['servicename']; ?></td>
                <td><?= $row['servicetype']; ?></td>
                <td>
                    <?php $transamt = $row['transamt'];
                      if($transamt==''){
                        $transamt = "<b>NA</b>";
                         } else {
                          $transamt = $row['transamt'];
                        }
                    echo $transamt;?></td> 
                 <td>
                    <?php $chargeamt = $row['chargeamt'];
                      if($chargeamt==''){
                        $chargeamt = "<b>NA</b>";
                         } else {
                          $chargeamt = $row['chargeamt'];
                        }
                    echo $chargeamt;?></td>      
                <td><?php echo date_format(date_create($row['req_dt']),"d M, Y h:i A") ?></td>
                <td><?= $row['status']; ?></td>
            </tr>
            <?php
        $i++;}
    } else {
        echo "No Record Found";
    }
} else {
    echo "Query execution failed: " . mysqli_error($con);
}
?>   				
    			</tbody>
    		</table>
    		</div>
    	</div>
    </div>
</div>
    <footer class="panel-footer">
      <div class="row">
        
        
      </div>
    </footer>
  </div>
</div>
</section>
<?php include 'footer.php';?>