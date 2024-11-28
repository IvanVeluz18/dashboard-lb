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

 <div class="col-md-12 p-3">
  <h4>Top Services</h4>
  <table class="tbl table table-striped table-sm">
   <thead>
    <tr>
     <th>Service</th>
     <th class="text-end">Service Sales</th>
     <th class="text-end">Product Sales</th>
     <th class="text-end">Transactions</th>
    </tr>
   </thead>

   <tbody>
   <tr>
    <td>Brazilian</td>
    <td class='text-end'>1,000,000.00</td>
    <td class='text-end'>1,000,000.00</td>
    <td class='text-end'>1,000</td>
   </tr>

   <tr>
    <td>Underarms</td>
    <td class='text-end'>800,000.00</td>
    <td class='text-end'>800,000.00</td>
    <td class='text-end'>800</td>
   </tr>

   <tr>
    <td>Eyebrow Threading</td>
    <td class='text-end'>700,000.00</td>
    <td class='text-end'>700,000.00</td>
    <td class='text-end'>700</td>
   </tr>

   <tr>
    <td>Half Legs</td>
    <td class='text-end'>600,000.00</td>
    <td class='text-end'>600,000.00</td>
    <td class='text-end'>600</td>
   </tr>

   <tr>
    <td>Full Legs</td>
    <td class='text-end'>500,000.00</td>
    <td class='text-end'>500,000.00</td>
    <td class='text-end'>500</td>
   </tr>
   </tbody>

  </table>
 </div>
  


 <div class="col-md-12 p-3">
  <h4>Top Technicians</h4>
  <table class="tbl table table-striped table-sm">
   <thead>
    <tr>
     <th>Technician</th>
     <th class="text-end">Service Sales</th>
     <th class="text-end">Product Sales</th>
     <th class="text-end">Transactions</th>
    </tr>
   </thead>

   <tbody>
   <tr>
    <td>Anna</td>
    <td class='text-end'>1,000,000.00</td>
    <td class='text-end'>1,000,000.00</td>
    <td class='text-end'>1,000</td>
   </tr>

   <tr>
    <td>Lorna</td>
    <td class='text-end'>800,000.00</td>
    <td class='text-end'>800,000.00</td>
    <td class='text-end'>800</td>
   </tr>

   <tr>
    <td>Fe</td>
    <td class='text-end'>700,000.00</td>
    <td class='text-end'>700,000.00</td>
    <td class='text-end'>700</td>
   </tr>

   <tr>
    <td>Marie</td>
    <td class='text-end'>600,000.00</td>
    <td class='text-end'>600,000.00</td>
    <td class='text-end'>600</td>
   </tr>

   <tr>
    <td>France</td>
    <td class='text-end'>500,000.00</td>
    <td class='text-end'>500,000.00</td>
    <td class='text-end'>500</td>
   </tr>
   </tbody>

  </table>
 </div>
  
</div></div>
    
<?php
include('incFoot.php');
?>