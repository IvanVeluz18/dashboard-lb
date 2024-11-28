<?php
include('../lbo/utils.php');
include('incSecure.php');


$Date1 = cleanstr($_POST['Date1'], 'date');
$Date2 = cleanstr($_POST['Date2'], 'date');
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
  b.name AS 'Branch',
  COUNT(1) AS Qty
 FROM customers cu
  LEFT JOIN sales_order so ON so.customer_id=cu.id 
  LEFT JOIN branches b ON b.id=so.branch_id
 WHERE so.created_at BETWEEN '$Date1' AND '$Date2 23:59:59' AND so.status='PAID'
 GROUP BY Month, Branch");
DBClose();

foreach($rs as $r){
 
 $mon[$r['Month']]['Qty'] += $r['Qty'];

 $br[$r['Branch']]['Qty'] += $r['Qty'];

 $r['Qty'] = number_format($r['Qty'],0);
 $Details .= "<tr>
  <td>$r[Month]</td>
  <td>$r[Branch]</td>
  <td>$r[Qty]</td>
  </tr>";

}

foreach($br as $branch => $val){
 $val['Qty'] = number_format($val['Qty'],0);
 $ByBranch .= "<tr><td>$branch</td><td>$val[Qty]</td></tr>";
}

foreach($mon as $mo => $val){
 $val['Qty'] = number_format($val['Qty'],0);
 $ByMonth .= "<tr><td>$mo</td><td>$val[Qty]</td></tr>";
}

wrjs(json_encode([
 'Details' => $Details,
 'ByBranch' => $ByBranch,
 'ByMonth' => $ByMonth,
]));
?>