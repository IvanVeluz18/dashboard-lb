<?php
include('../lbo/utils.php');
include('incSecure.php');

$Date1 = cleanstr($_POST['Date1'], 'date');
$Date2 = cleanstr($_POST['Date2'], 'date');
$Prefix = left($_POST['Prefix'],5);
if ($Prefix == '') $Prefix = '5';
$IP = $_SERVER['REMOTE_ADDR'];

if ($Date1 == ''){
 $Date1 = left($maniladate, 7) . '-01';
 $Date2 = $maniladate;
} else {
 $date1 = new DateTime($Date1);
 $date2 = new DateTime($Date2);
 $interval = $date2->diff($date1);
 $Days = $interval->days;
 if ($Days > 100){
  $Limit = "LIMIT 10000";
 }
}

DBOpen();

$rs = DBGetData2("SELECT 
  CONCAT(YEAR(so.created_at), '-', LPAD(MONTH(so.created_at), 2, '0')) AS Month, 
  b.name as 'Branch',
  
  sv.name as 'Service',
  sv.Gender,
  COUNT(1) AS Qty,
  SUM(ss.price) As Amount,

  pk.name as 'Package',
  pk.gender as 'PG',
  COUNT(1) AS PQty,
  SUM(pk.srp) As PAmount

 FROM sales_order_services ss 
  LEFT JOIN services sv ON sv.id=ss.service_id 
  LEFT JOIN packages pk ON pk.id=ss.package_id 
  LEFT JOIN sales_order so ON ss.sales_order_id=so.id 
  LEFT JOIN branches b ON b.id=so.branch_id
 WHERE so.created_at BETWEEN '$Date1' AND '$Date2 23:59:59' AND so.status='PAID' AND
  (
   (ss.service_id IS NOT NULL AND sv.name LIKE '$Prefix%')
   OR
   (ss.package_id IS NOT NULL AND pk.name LIKE '$Prefix%')
  ) 
 GROUP BY month, branch, service, gender, package, pg");

DBClose();

foreach($rs as $r){
 
 if (!is_null($r['Package'])) {
  $Service = "$r[Package] $r[PG] pck";
  $mon[$r['Month']]['Amount'] += $r['PAmount'];
  $mon[$r['Month']]['Qty'] += $r['PQty'];
  $br[$r['Branch']]['Amount'] += $r['PAmount'];
  $br[$r['Branch']]['Qty'] += $r['PQty'];
  $svc[$Service]['Amount'] += $r['PAmount'];
  $svc[$Service]['Qty'] += $r['PQty'];
  $Amount = number_format($r['PAmount'],2);
  $Qty = number_format($r['PQty'],0);
 } else {
  $Service = "$r[Service] $r[Gender] svc";
  $mon[$r['Month']]['Amount'] += $r['Amount'];
  $mon[$r['Month']]['Qty'] += $r['Qty'];
  $br[$r['Branch']]['Amount'] += $r['Amount'];
  $br[$r['Branch']]['Qty'] += $r['Qty'];
  $svc[$Service]['Amount'] += $r['Amount'];
  $svc[$Service]['Qty'] += $r['Qty'];
  $Amount = number_format($r['Amount'],2);
  $Qty = number_format($r['Qty'],0);
 }

 $Details .= "<tr>
  <td>$r[Month]</td>
  <td>$r[Branch]</td>
  <td>$Service</td>
  <td>$Amount</td>
  <td>$Qty</td>
  </tr>";

}

foreach($svc as $type => $val){
 $val['Amount'] = number_format($val['Amount'],2);
 $val['Qty'] = number_format($val['Qty'],0);
 $ByService .= "<tr><td>$type</td><td>$val[Amount]</td><td>$val[Qty]</td></tr>";
}

foreach($br as $branch => $val){
 $val['Amount'] = number_format($val['Amount'],2);
 $val['Qty'] = number_format($val['Qty'],0);
 $ByBranch .= "<tr><td>$branch</td><td>$val[Amount]</td><td>$val[Qty]</td></tr>";
}

foreach($mon as $mo => $val){
 $val['Amount'] = number_format($val['Amount'],2);
 $val['Qty'] = number_format($val['Qty'],0);
 $ByMonth .= "<tr><td>$mo</td><td>$val[Amount]</td><td>$val[Qty]</td></tr>";
}

wrjs(json_encode([
 'Details' => $Details,
 'ByService' => $ByService,
 'ByBranch' => $ByBranch,
 'ByMonth' => $ByMonth,
]));
?>