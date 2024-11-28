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
  <h4>Top Brands</h4>
  <table class="tbl table table-striped table-sm">
   <thead>
    <tr>
     <th>Brand</th>
     <th class="text-end">Service Sales</th>
     <th class="text-end">Product Sales</th>
     <th class="text-end">Transactions</th>
    </tr>
   </thead>

   <tbody>
   <tr>
    <td>Lay Bare</td>
    <td class='text-end'>1,000,000.00</td>
    <td class='text-end'>1,000,000.00</td>
    <td class='text-end'>1,000</td>
   </tr>

   <tr>
    <td>Lay Bare Plus</td>
    <td class='text-end'>800,000.00</td>
    <td class='text-end'>800,000.00</td>
    <td class='text-end'>800</td>
   </tr>

   <tr>
    <td>Lavish Lashes Studio</td>
    <td class='text-end'>700,000.00</td>
    <td class='text-end'>700,000.00</td>
    <td class='text-end'>700</td>
   </tr>

   <tr>
    <td>Passionails</td>
    <td class='text-end'>600,000.00</td>
    <td class='text-end'>600,000.00</td>
    <td class='text-end'>600</td>
   </tr>

   <tr>
    <td>Robots and Dolls</td>
    <td class='text-end'>500,000.00</td>
    <td class='text-end'>500,000.00</td>
    <td class='text-end'>500</td>
   </tr>
   </tbody>

  </table>
 </div>

 <div class="col-md-12 p-3">
  <h4>Top Branches</h4>
  <table class="tbl table table-striped table-sm">
   <thead>
    <tr>
     <th>Brand</th>
     <th class="text-end">Service Sales</th>
     <th class="text-end">Product Sales</th>
     <th class="text-end">Transactions</th>
    </tr>
   </thead>

   <tbody>
   <tr>
    <td>SM Megamall</td>
    <td class='text-end'>1,000,000.00</td>
    <td class='text-end'>1,000,000.00</td>
    <td class='text-end'>1,000</td>
   </tr>

   <tr>
    <td>SM San Lazaro</td>
    <td class='text-end'>800,000.00</td>
    <td class='text-end'>800,000.00</td>
    <td class='text-end'>800</td>
   </tr>

   <tr>
    <td>Market! Market!</td>
    <td class='text-end'>700,000.00</td>
    <td class='text-end'>700,000.00</td>
    <td class='text-end'>700</td>
   </tr>

   <tr>
    <td>Glorietta 3</td>
    <td class='text-end'>600,000.00</td>
    <td class='text-end'>600,000.00</td>
    <td class='text-end'>600</td>
   </tr>

   <tr>
    <td>Robinsons Place Manila</td>
    <td class='text-end'>500,000.00</td>
    <td class='text-end'>500,000.00</td>
    <td class='text-end'>500</td>
   </tr>
   </tbody>

  </table>
 </div>

 <div class="col-md-12 px-3">
  <ul class="nav nav-tabs" role="tablist">
   <li class="nav-item" role="presentation">
     <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#clients" type="button" role="tab">Clients</button>
   </li>
   <li class="nav-item" role="presentation">
     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab">Services</button>
   </li>
   <li class="nav-item" role="presentation">
     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#productivity" type="button" role="tab">Productivity</button>
   </li>
  </ul>
 </div>

 <div class="tab-content">
  
  <div class="tab-pane fade show active" id="clients" role="tabpanel" tabindex="0">
   <div class="row px-3"> <!-- border border-top-0 -->
    <div class="col-12 bg-white p-3">
     <img src="clients.jpg" alt="" class="w-100">
    </div>
   </div>
  </div>

  <div class="tab-pane fade" id="services" role="tabpanel" tabindex="0">
   <div class="row px-3">
    <div class="col-12 bg-white p-3">
     <img src="services.jpg" alt="" class="w-100">
    </div>
   </div>
  </div>

  <div class="tab-pane fade" id="productivity" role="tabpanel" tabindex="0">
   <div class="row px-3">
    <div class="col-12 bg-white p-3">
     <img src="productivity.jpg" alt="" class="w-100">
    </div>
   </div>
  </div>

 </div> <!-- tab content -->
  
</div></div>
    
<?php
include('incFoot.php');
?>