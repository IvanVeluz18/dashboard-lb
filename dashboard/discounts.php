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
  
  <div class="col-6 mt-5">
    <h3>Discounts Availed Report</h3>
     <div class="input-group">
      <input type="date" class="form-control Date1" value="<?=$Date1?>">
      <input type="date" class="form-control Date2" value="<?=$Date2?>">
      <button onclick="getdata()" class="btn border btn-go disabled">🔍</button>
     </div>
  </div>

  <div class="col-12 mb-5">
    <table class="tbl table table-striped table-sm">
      <thead>
        <tr>
          <th>Month</th>
          <th>Branch</th>
          <th>Discount</th>
          <th>Amount</th>
          <th>Total</th>
          <th>Qty</th>
        </tr>
      </thead>
      <tbody class="Details"></tbody>
    </table>



    <h3 class="mt-5">By Discount</h3>
    <table class="tbl table table-striped table-sm">
      <thead>
        <tr>
          <th>Discount</th>
          <th>Amount</th>
          <th>Total</th>
          <th>Qty</th>
        </tr>
      </thead>
      <tbody class="ByDiscount"></tbody>
     </table>




    <h3 class="mt-5">By Branch</h3>
    <table class="tbl table table-striped table-sm">
      <thead>
        <tr>
          <th>Branch</th>
          <th>Amount</th>
          <th>Total</th>
          <th>Qty</th>
        </tr>
      </thead>
      <tbody class="ByBranch"></tbody>
     </table>




    <h3 class="mt-5">By Month</h3>
    <table class="tbl table table-striped table-sm">
      <thead>
        <tr>
          <th>Month</th>
          <th>Amount</th>
          <th>Total</th>
          <th>Qty</th>
        </tr>
      </thead>
      <tbody class="ByMonth"></tbody>
     </table>

  </div>
</div></div>
    
<?php
include('incFoot.php');
?>

<script>
$(()=>{
 
 dt = new DataTable('.tbl', {
  layout: {
   topEnd: ['search', 'buttons'],
   buttons: ['excelHtml5'] 
  },
  searching: true
 });

});

function getdata(){
 
 spin = "<tr><td><div class='spinner-border'></td></tr>";
 $('.Details').html(spin);
 $('.ByBranch').html(spin);
 $('.ByDiscount').html(spin);
 $('.ByMonth').html(spin);
 
 $.post('discounts-data.php', {
  Date1: $('.Date1').val(),
  Date2: $('.Date2').val(),
 }, r=>{

  dt.destroy();

  $('.Details').html(r.Details);
  $('.ByBranch').html(r.ByBranch);
  $('.ByDiscount').html(r.ByDiscount);
  $('.ByMonth').html(r.ByMonth);

  dt = new DataTable('.tbl', {
   layout: {
    topEnd: ['search', 'buttons'],
    buttons: ['excelHtml5'] 
   },
   searching: true
  });

 });

}
</script>