<?php
include('utils.php');
include('incSecure.php');
include('incTop.php');
?>
<div class="container"><div class="row">
  
  <div class="col-md-8 offset-md-2 my-5">
    <h3>Brazilians</h3>
    
    <table class="tbl table-striped">
     <thead>
      <tr>
       <th>Year</th>
       <th>Qty</th>
      </tr>
     </thead>
     <tbody>
<?php
DBOpen();

// get all service_id for brazilians
$rs = DBGetData("SELECT ID from services WHERE name LIKE '%brazil%'");
$service_ids = [];
foreach($rs as $r){
 $service_ids[] = $r[0];
}
$service_ids = implode(c, $service_ids);

function getyear($yyyy){
 global $service_ids;
 return DBGetData("SELECT COUNT(1) FROM bookings FORCE INDEX (index_must_start_at) WHERE 
  must_start_at < '$yyyy-01-01' AND `status`=4 AND id in
  (SELECT booking_id FROM booking_details FORCE INDEX (service_id) 
  WHERE service_id IN ($service_ids))")[0][0];
 // return DBGetData("SELECT COUNT(1) FROM bookings FORCE INDEX (index_must_start_at) WHERE 
 //  must_start_at BETWEEN '$yyyy-01-01' AND '$yyyy-12-31 23:59:59' AND `status`=4 AND id in
 //  (SELECT booking_id FROM booking_details FORCE INDEX (service_id) 
 //  WHERE service_id IN ($service_ids))")[0][0];
}

// $yr[2020] = getyear(2020);
// $yr[2021] = getyear(2021);
// $yr[2022] = getyear(2022);
// $yr[2023] = getyear(2023);
$yr[2020] = getyear(2020);

DBClose();

foreach($yr as $p => $v){
 wr("<tr><td>$p</td><td>$v</td></tr>");
}
?>
    </tbody>
   </table>
  </div>
</div></div>
<?php
include('incFoot.php');
?>

<script>
$(()=>{
 
 new DataTable('.tbl', {
  layout: {
   topEnd: ['search', 'buttons'],
   buttons: ['excelHtml5'] 
  },
  searching: true
 });

});
</script>