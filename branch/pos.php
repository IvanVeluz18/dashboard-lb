<?php
include('../utils.php');
include('incSecure.php');

$Date1 = cleanstr($_GET['Date1'], 'date');
$Date2 = cleanstr($_GET['Date2'], 'date');

if ($Date1 == ''){
 $Date1 = left($maniladate, 7) . '-01';
 $Date2 = $maniladate;
}

include('incTop.php');
include('incNav.php');
?>

<div class="container"><div class="row">

<div class="col-md-3 my-4">
 <h4>Client Details</h4>
 <select class="form-control sel2 selClient"></select>
 
 <div class="mt-3 bg-white rounded-3 p-3 border">
  
  <div class="d-flex align-items-center mb-3">
   <div class="flex-shrink-0"> <img src="lois.jpg" width="100"> </div>
   <div class="flex-grow-1 ms-3">
    <h4>Lois Lane</h4>
   </div>
  </div>

  <div class="d-flex justify-content-between">
  <div>Last Appointment</div> <b>Oct 20, 2024</b>
  </div>
  
  <div class="d-flex justify-content-between">
  <div>Birth Month</div> <b>August</b>
  </div>

  <div class="d-flex justify-content-between">
  <div>Visits</div><b>4</b>
  </div>

  <div class="d-flex justify-content-between">
  <div>PLC</div><b>No</b>
  </div>

 </div>

 <div class="mt-3 card card-body">
  <b>Packages Used</b>

  <div class="d-flex justify-content-between">
  <div>5+1 Brazilian</div><b>2/6</b>
  </div>

 </div>


 <div class="mt-3 card card-body">
  <b>History</b>

  <table class="table table-sm table-borderless">
   <tr>
    <td>08/10/2024</td>
    <td>Brazilian</td>
    <td>Aida</td>
   </tr>
   <tr>
    <td>07/07/2024</td>
    <td>Brazilian</td>
    <td>Aida</td>
   </tr>
   <tr>
    <td>06/12/2024</td>
    <td>Brazilian</td>
    <td>Aida</td>
   </tr>
  </table>

 </div>


</div>

<div class="col-md-3 my-4">
 <h4>Product/Service</h4>
 <select class="form-control sel2 selService"></select>

 <div class="mt-3 card card-body">
  <table class="table table-sm table-borderless">
   <tr>
    <td>Brazilian</td>
    <td class="text-end">P600.00</td>
   </tr>
   <tr>
    <td>Underarm</td>
    <td class="text-end">P300.00</td>
   </tr>
  </table>
 </div>

</div>
<div class="col-md-3 my-4">
 <h4>Payment Details</h4>
 <select class="form-control sel2 selPayment"></select>

 <div class="mt-3 card card-body">
  <table class="table table-sm table-borderless">
   <tr>
    <td>Cash</td>
    <td class="text-end">P50.00</td>
   </tr>
   <tr>
    <td>Gcash</td>
    <td class="text-end">P50.00</td>
   </tr>
   <tr>
    <td>Card</td>
    <td class="text-end">P100.00</td>
   </tr>
   <tr>
    <td>5+1 Brazilian</td>
    <td class="text-end">P600.00</td>
   </tr>
   <tr>
    <td>Voucher</td>
    <td class="text-end">P100.00</td>
   </tr>
  </table>
 </div>


</div>
<div class="col-md-3 my-4">
 <h4>Summary</h4>

 <div class="mt-3 card card-body">
  <table class="table table-sm table-borderless">
   <tr>
    <td>Client</td>
    <td class="text-end">Lois Lane</td>
   </tr>
   <tr><td colspan="2"><hr></td></tr>

   <tr>
    <td>Brazilian</td>
    <td class="text-end">P600.00</td>
   </tr>
   <tr>
    <td>Underarm</td>
    <td class="text-end">P300.00</td>
   </tr>
   <tr><td colspan="2"><hr></td></tr>

   <tr>
    <td>Cash</td>
    <td class="text-end">P50.00</td>
   </tr>
   <tr>
    <td>Gcash</td>
    <td class="text-end">P50.00</td>
   </tr>
   <tr>
    <td>Card</td>
    <td class="text-end">P100.00</td>
   </tr>
   <tr>
    <td>5+1 Brazilian</td>
    <td class="text-end">P600.00</td>
   </tr>
   <tr>
    <td>Voucher</td>
    <td class="text-end">P100.00</td>
   </tr>
  </table>

  <button class="btn w-100 my-3 btn-primary">CHECK OUT</button>
  
 </div>

</div>
  
</div></div>
    
<?php
include('incFoot.php');
?>
<script>
$(()=>{
 $('.sel2').select2();
});
</script>